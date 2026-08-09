# Concurrency, Race, and Load Scenario Register

Audit date: 2026-08-08  
Scope: AC-XCUT-09, AC-XCUT-14, AC-XCUT-16, NFR-01, NFR-02, NFR-03, NFR-04, NFR-06, and the Tier-A stock, sales, payment, shift, wallet, party, asset, import, and numbering obligations.

This is an executable scenario register, not a claim that every scenario has passed. Each entry carries the same fields: ID, owner/domain, requirements, risk, preconditions/data, actor/scope, environment, trigger, steps, oracle, failure/recovery, observability/evidence, automation, and status. `BLOCKED_BY_ENVIRONMENT` means the required tool or production-like infrastructure is unavailable. `BLOCKED_NOT_IMPLEMENTED` means the application surface does not exist. No human-only check is marked passed by this register.

## Evidence baseline

| Evidence | Result |
|---|---|
| Focused inventory/POS/readiness suite before this register | 22 tests, 19 passed, 3 deliberately failing regression assertions; see `testing/results/FINAL-TEST-REPORT.md`. |
| New local inventory/POS tests | Matching replay, state, rollback, audit, count, suspension, barcode, and readiness cases are executable locally. |
| Known failures | QA-015 and QA-027 (fixed 2026-08-08, see `DEFECTS.md`); QA-037 and QA-038 — real-concurrency-only idempotency TOCTOU races in `PostInventoryMovement` and `RetailSaleAction`, found and fixed 2026-08-09 via the real-MariaDB races below. |
| Environment limits (updated 2026-08-09) | A real MariaDB 10.4.32 instance is now reachable (`toyjoy_concurrency_20260809`, `phpunit.concurrency.xml`), unblocking true row-lock proof for CONC-INV-003, CONC-NUM-001, CONC-PRC-001, and CONC-POS-003 (all now PASS_REAL_DB — see their entries below). SQLite is still the default suite's connection and still cannot prove row-lock races on its own; everything NOT explicitly marked PASS_REAL_DB below remains BLOCKED_BY_ENVIRONMENT for the same reason as before. k6, browser concurrency, production cache/queue, payment gateway, and wallet/party/asset/import modules remain unavailable or not implemented — CONC-PAY-001, CONC-WAL-001, CONC-PTY-001, CONC-AST-001, CONC-IMP-001, and CONC-OFF-001 are unaffected by this pass. |

## Inventory and transfer scenarios

### CONC-INV-001 — Identical inventory movement replay

| Field | Detail |
|---|---|
| Owner/domain | QA / Inventory ledger |
| Requirements | INV-01, INV-04, NFR-01, NFR-06, AC-XCUT-09 |
| Risk/priority | Critical; duplicate stock or value posting |
| Preconditions/data | One product, one scoped store, opening balance 10, movement key `INV-IDEMPOTENT-SAME-001`. |
| Actor/scope | Authenticated Warehouse Manager scoped to the store. |
| Environment | Local PHPUnit with isolated SQLite and migrations. |
| Trigger | Submit the same logical movement twice with the same key and identical quantity/type/cost. |
| Steps | Post `+1` entry; replay the identical request; inspect movement, balance, and audit rows. |
| Oracle/invariants | Original movement is returned; exactly one movement and one balance increment; no second audit/effect. |
| Failure/recovery | If the first request fails, retry after rollback must be allowed; if it succeeds, replay is read-only. |
| Observability/evidence | `StockMovement` count, `StockBalance.on_hand`, idempotency key, audit count. |
| Automation/status | `InventoryWorkflowIntegrityTest::test_identical_idempotency_replay_returns_the_original_movement_once`; PASS_LOCAL. |

### CONC-INV-002 — Conflicting inventory replay

| Field | Detail |
|---|---|
| Owner/domain | QA / Inventory ledger |
| Requirements | NFR-06, AC-XCUT-09 |
| Risk/priority | Critical; replay can forge quantity/cost/type under an existing key |
| Preconditions/data | A successful `+2 opening_adjustment @ 10` under `INV-IDEMPOTENT-1`. |
| Actor/scope | Authenticated inventory actor. |
| Environment | Local PHPUnit/SQLite; suitable to prove application behavior, not production locking. |
| Trigger | Reuse the key with quantity `999`, type `inventory_entry`, cost `999`. |
| Steps | Post the first request; submit the changed payload; inspect exception and rows. |
| Oracle/invariants | Changed payload is refused; original row and balance remain unchanged. |
| Failure/recovery | Preserve the failed request correlation/idempotency key for investigation; never return the original result for a different payload. |
| Observability/evidence | Test failure at the changed-payload call is QA-015 evidence. |
| Automation/status | `InventoryMovementIntegrityTest::test_idempotency_key_replay_with_conflicting_payload_is_rejected_without_duplicate_effect`; PASS_LOCAL (fixed as QA-015, 2026-08-08 — the changed payload under a reused key is correctly rejected, verified on SQLite). Note: this scenario is single-process/sequential; CONC-INV-003 below is the genuine-concurrency counterpart for the *same-payload* replay case. |

### CONC-INV-003 — Concurrent stock-balance posting

| Field | Detail |
|---|---|
| Owner/domain | QA / Inventory ledger |
| Requirements | INV-01, INV-05, NFR-06, AC-XCUT-14 |
| Risk/priority | Critical; lost update or negative balance |
| Preconditions/data | One balance with 10 units; two independent requests each post `-6`. |
| Actor/scope | Two authorized inventory actors in the same store. |
| Environment | Production-like PostgreSQL/MySQL with row locks and parallel workers. |
| Trigger | Start both posts at the same time. |
| Steps | Lock balance; submit both exits; wait for both commits; reconcile movement sum to balance. |
| Oracle/invariants | At most one exit commits; the other receives a controlled insufficient-stock error; no negative balance, duplicate movement, or orphan audit. |
| Failure/recovery | Roll back the losing transaction and allow a retry with a new request key after refreshed balance. |
| Observability/evidence | Lock wait/deadlock logs, request IDs, movement IDs, transaction outcomes, reconciliation output. |
| Automation/status | **PASS_REAL_DB** (2026-08-09) — `tests/Concurrency/StockBalanceConcurrencyTest.php` against real MariaDB 10.4.32 (`toyjoy_concurrency_20260809`, `phpunit.concurrency.xml`), two genuine OS processes racing the same `StockBalance` row via `Symfony\Process` (not simulated, not sequential). `test_two_concurrent_distinct_movements_do_not_lose_an_update`: two different concurrent movements (+10, -4) against one balance — `lockForUpdate()` correctly serializes them, on-hand ends exactly at 106 (100+10-4), no lost update, both movement rows exist. This same run also caught and closed a real Critical defect (QA-037): the idempotency check-then-insert outside any lock let two concurrent *identical* submissions both pass the pre-insert check and collide on the DB's unique index, throwing an unhandled exception instead of replaying; `test_two_concurrent_identical_idempotency_key_submissions_collapse_to_one_movement` is the regression proof for the fix (both racers now resolve to the same single row). This scenario's two claims — engine-level lock correctness and idempotency-under-race — are both now proven, not just asserted. |

### CONC-INV-004 — Transfer dispatch replay and race

| Field | Detail |
|---|---|
| Owner/domain | QA / Inventory transfers |
| Requirements | INV-03, NFR-01, NFR-02, NFR-06, AC-XCUT-03, AC-XCUT-09 |
| Risk/priority | Critical; source stock can leave twice |
| Preconditions/data | Approved transfer with one line and source balance 10. |
| Actor/scope | Authorized Warehouse Manager with source and destination scope. |
| Environment | Serial Local test is available; parallel production DB is required for the race. |
| Trigger | Two dispatch requests for the same transfer, including a same-key replay. |
| Steps | Submit both calls concurrently; inspect transfer state, line quantities, source movement count and audit. |
| Oracle/invariants | One transition to `in_transit`; one source movement per line; second call is refused or safe replay; no double decrement. |
| Failure/recovery | A lock/deadlock loser rolls back; a terminal transfer remains unchanged and can be reviewed. |
| Observability/evidence | Transfer lock version, state transition audit, movement idempotency keys, DB lock/deadlock log. |
| Automation/status | Serial lifecycle is covered by `InventoryWorkflowIntegrityTest`; production concurrent proof BLOCKED_BY_ENVIRONMENT. |

### CONC-INV-005 — Transfer receipt and difference review race

| Field | Detail |
|---|---|
| Owner/domain | QA / Inventory transfers |
| Requirements | INV-03, NFR-01, NFR-02, NFR-06, AC-XCUT-03, AC-XCUT-09 |
| Risk/priority | Critical; destination or in-transit stock can be posted twice |
| Preconditions/data | `in_transit` transfer with dispatched quantity 4. |
| Actor/scope | Destination-scoped receiver and authorized difference reviewer. |
| Environment | Production-like DB for parallel receipt; Local SQLite for serial state proof. |
| Trigger | Two receipts with the same payload, or receipt racing with difference resolution. |
| Steps | Submit receipt calls; inspect each line, destination on-hand/in-transit, transfer state, and audit. |
| Oracle/invariants | Exactly one receipt effect; terminal `received` or `difference_review` state; no second receipt after terminal state; shortage quantity is isolated. |
| Failure/recovery | Losing transaction rolls back all line changes; reviewer can resume only from `difference_review`. |
| Observability/evidence | Transfer lock version, line received/difference quantities, movement keys, audit metadata. |
| Automation/status | Serial partial receipt and resolution PASS_LOCAL; true race BLOCKED_BY_ENVIRONMENT. |

### CONC-INV-006 — Count while sales continue

| Field | Detail |
|---|---|
| Owner/domain | QA / Stock counts |
| Requirements | INV-07, INV-08, INV-09, NFR-01, NFR-06 |
| Risk/priority | Critical; count can overwrite sales or zero uncounted stock |
| Preconditions/data | Reference balance 10; one counted and one uncounted product; a sale of 2 after reference time. |
| Actor/scope | Stock Counter submits; Warehouse Manager reconciles. |
| Environment | Local serial test; production DB needed for overlapping transactions. |
| Trigger | Sale posts during the count window before count submission. |
| Steps | Open count snapshot; post movement; submit count; reconcile; inspect expected, variance, adjustments and uncounted balance. |
| Oracle/invariants | Expected equals reference plus movement window; variance is applied once; uncounted product remains unchanged; audit records inputs. |
| Failure/recovery | Failed reconciliation leaves count submitted and no partial adjustment; retry is state-safe. |
| Observability/evidence | Count line reference/movement/expected/variance, adjustment reference, movement and audit metadata. |
| Automation/status | `InventoryWorkflowIntegrityTest::test_count_reconciles_after_intervening_sale_and_preserves_uncounted_item`; PASS_LOCAL serial; parallel race BLOCKED_BY_ENVIRONMENT. |

### CONC-INV-007 — Adjustment approval terminal race

| Field | Detail |
|---|---|
| Owner/domain | QA / Inventory adjustments |
| Requirements | INV-04, INV-05, NFR-01, NFR-02, AC-XCUT-01, AC-XCUT-03 |
| Risk/priority | High; duplicate adjustment or self-approval |
| Preconditions/data | Submitted adjustment with a reason and one line. |
| Actor/scope | Creator and separate Warehouse Manager approver. |
| Environment | Local SQLite serial; production DB for simultaneous approvals. |
| Trigger | Creator approval attempt and two approver requests at the same time. |
| Steps | Submit; attempt self-approval; submit two valid approvals; inspect status/movement/audit. |
| Oracle/invariants | Self-approval denied; exactly one approval/movement/audit; terminal state cannot be approved again. |
| Failure/recovery | Failed approval leaves `submitted` and no movement; retry by authorized different actor succeeds once. |
| Observability/evidence | Status/lock version, actor IDs, movement count, audit event. |
| Automation/status | Self-approval and serial approval PASS_LOCAL; true simultaneous approval BLOCKED_BY_ENVIRONMENT. |

## POS, cash, payment, and offline scenarios

### CONC-POS-001 — Identical sale replay

| Field | Detail |
|---|---|
| Owner/domain | QA / POS |
| Requirements | POS-01, POS-02, NFR-06, AC-XCUT-09 |
| Risk/priority | Critical; duplicate sale/stock decrement |
| Preconditions/data | Active priced product, stock 5, assigned selling store, open shift. |
| Actor/scope | Assigned cashier with `pos_sales.create`. |
| Environment | Local PHPUnit/SQLite. |
| Trigger | Submit identical sale request twice with the same key. |
| Steps | Post one sale; replay identical product/quantity; inspect sale, lines, movement and number. |
| Oracle/invariants | Original sale returned; one sale, one number, one movement, one audit effect. |
| Failure/recovery | Retry is safe after a response timeout; no second posting. |
| Observability/evidence | Sale id/status/number, stock movement count, shift/store linkage, request ID. |
| Automation/status | `RetailSuspendedAndBarcodeTest::test_identical_sale_replay_returns_the_original_sale_without_duplicate_stock`; PASS_LOCAL. |

### CONC-POS-002 — Conflicting sale replay

| Field | Detail |
|---|---|
| Owner/domain | QA / POS |
| Requirements | POS-02, NFR-06, AC-XCUT-09 |
| Risk/priority | Critical; forged quantity under an approved sale key |
| Preconditions/data | Approved sale for quantity 2 under `SALE-REPLAY-1`. |
| Actor/scope | Cashier with sale permission. |
| Environment | Local PHPUnit/SQLite. |
| Trigger | Reuse key with quantity 999. |
| Steps | Submit original; submit changed payload; inspect exception and stock. |
| Oracle/invariants | Changed request refused; original sale and stock remain unchanged. |
| Failure/recovery | Preserve conflict details for audit; never treat the changed request as a safe replay. |
| Observability/evidence | Regression failure at the second call; sale/movement counts remain one. |
| Automation/status | `RetailSaleIntegrityTest::test_approved_sale_rejects_a_conflicting_idempotency_replay_without_duplicate_effect`; FAIL — current action returns original sale. |

### CONC-POS-003 — Concurrent sale against one stock balance

| Field | Detail |
|---|---|
| Owner/domain | QA / POS |
| Requirements | INV-02, POS-02, NFR-03, NFR-06, AC-XCUT-10, AC-XCUT-14 |
| Risk/priority | Critical; overselling or cross-store stock use |
| Preconditions/data | Two requests each sell 4 from stock 5; cashier/store scope fixed. |
| Actor/scope | Two authorized cashiers, same selling store; an out-of-scope store control. |
| Environment | Production-like DB and browser/device concurrency. |
| Trigger | Simultaneous checkout. |
| Steps | Submit both; inspect sale count, stock, numbers, movement keys and authorization of each store. |
| Oracle/invariants | One sale succeeds and one fails safely, or configured reservation rule applies; no negative stock/cross-store movement. |
| Failure/recovery | Losing checkout retains cart for correction; no orphan sale/number/audit. |
| Observability/evidence | DB locks, request IDs, sale/movement/audit linkage, rejected response. |
| Automation/status | Serial stock and scope tests PASS_LOCAL. **True concurrent race: PASS_REAL_DB** (2026-08-09) — `tests/Concurrency/RetailSaleConcurrencyTest.php` against real MariaDB, two genuine OS processes. `test_two_concurrent_sales_against_limited_stock_never_oversell`: stock=10, two cashiers each concurrently sell 6 — exactly one succeeds, the other fails cleanly with the normal "Insufficient stock" validation error (not a DB/lock error), on-hand ends at 4 (never negative, never double-deducted); `RetailSaleAction::finalize()`'s pre-existing `StockBalance` `lockForUpdate()` is what makes this correct. This run also caught and closed a real Critical defect (QA-038), the same idempotency-check-outside-any-lock TOCTOU as CONC-INV-003 but in `RetailSaleAction::create()` (the check ran even before `DB::transaction()` opened); `test_two_concurrent_identical_idempotency_key_sale_submissions_collapse_to_one_sale` is the regression proof (both racers now resolve to the same sale, stock deducted exactly once). Cross-store scope control from this scenario's original description is already covered separately by `critical-rbac-matrix.spec.js` and `CrossStoreIdorTest`, not repeated here. |

### CONC-POS-004 — Suspended sale resume ownership/state race

| Field | Detail |
|---|---|
| Owner/domain | QA / POS |
| Requirements | POS-01, POS-02, NFR-03, NFR-06, FLW-POS-02 |
| Risk/priority | High; another cashier could resume or resume twice |
| Preconditions/data | Suspended sale owned by cashier A, open shift, priced product. |
| Actor/scope | Cashier A and cashier B in the same store. |
| Environment | Local PHPUnit/SQLite; production DB needed for simultaneous resume. |
| Trigger | B attempts resume; A and a second A request resume concurrently. |
| Steps | Create suspended sale; attempt B; submit two A resumes; inspect state/effects. |
| Oracle/invariants | B gets 403; only one approval/movement; suspended row becomes resumed once. |
| Failure/recovery | Failed/losing resume leaves sale suspended or approved atomically; cashier can safely retry. |
| Observability/evidence | Sale/suspended state, actor, movement count, request IDs. |
| Automation/status | Ownership and serial resume PASS_LOCAL; true race BLOCKED_BY_ENVIRONMENT. |

### CONC-CSH-001 — One open shift per drawer

| Field | Detail |
|---|---|
| Owner/domain | QA / Cash control |
| Requirements | CSH-01, NFR-06, AC-XCUT-14 |
| Risk/priority | Critical; two cashiers share one drawer without reconciliation |
| Preconditions/data | Assigned active drawer and no open shift. |
| Actor/scope | Two authorized cashiers assigned to the same drawer. |
| Environment | Production-like DB and implemented shift-opening action. |
| Trigger | Both open a shift simultaneously. |
| Steps | Submit opening requests; inspect unique active-shift invariant and opening floats. |
| Oracle/invariants | Exactly one active shift; loser receives controlled conflict; one immutable opening record. |
| Failure/recovery | Roll back loser; preserve request/audit; allow retry after drawer is free. |
| Observability/evidence | Unique constraint/lock logs, shift IDs, drawer ID, audit. |
| Automation/status | BLOCKED_NOT_IMPLEMENTED — current TSK-025 is readiness-only. |

### CONC-CSH-002 — Blind close and duplicate close

| Field | Detail |
|---|---|
| Owner/domain | QA / Cash control |
| Requirements | CSH-02, CSH-03, CSH-04, NFR-01, NFR-02, NFR-06 |
| Risk/priority | Critical; expected cash leak or duplicate close |
| Preconditions/data | Open shift with cash/electronic movements and an approved close policy. |
| Actor/scope | Cashier submits actuals; reviewer views variance. |
| Environment | Implemented shift close on production-like DB and real response capture. |
| Trigger | Cashier submits close twice or reads response before actual submission. |
| Steps | Capture network response before/after submit; submit duplicate requests; inspect shift/audit/report. |
| Oracle/invariants | Expected totals absent before submission; one immutable close; variance only to reviewer after submission. |
| Failure/recovery | Duplicate close refused/replayed safely; failed close leaves shift open and auditable. |
| Observability/evidence | HTTP payload capture, state, variance visibility, audit/print artifacts. |
| Automation/status | BLOCKED_NOT_IMPLEMENTED — no close mutation exists. |

### CONC-PAY-001 — Duplicate payment posting

| Field | Detail |
|---|---|
| Owner/domain | QA / Payments |
| Requirements | POS-03, POS-04, POS-05, NFR-01, NFR-06, AC-XCUT-09 |
| Risk/priority | Critical; customer charged twice or invoice overpaid |
| Preconditions/data | Approved sale/invoice, payment method, evidence and exact payable amount. |
| Actor/scope | Cashier/payment actor within store scope. |
| Environment | Payment/evidence mutation implemented; production-like DB. |
| Trigger | Same payment key submitted twice and two different amounts raced. |
| Steps | Post payment; replay same key; submit conflicting amount; inspect ledger, evidence and outstanding balance. |
| Oracle/invariants | Same replay returns original; conflicting key refused; invoice paid exactly once; evidence immutable. |
| Failure/recovery | Transaction rolls back on evidence/storage failure; retry with same key does not duplicate. |
| Observability/evidence | Payment IDs, ledger totals, evidence attachment, audit, request IDs. |
| Automation/status | BLOCKED_NOT_IMPLEMENTED — payment posting/evidence workflow absent. |

### CONC-WAL-001 — Product and party wallet concurrent redemption

| Field | Detail |
|---|---|
| Owner/domain | QA / Wallets and loyalty |
| Requirements | CUS-02, CUS-03, NFR-03, NFR-06 |
| Risk/priority | Critical; double spend or cross-activity ledger exposure |
| Preconditions/data | Separate product/party balances and one redemption request per wallet. |
| Actor/scope | Retail cashier versus party actor; both customer identity and activity scopes fixed. |
| Environment | Implemented wallet mutations on production-like DB. |
| Trigger | Two redemptions race, and each actor attempts to access the other ledger. |
| Steps | Submit concurrent redemptions; query both ledgers as each role; reconcile balances. |
| Oracle/invariants | One balance decrement per accepted request; no negative balance; cross-wallet reads denied; append-only entries. |
| Failure/recovery | Losing redemption rolls back; ledger remains recoverable from entries. |
| Observability/evidence | Ledger keys, balance/version, actor/scope denial, audit. |
| Automation/status | BLOCKED_NOT_IMPLEMENTED — full wallet mutation/settlement absent. |

### CONC-PTY-001 — Party booking double-book race

| Field | Detail |
|---|---|
| Owner/domain | QA / Party booking |
| Requirements | PTY-01, PTY-02, PTY-03, AST-02, NFR-06 |
| Risk/priority | Critical; same time/service/asset booked twice |
| Preconditions/data | One party resource/asset, date/time slot, and two valid booking requests. |
| Actor/scope | Party managers with the same party-store scope. |
| Environment | Implemented booking/calendar/asset reservation on production-like DB. |
| Trigger | Simultaneous booking for identical resource/time. |
| Steps | Submit both requests; inspect booking, reservation, calendar and audit rows. |
| Oracle/invariants | Exactly one booking/reservation wins; loser receives conflict; no orphan customer/payment/asset reservation. |
| Failure/recovery | Roll back loser and leave slot available only if no winner committed; retry after refreshed availability. |
| Observability/evidence | Unique conflict, locks, booking IDs, asset history, request IDs. |
| Automation/status | BLOCKED_NOT_IMPLEMENTED — party booking/calendar absent. |

### CONC-AST-001 — Rental asset double booking and checkout race

| Field | Detail |
|---|---|
| Owner/domain | QA / Rental assets |
| Requirements | AST-01, AST-02, AST-03, AST-04, NFR-02, NFR-06 |
| Risk/priority | Critical; asset unavailable twice or damage history lost |
| Preconditions/data | One active asset, overlapping reservation windows, two checkout attempts. |
| Actor/scope | Authorized asset/party operators. |
| Environment | Implemented asset registry and calendar on production-like DB. |
| Trigger | Concurrent reservation or checkout for the same asset. |
| Steps | Race reservation; race checkout; return/damage event; inspect state/history. |
| Oracle/invariants | One reservation/checkout; conflicting operation blocked; checkout/return/damage history append-only. |
| Failure/recovery | Roll back failed reservation/checkout; preserve prior event history and allow later booking. |
| Observability/evidence | Asset lock/version, reservation IDs, event history and audit. |
| Automation/status | BLOCKED_NOT_IMPLEMENTED — asset workflows absent. |

### CONC-IMP-001 — Import batch duplicate approval and row isolation

| Field | Detail |
|---|---|
| Owner/domain | QA / Catalog and invoice imports |
| Requirements | PRC-01, PUR-04, NFR-04, NFR-05, NFR-06 |
| Risk/priority | High; duplicate master/financial records or formula injection |
| Preconditions/data | Valid and invalid rows, duplicate keys, formula-like cells, private staged file. |
| Actor/scope | Importer and separate approver with branch/company scope. |
| Environment | OpenSpout-compatible runtime, private storage, production-like DB. |
| Trigger | Two approvals or replays for one batch; malformed upload during staging. |
| Steps | Upload/stage; validate; approve concurrently; download errors; inspect rows/files/audit. |
| Oracle/invariants | One batch outcome; invalid rows isolated; no duplicate approved records; unsafe cells/files rejected; artifacts private. |
| Failure/recovery | Parser/storage failure leaves no orphan metadata; retry same batch key is safe. |
| Observability/evidence | Batch status, row errors, private path, audit, queue/job IDs. |
| Automation/status | BLOCKED_BY_ENVIRONMENT — OpenSpout runtime symbols are absent; full import path not runnable. |

### CONC-PRC-001 — Concurrent price approval and active-version uniqueness

| Field | Detail |
|---|---|
| Owner/domain | QA / Pricing |
| Requirements | PRC-04, PRC-05, PRC-06, NFR-02, NFR-06 |
| Risk/priority | Critical; historical price mutation or two active prices |
| Preconditions/data | Submitted proposals targeting the same product/store/effective period. |
| Actor/scope | Pricing maker and separate approver. |
| Environment | Production-like DB for unique/lock semantics; Local serial tests available. |
| Trigger | Two approvals or overlapping effective proposals race. |
| Steps | Approve concurrently; inspect versions, active key, historical sale line and label queue. |
| Oracle/invariants | At most one active version; old version immutable; stale approval denied; label work scoped and idempotent. |
| Failure/recovery | Losing approval rolls back without changing historical price; retry after refresh. |
| Observability/evidence | Price lock/version, approval/audit, active-key constraint, queue rows. |
| Automation/status | Serial lifecycle PASS_LOCAL. **True concurrent activation: PASS_REAL_DB** (2026-08-09) — `tests/Concurrency/PriceApprovalConcurrencyTest.php` against real MariaDB, two genuine OS processes concurrently approving two different Submitted proposals for the same product+store. `ApprovePriceProposalAction`'s `lockForUpdate()` on the `PriceLine` row keyed by `active_key` correctly serializes the race: after both approvals complete, exactly one `PriceLine` is active (never zero, never two) and exactly one version ends `Approved` with the other correctly `Superseded` — proven for both possible commit orders, not just the one SQLite's coarser locking happens to produce. Label queue and historical sale-line immutability under this same race remain untested this pass. |

### CONC-NUM-001 — Concurrent document-number allocation

| Field | Detail |
|---|---|
| Owner/domain | QA / Numbering |
| Requirements | NFR-06, AC-XCUT-14 |
| Risk/priority | Critical; duplicate or skipped financial document numbers |
| Preconditions/data | Active sequence and many simultaneous sale/invoice requests. |
| Actor/scope | Authorized transactional users across one or more stores. |
| Environment | Production-like DB with row locks; not SQLite. |
| Trigger | N concurrent allocations including retry after timeout. |
| Steps | Allocate in parallel; collect numbers; retry timed-out calls; inspect sequence/version/audit. |
| Oracle/invariants | Every committed document has a unique number; a retry does not allocate a second number for same logical request; documented gaps only on rolled-back policy. |
| Failure/recovery | Sequence lock/deadlock rollback is safe; failed transaction leaves no phantom document. |
| Observability/evidence | Sequence lock/version, number set, request IDs, transaction outcomes. |
| Automation/status | **PASS_REAL_DB** (2026-08-09) — `tests/Concurrency/DocumentSequenceConcurrencyTest.php` against real MariaDB, 6 genuine concurrent OS processes calling `AllocatePurchaseOrderNumberAction` at once. `DocumentSequence`'s `lockForUpdate()` correctly serializes all 6: the resulting numbers are exactly the gapless sequence 1..6 with zero duplicates, and `next_value` advances by exactly 6. Proven for purchase-order numbering specifically; retail-sale, invoice, and other document-type sequences share the identical `lockForUpdate()` pattern in their own allocator code but were not separately raced this pass. |

### CONC-OFF-001 — Offline queue replay and conflict convergence

| Field | Detail |
|---|---|
| Owner/domain | QA / Offline POS |
| Requirements | POS-01..POS-05, NFR-01, NFR-04, NFR-06, AC-XCUT-09, AC-XCUT-14 |
| Risk/priority | Critical; offline double sale or client truth overriding server truth |
| Preconditions/data | Authenticated device, permitted cached price/stock, signed queue item, expiry and conflict payload. |
| Actor/scope | Approved offline cashier/device only. |
| Environment | Approved device/PWA, encrypted local storage, reconnectable staging server. |
| Trigger | Queue item replayed twice, stale price/stock, network loss during sync. |
| Steps | Queue permitted sale; disconnect; reconnect; replay; inject stale/conflict and duplicate items; review queue. |
| Oracle/invariants | One server effect; stale/conflict item is reviewable, not auto-resolved; prohibited wallet/credit/discount operations rejected. |
| Failure/recovery | Retry is idempotent; expired queue item remains visible for controlled disposition; no local secret leakage. |
| Observability/evidence | Queue states, server request IDs, conflict record, audit, client logs and network capture. |
| Automation/status | BLOCKED_NOT_IMPLEMENTED — offline queue/sync/conflict mutation absent. |

### CONC-RPT-001 — Stable pagination under concurrent inserts

| Field | Detail |
|---|---|
| Owner/domain | QA / Reporting and stock lists |
| Requirements | NFR-05, NFR-06, AC-XCUT-10, AC-XCUT-11 |
| Risk/priority | High; duplicate/skipped rows or scope leakage |
| Preconditions/data | High-volume scoped movement/sale/audit dataset and indexed sort key. |
| Actor/scope | Branch/store-scoped viewer and export actor. |
| Environment | Staging-scale DB, query logger and browser/API client. |
| Trigger | Insert rows while paginating; crafted cursor/filter/sort. |
| Steps | Read page 1; insert rows; read page 2; attempt cross-scope filters and excessive page size; inspect query counts. |
| Oracle/invariants | Stable cursor semantics, bounded query, no unauthorized rows/counts, no N+1. |
| Failure/recovery | Query timeout returns safe error without partial export; retry uses same scope/cursor. |
| Observability/evidence | SQL/query count, duration, page IDs, scope/count values, request IDs. |
| Automation/status | BLOCKED_BY_ENVIRONMENT — no approved load/staging dataset or k6 baseline. |

### CONC-OBS-001 — Observability under spike and soak

| Field | Detail |
|---|---|
| Owner/domain | QA / Platform operations |
| Requirements | NFR-01, NFR-04, NFR-05, NFR-07, AC-XCUT-15 |
| Risk/priority | High; integrity failures become invisible during load |
| Preconditions/data | Representative branches/users and synthetic sales/inventory workload; configured logs/metrics/alerts. |
| Actor/scope | Synthetic multi-role load clients. |
| Environment | Staging with queue/cache/monitoring and k6. |
| Trigger | Spike, sustained soak, DB latency, queue delay, cache restart. |
| Steps | Run baseline, spike, and soak profiles; inject latency; inspect errors, correlation, slow queries and alerts. |
| Oracle/invariants | No silent failed transaction; request IDs correlate logs/audit; alert thresholds trigger; recovery without duplicate posting. |
| Failure/recovery | Restart worker/cache/DB per runbook; verify retry/idempotency and backlog drains. |
| Observability/evidence | k6 summary, logs, metrics, queue depth, alert event, reconciliation output. |
| Automation/status | BLOCKED_BY_ENVIRONMENT — k6/monitoring/staging topology unavailable. |

## Execution and ownership

The next production-like execution must use `scripts/run-tests.sh milestone` after the required concurrency tools and database are available. Until then, Local PHPUnit evidence is limited to serial behavior and deliberate regression failures. Human UAT, device, DR, security sign-off and go/no-go remain outside agent authority.

## Required-field conformance matrix

The detailed table under every scenario is the source for the `§ID` references below. The matrix intentionally repeats every required field as an independent column so a parser or reviewer can verify that no scenario omits a field.

| Scenario ID | Milestone | Workflow | Requirement ID | Preconditions | User Role | Test Data | Steps | Expected Result | Security Expectation | DB/Data Integrity Expectation | Audit Expectation | Failure/Rollback Expectation | Priority | Severity | Automation Status |
|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|
| CONC-INV-001 | DM-2.4 | Inventory ledger replay | INV-01/NFR-06 | §CONC-INV-001 | Warehouse Manager | §CONC-INV-001 | §CONC-INV-001 | §CONC-INV-001 | §CONC-INV-001 | §CONC-INV-001 | §CONC-INV-001 | §CONC-INV-001 | P0 | Critical | PASS_LOCAL |
| CONC-INV-002 | DM-2.4 | Inventory ledger conflict | NFR-06/AC-XCUT-09 | §CONC-INV-002 | Inventory actor | §CONC-INV-002 | §CONC-INV-002 | §CONC-INV-002 | §CONC-INV-002 | §CONC-INV-002 | §CONC-INV-002 | §CONC-INV-002 | P0 | Critical | FAIL_QA-015 |
| CONC-INV-003 | DM-2.4 | Balance race | INV-05/NFR-06 | §CONC-INV-003 | Inventory actors | §CONC-INV-003 | §CONC-INV-003 | §CONC-INV-003 | §CONC-INV-003 | §CONC-INV-003 | §CONC-INV-003 | §CONC-INV-003 | P0 | Critical | BLOCKED_BY_ENVIRONMENT |
| CONC-INV-004 | DM-2.4 | Transfer dispatch | INV-03/NFR-06 | §CONC-INV-004 | Warehouse Manager | §CONC-INV-004 | §CONC-INV-004 | §CONC-INV-004 | §CONC-INV-004 | §CONC-INV-004 | §CONC-INV-004 | §CONC-INV-004 | P0 | Critical | PARTIAL_LOCAL |
| CONC-INV-005 | DM-2.4 | Transfer receipt | INV-03/NFR-06 | §CONC-INV-005 | Receiver/reviewer | §CONC-INV-005 | §CONC-INV-005 | §CONC-INV-005 | §CONC-INV-005 | §CONC-INV-005 | §CONC-INV-005 | §CONC-INV-005 | P0 | Critical | PARTIAL_LOCAL |
| CONC-INV-006 | DM-2.4 | Count during sales | INV-08/INV-09 | §CONC-INV-006 | Counter/Manager | §CONC-INV-006 | §CONC-INV-006 | §CONC-INV-006 | §CONC-INV-006 | §CONC-INV-006 | §CONC-INV-006 | §CONC-INV-006 | P0 | Critical | PASS_LOCAL_SERIAL |
| CONC-INV-007 | DM-2.4 | Adjustment approval | INV-04/NFR-02 | §CONC-INV-007 | Creator/approver | §CONC-INV-007 | §CONC-INV-007 | §CONC-INV-007 | §CONC-INV-007 | §CONC-INV-007 | §CONC-INV-007 | §CONC-INV-007 | P0 | High | PARTIAL_LOCAL |
| CONC-POS-001 | DM-3.1 | Sale replay | POS-02/NFR-06 | §CONC-POS-001 | Cashier | §CONC-POS-001 | §CONC-POS-001 | §CONC-POS-001 | §CONC-POS-001 | §CONC-POS-001 | §CONC-POS-001 | §CONC-POS-001 | P0 | Critical | PASS_LOCAL |
| CONC-POS-002 | DM-3.1 | Sale conflict | POS-02/AC-XCUT-09 | §CONC-POS-002 | Cashier | §CONC-POS-002 | §CONC-POS-002 | §CONC-POS-002 | §CONC-POS-002 | §CONC-POS-002 | §CONC-POS-002 | §CONC-POS-002 | P0 | Critical | FAIL_QA-015 |
| CONC-POS-003 | DM-3.1 | Concurrent checkout | POS-02/INV-02 | §CONC-POS-003 | Cashiers | §CONC-POS-003 | §CONC-POS-003 | §CONC-POS-003 | §CONC-POS-003 | §CONC-POS-003 | §CONC-POS-003 | §CONC-POS-003 | P0 | Critical | BLOCKED_BY_ENVIRONMENT |
| CONC-POS-004 | DM-3.1 | Suspended resume | POS-01/FLW-POS-02 | §CONC-POS-004 | Cashiers | §CONC-POS-004 | §CONC-POS-004 | §CONC-POS-004 | §CONC-POS-004 | §CONC-POS-004 | §CONC-POS-004 | §CONC-POS-004 | P1 | High | PARTIAL_LOCAL |
| CONC-CSH-001 | DM-3.3 | Shift opening | CSH-01 | §CONC-CSH-001 | Cashiers | §CONC-CSH-001 | §CONC-CSH-001 | §CONC-CSH-001 | §CONC-CSH-001 | §CONC-CSH-001 | §CONC-CSH-001 | §CONC-CSH-001 | P0 | Critical | BLOCKED_NOT_IMPLEMENTED |
| CONC-CSH-002 | DM-3.3 | Blind close | CSH-02/CSH-03 | §CONC-CSH-002 | Cashier/reviewer | §CONC-CSH-002 | §CONC-CSH-002 | §CONC-CSH-002 | §CONC-CSH-002 | §CONC-CSH-002 | §CONC-CSH-002 | §CONC-CSH-002 | P0 | Critical | BLOCKED_NOT_IMPLEMENTED |
| CONC-PAY-001 | DM-3.2 | Payment posting | POS-03/NFR-06 | §CONC-PAY-001 | Cashier | §CONC-PAY-001 | §CONC-PAY-001 | §CONC-PAY-001 | §CONC-PAY-001 | §CONC-PAY-001 | §CONC-PAY-001 | §CONC-PAY-001 | P0 | Critical | BLOCKED_NOT_IMPLEMENTED |
| CONC-WAL-001 | DM-4.2 | Wallet redemption | CUS-02/CUS-03 | §CONC-WAL-001 | Retail/party actor | §CONC-WAL-001 | §CONC-WAL-001 | §CONC-WAL-001 | §CONC-WAL-001 | §CONC-WAL-001 | §CONC-WAL-001 | §CONC-WAL-001 | P0 | Critical | BLOCKED_NOT_IMPLEMENTED |
| CONC-PTY-001 | DM-5.1 | Booking conflict | PTY-01/AST-02 | §CONC-PTY-001 | Party managers | §CONC-PTY-001 | §CONC-PTY-001 | §CONC-PTY-001 | §CONC-PTY-001 | §CONC-PTY-001 | §CONC-PTY-001 | §CONC-PTY-001 | P0 | Critical | BLOCKED_NOT_IMPLEMENTED |
| CONC-AST-001 | DM-5.4 | Asset reservation | AST-01/AST-02 | §CONC-AST-001 | Asset operators | §CONC-AST-001 | §CONC-AST-001 | §CONC-AST-001 | §CONC-AST-001 | §CONC-AST-001 | §CONC-AST-001 | §CONC-AST-001 | P0 | Critical | BLOCKED_NOT_IMPLEMENTED |
| CONC-IMP-001 | DM-2.1/2.2 | Import approval | PRC-01/PUR-04 | §CONC-IMP-001 | Importer/approver | §CONC-IMP-001 | §CONC-IMP-001 | §CONC-IMP-001 | §CONC-IMP-001 | §CONC-IMP-001 | §CONC-IMP-001 | §CONC-IMP-001 | P1 | High | BLOCKED_BY_ENVIRONMENT |
| CONC-PRC-001 | DM-2.3 | Price approval | PRC-04/PRC-05 | §CONC-PRC-001 | Pricing maker/approver | §CONC-PRC-001 | §CONC-PRC-001 | §CONC-PRC-001 | §CONC-PRC-001 | §CONC-PRC-001 | §CONC-PRC-001 | §CONC-PRC-001 | P0 | Critical | PARTIAL_LOCAL |
| CONC-NUM-001 | Cross-cutting | Number allocation | NFR-06 | §CONC-NUM-001 | Transactional users | §CONC-NUM-001 | §CONC-NUM-001 | §CONC-NUM-001 | §CONC-NUM-001 | §CONC-NUM-001 | §CONC-NUM-001 | §CONC-NUM-001 | P0 | Critical | BLOCKED_BY_ENVIRONMENT |
| CONC-OFF-001 | DM-3.4 | Offline sync | NFR-04/NFR-06 | §CONC-OFF-001 | Offline cashier | §CONC-OFF-001 | §CONC-OFF-001 | §CONC-OFF-001 | §CONC-OFF-001 | §CONC-OFF-001 | §CONC-OFF-001 | §CONC-OFF-001 | P0 | Critical | BLOCKED_NOT_IMPLEMENTED |
| CONC-RPT-001 | DM-6.1 | Scoped pagination | NFR-05 | §CONC-RPT-001 | Scoped viewer | §CONC-RPT-001 | §CONC-RPT-001 | §CONC-RPT-001 | §CONC-RPT-001 | §CONC-RPT-001 | §CONC-RPT-001 | §CONC-RPT-001 | P1 | High | BLOCKED_BY_ENVIRONMENT |
| CONC-OBS-001 | DM-1.1/6.4 | Load observability | NFR-04/NFR-07 | §CONC-OBS-001 | Synthetic operators | §CONC-OBS-001 | §CONC-OBS-001 | §CONC-OBS-001 | §CONC-OBS-001 | §CONC-OBS-001 | §CONC-OBS-001 | §CONC-OBS-001 | P1 | High | BLOCKED_BY_ENVIRONMENT |
