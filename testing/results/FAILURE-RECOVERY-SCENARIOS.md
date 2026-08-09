# Failure, Rollback, Recovery, and Resilience Scenario Register

Audit date: 2026-08-08  
Scope: transaction/rollback behavior, invalid state transitions, error handling, chaos/resilience, stress/spike/soak, migration/upgrade, deployment rollback, backup/restore, observability and recovery for all Phase 1 domains.

Each scenario includes the required fields: ID, domain/owner, requirements, risk, preconditions/data, actor/scope, environment, trigger/fault injection, steps, expected result/invariants, rollback/recovery action, observability/evidence, automation/status, and dependencies. This register separates executable Local/Dev checks from `BLOCKED_NOT_IMPLEMENTED` functionality and `BLOCKED_BY_ENVIRONMENT` infrastructure. It does not certify UAT, devices, production recovery, or go-live.

## Current recovery evidence

| Evidence | Result |
|---|---|
| Inventory negative/zero/invalid movement rollback | PASS_LOCAL in `InventoryMovementIntegrityTest` and `InventoryWorkflowIntegrityTest`. |
| POS insufficient stock/unpriced rollback | PASS_LOCAL in `RetailSaleIntegrityTest`. |
| Count/adjustment/transfer transaction behavior | PASS_LOCAL for serial implemented paths; true crash/DB-failure injection remains open. |
| Known regression failures | QA-015 and QA-027 fixed and regression-verified 2026-08-08 (see `DEFECTS.md`); FAIL-INV-002 and FAIL-POS-002 below corrected from their prior stale FAIL notes. |
| Mid-transaction atomicity (added 2026-08-09) | `InventoryFaultInjectionAtomicityTest` and `RetailSaleIntegrityTest` now force a REAL failure (not mocked) on the second line of a multi-line `DB::transaction()` — transfer receipt, count reconciliation, and suspended-sale resume — and prove the first line's already-applied write rolls back too. Previously only "first line fails" (trivial) or "every line succeeds" was tested; this closes that gap for FAIL-INV-003/004 and FAIL-POS-003's server-side atomicity claim. Literal process-crash/power-loss/DB-connection-drop mid-transaction still requires a chaos harness and remains open (FAIL-CHAOS-001). |
| Migration rollback (added 2026-08-09) | `php artisan migrate:rollback` executed end-to-end for the first time, full 41-migration round trip against both SQLite and real MariaDB. Found and fixed 3 real Critical `down()` defects (QA-042, QA-043) that crashed a genuine rollback; permanent coverage added in `MigrationRollbackIntegrityTest`. Proves schema-level reversibility from a fresh/empty schema only — a populated-dataset rollback rehearsal remains open, see FAIL-MIG-002. |
| Production recovery | QA-012/QA-022/QA-023: backup/restore, DR drill, and a real deployment-pipeline rollback rehearsal (as opposed to schema-only migration rollback, now proven above) remain unavailable; ownership and topology are not available. |
| Performance/resilience | QA-024: no k6/load/soak/chaos execution or accepted thresholds. |

## Inventory, transfers, counts, and POS

### FAIL-INV-001 — Invalid/zero/negative movement rollback

| Field | Detail |
|---|---|
| Owner/domain | QA / Inventory ledger |
| Requirements | INV-04, INV-05, NFR-01, NFR-06, AC-XCUT-08 |
| Risk/priority | Critical; partial stock/value write |
| Preconditions/data | Isolated product/store balance; zero, invalid decimal, and negative exit inputs. |
| Actor/scope | Authenticated inventory actor; store scope fixed. |
| Environment | Local PHPUnit with SQLite migrations. |
| Trigger/fault | Invalid decimal, zero quantity, or negative result without override. |
| Steps | Submit each invalid movement; inspect balance, movement, audit and transaction state. |
| Expected/invariants | Controlled `InvalidArgumentException`; no stock movement, balance creation/update or audit row; prior stock preserved. |
| Rollback/recovery | Retry with valid quantity/new key after correction; do not reuse a failed key as a committed effect. |
| Observability/evidence | Test assertions, exception, row counts and balance values. |
| Automation/status | `InventoryMovementIntegrityTest` and `InventoryWorkflowIntegrityTest`; PASS_LOCAL for invalid/zero/negative boundaries. |

### FAIL-INV-002 — Fractional quantity policy failure

| Field | Detail |
|---|---|
| Owner/domain | QA / Inventory validation |
| Requirements | INV-06, NFR-02 |
| Risk/priority | High; stock precision and reconciliation corruption |
| Preconditions/data | Product with `fractional_quantity=false`, valid store balance. |
| Actor/scope | Authorized inventory actor. |
| Environment | Local PHPUnit/SQLite. |
| Trigger/fault | Submit `0.5` inventory entry for a whole-quantity product. |
| Steps | Invoke `PostInventoryMovement`; inspect exception and rows. |
| Expected/invariants | Request rejected before movement/balance effect; fractional products may accept configured precision only. |
| Rollback/recovery | Remove/repair any accidental movement through an approved correction, preserving history; do not delete the row. |
| Observability/evidence | `InventoryWorkflowIntegrityTest::test_fractional_quantity_is_rejected_for_a_product_without_fractional_configuration` — passing. |
| Automation/status | PASS_LOCAL (fixed as QA-027, 2026-08-08 — `PostInventoryMovement::execute()` now loads `Product.fractional_quantity` and rejects a non-zero fractional remainder). |

### FAIL-INV-003 — Transfer invalid state and partial-receipt rollback

| Field | Detail |
|---|---|
| Owner/domain | QA / Inventory transfers |
| Requirements | INV-03, NFR-01, NFR-02, AC-XCUT-03, AC-XCUT-08 |
| Risk/priority | Critical; source/destination divergence |
| Preconditions/data | Draft/submitted/approved/in-transit transfer with one or more lines. |
| Actor/scope | Requester, approver, dispatcher, receiver and difference reviewer with distinct scopes. |
| Environment | Local PHPUnit/SQLite; production DB for crash injection. |
| Trigger/fault | Approve draft directly, dispatch submitted transfer, receive above dispatched quantity, or fail during a multi-line receipt. |
| Steps | Invoke invalid transition; invoke invalid quantity; inject a failure between line postings; inspect transfer, lines, movements and balances. |
| Expected/invariants | Invalid transition/quantity rejected; all line and stock writes atomic; transfer remains prior state; no partial audit. |
| Rollback/recovery | Retry only from valid state; reconcile source/in-transit/destination after any failure. |
| Observability/evidence | `InventoryWorkflowIntegrityTest` transfer tests, status/line/movement/audit counts. |
| Automation/status | PASS_LOCAL for serial validation/rollback. **Mid-transaction failure injection: PASS_LOCAL** (2026-08-09) — `InventoryFaultInjectionAtomicityTest::test_a_failure_on_the_second_transfer_receipt_line_rolls_back_the_first_lines_already_applied_movement` forces a real `PostInventoryMovement` rejection (fractional receipt against a non-fractional product) on the SECOND of two transfer lines, after the first line's movement has already been applied inside the same `DB::transaction()`. Proves the first line's movement, balance, and in-transit updates are all rolled back together with the second line's failure — not left as a partial/orphan commit. Because `StockTransfer::lines()` has no explicit `orderBy`, the test also asserts the actual `[lineA, lineB]` iteration order it depends on before relying on it, and a companion positive-control test (`test_two_transfer_receipt_lines_both_post_when_uninterrupted`) proves both lines genuinely post when nothing fails — together ruling out the alternative "line 2 just ran first and line 1 was never reached" explanation for the rollback test's zero-effect result. This is real fault injection (a genuine business-rule rejection mid-loop), not a mock, but it does not prove recovery from an actual process crash/power loss/DB-connection drop mid-transaction, which still requires a chaos-engineering harness and remains open under FAIL-CHAOS-001. |

### FAIL-INV-004 — Count reconciliation failure after movement window

| Field | Detail |
|---|---|
| Owner/domain | QA / Stock counts |
| Requirements | INV-07, INV-08, INV-09, NFR-01, AC-XCUT-08 |
| Risk/priority | Critical; count adjustment double-applied or uncounted stock zeroed |
| Preconditions/data | Submitted count with counted and uncounted lines plus movement after reference time. |
| Actor/scope | Stock Counter submits; Warehouse Manager reconciles; self-approval denied. |
| Environment | Local SQLite; production-like DB for concurrent sales/approval. |
| Trigger/fault | Reconcile before submit, self-approve, fail after adjustment creation, or retry reconcile. |
| Steps | Execute each failure; inspect count status, adjustment, movement and uncounted balance. |
| Expected/invariants | No effect before approved reconciliation; failed/rejected call leaves prior state; one adjustment for counted variance; uncounted line untouched. |
| Rollback/recovery | Roll back adjustment and count state together; retry only from submitted by a separate approver. |
| Observability/evidence | Count line arithmetic, adjustment reference, movement count, audit metadata. |
| Automation/status | Serial paths PASS_LOCAL. **Mid-transaction failure injection: PASS_LOCAL** (2026-08-09) — `InventoryFaultInjectionAtomicityTest::test_a_failure_on_the_second_count_variance_line_rolls_back_the_adjustment_header_and_the_first_lines_movement` forces a real `PostInventoryMovement` rejection on the second of two variance lines. Proves the `InventoryAdjustment` HEADER row — created before the line loop even starts — is rolled back along with the first line's already-created `InventoryAdjustmentLine` and movement, leaving zero orphan/partial adjustment. True concurrent-race recovery (two reconciliations racing the same count) remains untested; a real process crash/power loss mid-transaction remains open under FAIL-CHAOS-001. |

### FAIL-POS-001 — POS pre-posting failure recovery

| Field | Detail |
|---|---|
| Owner/domain | QA / POS checkout |
| Requirements | INV-02, POS-01, POS-02, PRC-07, NFR-01, NFR-06 |
| Risk/priority | Critical; sale created without stock or stock decremented without sale |
| Preconditions/data | Assigned store, open shift, priced and unpriced products, stock below requested quantity. |
| Actor/scope | Cashier and out-of-scope store control. |
| Environment | Local PHPUnit/SQLite. |
| Trigger/fault | Unpriced product, insufficient stock, no active shift, out-of-scope store. |
| Steps | Invoke sale; inspect sales, lines, numbers, movements, balances, cart/session and audit. |
| Expected/invariants | Controlled rejection; no sale/number/movement on pre-post failure; existing stock/cart remains usable; scope denial is server-side. |
| Rollback/recovery | Correct price/stock/shift and retry with a new or policy-safe key; preserve request error evidence. |
| Observability/evidence | `RetailSaleIntegrityTest`; no sale/movement/sequence rows on failure. |
| Automation/status | PASS_LOCAL for implemented pre-post failures. |

### FAIL-POS-002 — POS conflicting replay recovery

| Field | Detail |
|---|---|
| Owner/domain | QA / POS idempotency |
| Requirements | POS-02, NFR-06, AC-XCUT-09 |
| Risk/priority | Critical; forged/duplicate checkout |
| Preconditions/data | Approved sale under an existing idempotency key. |
| Actor/scope | Authorized cashier. |
| Environment | Local PHPUnit/SQLite. |
| Trigger/fault | Reuse key with changed quantity/product. |
| Steps | Post original; submit conflicting replay; inspect response and rows. |
| Expected/invariants | Conflicting replay refused; original sale/stock/audit remain exactly once. |
| Rollback/recovery | Record conflict; require a new key for a genuinely new sale; never silently return original result. |
| Observability/evidence | `RetailSaleIntegrityTest::test_approved_sale_rejects_a_conflicting_idempotency_replay_without_duplicate_effect` — passing. |
| Automation/status | PASS_LOCAL (fixed as QA-015, 2026-08-08 — `RetailSaleAction::create()` now compares the replayed payload against the original before returning it; a changed payload throws instead of silently replaying). Note: this is the single-process/sequential conflicting-payload case. The genuinely-concurrent *identical*-payload race (two real processes racing the same key) is a distinct claim, covered by CONC-POS-003/QA-038 in `CONCURRENCY-SCENARIOS.md`, not this scenario. |

### FAIL-POS-003 — Suspended-sale interruption and resume recovery

| Field | Detail |
|---|---|
| Owner/domain | QA / POS suspended sales |
| Requirements | POS-01, POS-02, NFR-03, NFR-06, FLW-POS-02 |
| Risk/priority | High; abandoned cart or duplicate resume |
| Preconditions/data | Suspended sale, owner cashier, open shift and product/price. |
| Actor/scope | Owner cashier and non-owner cashier. |
| Environment | Local PHPUnit; production DB/browser interruption for crash. |
| Trigger/fault | Browser/network interruption during suspend or resume; non-owner resume; second resume. |
| Steps | Suspend; interrupt response; reload suspended list; attempt non-owner and duplicate resume; inspect state/effects. |
| Expected/invariants | Suspend has no stock effect; owner resume posts once; non-owner denied; duplicate resume terminal-safe. |
| Rollback/recovery | Keep suspended state if resume transaction fails; retry without duplicate movement. |
| Observability/evidence | Suspension/resume status, movement count, actor, request ID. |
| Automation/status | PASS_LOCAL for serial ownership/suspend/resume. **Mid-transaction failure injection: PASS_LOCAL** (2026-08-09) — `RetailSaleIntegrityTest::test_a_failure_on_the_second_line_during_suspended_sale_resume_rolls_back_the_first_lines_movement` forces a real `PostInventoryMovement` rejection on the second of two sale lines during `finalizeSuspended()`. Proves the first line's already-posted movement, the sale's `approved`/`document_number` flip, and the suspension's `resumed` flip are ALL rolled back together — the sale correctly stays `suspended` and resumable, not left half-finalized. Because `finalize()`'s per-line posting loop has no explicit ordering guarantee either, the load-bearing proof is `assertDatabaseMissing('document_sequences', ['document_type' => 'retail_sale'])`: `allocateNumber()` runs unconditionally *before* the posting loop and creates that row on first use, so its absence proves a real rollback regardless of which line the loop reaches first — the movement/balance assertions reinforce this but are not, on their own, order-independent. This is a real business-rule failure mid-transaction, not a literal browser/network interruption or process crash — the client-interruption-during-suspend trigger (the suspend request's response never reaching the browser) and true concurrent-resume racing remain untested. |

## Payments, shifts, wallets, parties, and assets

### FAIL-PAY-001 — Payment/evidence transaction rollback

| Field | Detail |
|---|---|
| Owner/domain | QA / POS payments |
| Requirements | POS-03, POS-04, POS-05, NFR-01, NFR-02, AC-XCUT-04, AC-XCUT-08, AC-XCUT-09 |
| Risk/priority | Critical; payment without evidence or duplicate charge |
| Preconditions/data | Approved sale/invoice, cash/electronic method, evidence attachment and payment key. |
| Actor/scope | Cashier and reviewer with evidence scope. |
| Environment | Payment/evidence implementation, private storage, production-like DB. |
| Trigger/fault | Storage failure after payment row, invalid evidence, duplicate key, DB failure before commit. |
| Steps | Submit each fault; inspect payment, evidence, invoice total, shift/drawer, audit and storage. |
| Expected/invariants | All-or-nothing transaction; no orphan file/metadata/payment/audit; same replay safe; conflicting replay refused. |
| Rollback/recovery | Delete no business history; clean temporary file safely; retry with same logical request after failure. |
| Observability/evidence | Payment/evidence IDs, storage fake, DB transaction, audit, request ID. |
| Automation/status | BLOCKED_NOT_IMPLEMENTED — payment/evidence posting absent. |

### FAIL-CSH-001 — Shift opening/close failure and drawer recovery

| Field | Detail |
|---|---|
| Owner/domain | QA / Cash control |
| Requirements | CSH-01, CSH-02, CSH-03, CSH-04, NFR-01, NFR-02, NFR-06 |
| Risk/priority | Critical; orphan open shift or unreviewed cash variance |
| Preconditions/data | Assigned active drawer, opening float, shift transactions, close actuals and policy. |
| Actor/scope | Cashier opens/closes; reviewer sees variance; drawer scope enforced. |
| Environment | Implemented shift lifecycle on production-like DB; response capture and print renderer. |
| Trigger/fault | Duplicate opening, crash during close, invalid actual, duplicate close, print failure. |
| Steps | Inject each fault; inspect shift/drawer state, totals, variance, audit and receipt/A4 artifact. |
| Expected/invariants | No orphan/duplicate shift; blind close payload safe; failed close leaves open shift; terminal close immutable; print failure does not undo committed close. |
| Rollback/recovery | Resume open shift or use referenced correction; reprint from immutable source; never edit expected totals directly. |
| Observability/evidence | Shift state, lock/version, response payload, variance visibility, print job/error, audit. |
| Automation/status | BLOCKED_NOT_IMPLEMENTED — TSK-025 is readiness-only. |

### FAIL-WAL-001 — Wallet redemption and ledger rollback

| Field | Detail |
|---|---|
| Owner/domain | QA / Product and Party Wallets |
| Requirements | CUS-02, CUS-03, NFR-01, NFR-02, NFR-03, NFR-06 |
| Risk/priority | Critical; balance drift or cross-activity leakage |
| Preconditions/data | Product and party ledgers with balances, source references and redemption keys. |
| Actor/scope | Retail actor cannot see party ledger; party actor cannot see product ledger. |
| Environment | Implemented wallet mutation with production-like DB. |
| Trigger/fault | Concurrent redemption, insufficient balance, audit/storage failure, duplicate/conflicting key. |
| Steps | Submit faults; inspect ledger entries, balances, source document, audit and visibility. |
| Expected/invariants | No negative balance or orphan ledger; rollback preserves prior balance; ledgers remain physically and permission separated. |
| Rollback/recovery | Reconcile balance from append-only ledger; correct through referenced adjustment, not direct edit. |
| Observability/evidence | Entry IDs, balance/version, actor/scope responses, audit and reconciliation. |
| Automation/status | BLOCKED_NOT_IMPLEMENTED — full wallet mutation/settlement absent; storage isolation only is covered. |

### FAIL-PTY-001 — Party booking/invoice/payment recovery

| Field | Detail |
|---|---|
| Owner/domain | QA / Party operations |
| Requirements | PTY-01..PTY-06, CUS-02, NFR-01, NFR-02, NFR-06 |
| Risk/priority | Critical; double booking, orphan payment, editable closed invoice |
| Preconditions/data | Customer/child consent, party slot/service, working invoice, payment-on-account and assets. |
| Actor/scope | Party manager, cashier and reviewer with separated activity scope. |
| Environment | Implemented party workflow on staging-like DB. |
| Trigger/fault | Booking conflict, payment failure, final-close failure, retry after timeout, post-close edit. |
| Steps | Inject fault at each lifecycle boundary; inspect booking, invoice, payments, wallet separation, assets and audit. |
| Expected/invariants | Atomic booking/payment/close; no duplicate payment or double booking; closed invoice immutable; correction references original. |
| Rollback/recovery | Cancel/reverse through referenced documents; preserve customer/child and payment history; reconcile outstanding balance. |
| Observability/evidence | State machine/audit/timeline, payment totals, asset reservations, request IDs. |
| Automation/status | BLOCKED_NOT_IMPLEMENTED — party booking/invoice/payment mutations absent. |

### FAIL-AST-001 — Asset reservation/return/damage recovery

| Field | Detail |
|---|---|
| Owner/domain | QA / Rental assets |
| Requirements | AST-01..AST-05, NFR-01, NFR-02, NFR-06 |
| Risk/priority | Critical; lost asset state or double booking |
| Preconditions/data | Asset registry, reservation window, checkout/return condition and damage evidence. |
| Actor/scope | Authorized asset operator and reviewer. |
| Environment | Implemented asset module, private evidence storage and production-like DB. |
| Trigger/fault | Concurrent booking, checkout failure, missing/unsafe evidence, return interruption, damage assessment failure. |
| Steps | Inject faults; inspect asset state/history, reservation, evidence, depreciation and audit. |
| Expected/invariants | No double booking; transitions atomic; evidence private; history append-only; damage/return correction referenced. |
| Rollback/recovery | Restore prior asset state through transaction; retry after cleanup; never delete event history. |
| Observability/evidence | Asset state/version, event IDs, storage and audit records, conflict response. |
| Automation/status | BLOCKED_NOT_IMPLEMENTED — asset registry/calendar/events absent. |

## Imports, files, and application boundaries

### FAIL-IMP-001 — Import parser/runtime failure

| Field | Detail |
|---|---|
| Owner/domain | QA / Imports |
| Requirements | PRC-01, PUR-04, NFR-04, NFR-05, AC-XCUT-04, AC-XCUT-05 |
| Risk/priority | High; silent partial import or unsafe artifact |
| Preconditions/data | Valid workbook, malformed workbook, formula/macro cell, oversized/mismatched file, private batch directory. |
| Actor/scope | Importer and separate approver; company/branch scope. |
| Environment | OpenSpout dependency matching `composer.lock`, private filesystem, isolated DB. |
| Trigger/fault | Missing reader symbol, parse exception, storage failure, duplicate approval, unsafe file. |
| Steps | Stage/validate/approve each fixture; inspect batch/row/artifact/audit state. |
| Expected/invariants | Runtime dependency failure is a controlled blocker; no partial approved rows/orphan file; invalid rows isolated; formula cells safe. |
| Rollback/recovery | Reinstall/align dependency; retry batch idempotently; remove only temporary rejected artifact per retention policy. |
| Observability/evidence | `ImportRuntimeCompatibilityTest`, skipped cases, PHPStan symbol errors and batch rows. |
| Automation/status | BLOCKED_BY_ENVIRONMENT — OpenSpout runtime absent; five import cases skipped. |

### FAIL-FILE-001 — Protected attachment failure cleanup

| Field | Detail |
|---|---|
| Owner/domain | QA / Attachments |
| Requirements | NFR-01, NFR-03, NFR-04, AC-XCUT-04, AC-XCUT-05, AC-XCUT-08 |
| Risk/priority | High; orphan sensitive file or cross-scope download |
| Preconditions/data | Valid private file, unsafe/mismatched/empty/oversized/traversal files, authorized/out-of-scope actors. |
| Actor/scope | Source-authorized user and unauthorized user. |
| Environment | Local test storage fake and isolated DB. |
| Trigger/fault | Rejected validation, storage failure mid-write, guessed ID/direct public URL, revoked file. |
| Steps | Upload/download each case; inspect storage, metadata, response headers/body and audit. |
| Expected/invariants | Rejected upload leaves no file/metadata/audit; unauthorized download denied without path leak; safe headers. |
| Rollback/recovery | Cleanup temporary file; preserve quarantined evidence state; retry authorized valid upload. |
| Observability/evidence | `AttachmentFoundationTest`, storage fake, metadata and HTTP status. |
| Automation/status | PASS_LOCAL for foundation scope; source-specific business attachment workflows remain blocked. |

### FAIL-API-001 — Direct route/action authorization failure recovery

| Field | Detail |
|---|---|
| Owner/domain | QA / Authorization and security |
| Requirements | NFR-03, NFR-05, AC-XCUT-10, SEC-011..SEC-021 |
| Risk/priority | Critical; unauthorized mutation or data leak |
| Preconditions/data | Users with no permission, branch scope, store scope, and super-admin bypass; protected records. |
| Actor/scope | Direct URL, POST/action and forged parameters from each actor. |
| Environment | Local PHPUnit/HTTP tests. |
| Trigger/fault | Bypass hidden controls; use out-of-scope ID/filter; submit forged action. |
| Steps | Invoke route/action directly; inspect status, body, DB/audit and scope counts. |
| Expected/invariants | 401/403/404 as policy dictates; no mutation/audit on denial; counts and filters cannot reveal out-of-scope rows. |
| Rollback/recovery | No rollback should be needed because denied request is side-effect free; investigate any row/audit change as critical. |
| Observability/evidence | Authorization and scope test outputs, request IDs, DB count assertions. |
| Automation/status | PASS_LOCAL for covered current routes; complete route/action matrix remains partial (QA-021). |

## Performance, chaos, migration, deployment, and DR

### FAIL-PERF-001 — Spike, stress, and soak workload

| Field | Detail |
|---|---|
| Owner/domain | QA / Performance |
| Requirements | NFR-05, NFR-06, AC-XCUT-11, AC-XCUT-14, AC-XCUT-15 |
| Risk/priority | High; integrity failure or unacceptable latency under operations load |
| Preconditions/data | 50k products/1m movements plus realistic sales, transfers, counts and scoped users; accepted latency/error thresholds. |
| Actor/scope | Synthetic multi-branch workload. |
| Environment | Staging-like DB/cache/queue with k6 and query logging. |
| Trigger/fault | Baseline, spike above peak, sustained soak, concurrent inserts and lock contention. |
| Steps | Run baseline/stress/spike/soak; collect latency, error, lock, query, queue and reconciliation metrics. |
| Expected/invariants | Thresholds met; no duplicate/negative/imbalanced records; errors recover without silent loss. |
| Rollback/recovery | Drain queues, restart workers only under runbook, reconcile ledgers, preserve load evidence. |
| Observability/evidence | k6 report, slow-query log, queue metrics, DB locks, reconciliation report. |
| Automation/status | BLOCKED_BY_ENVIRONMENT — k6/accepted thresholds/staging topology unavailable; fixture generation is diagnostic only. |

### FAIL-CHAOS-001 — Database/cache/queue/storage interruption

| Field | Detail |
|---|---|
| Owner/domain | QA / Platform resilience |
| Requirements | NFR-01, NFR-04, NFR-06, NFR-07, AC-XCUT-08, AC-XCUT-09, AC-XCUT-15 |
| Risk/priority | Critical; partial financial/stock commit or lost queue work |
| Preconditions/data | Staging snapshot, backup, queues/cache/storage, synthetic transactional workload. |
| Actor/scope | Operators and synthetic users under approved runbook. |
| Environment | Isolated staging only; never production. |
| Trigger/fault | DB connection loss mid-transaction, cache restart, worker kill, queue delay, private-storage outage. |
| Steps | Execute fault; observe response/logs; restore service; retry logical requests; reconcile all ledgers and audit. |
| Expected/invariants | Atomic transactions; safe error with request ID; retry/idempotency prevents duplicate; no orphan audit/file/job; backlog drains. |
| Rollback/recovery | Follow named runbook, restore service/backup copy, replay only safe queued work, document RPO/RTO. |
| Observability/evidence | Error logs, request IDs, queue attempts, DB transaction outcomes, reconciliation and incident timeline. |
| Automation/status | BLOCKED_BY_ENVIRONMENT — production-like infrastructure, chaos tooling and approved runbook absent. |

### FAIL-MIG-001 — Clean migration and seed recovery

| Field | Detail |
|---|---|
| Owner/domain | QA / Database release |
| Requirements | MD-01, NFR-01, NFR-03, NFR-06, AC-XCUT-16 |
| Risk/priority | High; deployment cannot initialize or seeds unsafe data |
| Preconditions/data | Empty isolated database, current migration set, canonical authorization seed and Local Demo restrictions. |
| Actor/scope | Deployment service account only. |
| Environment | Local isolated SQLite currently available; production engine still owner decision. |
| Trigger/fault | Fresh migrate/seed, interrupted migration, rerun seed, forbidden production DemoSeeder. |
| Steps | Run fresh migration/seed; interrupt/retry in disposable DB; inspect schema/constraints/roles and environment guard. |
| Expected/invariants | Clean rebuild succeeds; rerun is safe; no Demo data in non-local; FKs/indexes/unique constraints present. |
| Rollback/recovery | Restore clean snapshot or rerun migration transaction; never repair production by destructive ad hoc SQL. |
| Observability/evidence | Clean temporary migration/seed PASS_LOCAL; migration status/schema inspection. |
| Automation/status | PASS_LOCAL for isolated SQLite; production-engine migration rehearsal BLOCKED_BY_ENVIRONMENT. |

### FAIL-MIG-002 — Upgrade and downgrade compatibility

| Field | Detail |
|---|---|
| Owner/domain | QA / Database release |
| Requirements | NFR-01, NFR-02, NFR-06, AC-XCUT-06, AC-XCUT-16 |
| Risk/priority | Critical; loss of immutable history or incompatible schema |
| Preconditions/data | Anonymized representative DB with movements, sales, audit, permissions and settings. |
| Actor/scope | Release operator; no user writes during migration window unless explicitly supported. |
| Environment | Staging copy with exact production DB engine/version. |
| Trigger/fault | Apply upgrade, restart mid-migration, attempt downgrade/rollback, compare row counts/checksums. |
| Steps | Snapshot; migrate; interrupt/retry; verify application; test supported rollback; reconcile critical tables. |
| Expected/invariants | No loss/duplication, approved history immutable, FKs/indexes valid, app starts, documented rollback boundary honored. |
| Rollback/recovery | Restore backup or forward corrective migration; never run unsupported down migration on production data. |
| Observability/evidence | Migration logs, schema diff, row counts/checksums, reconciliation and incident record. |
| Automation/status | PARTIAL (2026-08-09) — a real production-family DB engine is now available (MariaDB 10.4.32), and `migrate`+`migrate:rollback` was executed end-to-end for the first time: a full 41-migration round trip against both isolated SQLite and a dedicated MariaDB database, from a fresh/empty schema (not the "anonymized representative DB with movements, sales, audit, permissions and settings" this scenario calls for — no such copy exists or was fabricated). This found and fixed 3 real Critical `down()` defects that would have crashed a genuine rollback (QA-042, QA-043; one malformed multi-column `dropForeign()` call, two columns dropped without first dropping their index/unique constraint), with permanent regression coverage added (`tests/Feature/Platform/MigrationRollbackIntegrityTest.php`). What this proves: schema-level rollback reversibility is real and verified on this migration set against the real engine. What remains BLOCKED_BY_ENVIRONMENT: row-count/checksum reconciliation of actual business data across an upgrade+rollback cycle, "restart mid-migration" interruption-recovery behavior, and any rehearsal against a genuinely representative (even if synthetic/anonymized) populated dataset — none of that was attempted this pass. |

### FAIL-DEP-001 — Deployment rollback and application version skew

| Field | Detail |
|---|---|
| Owner/domain | QA / Deployment |
| Requirements | NFR-01, NFR-04, NFR-07, AC-XCUT-15, AC-XCUT-16 |
| Risk/priority | Critical; incompatible app/schema or double processing during rollback |
| Preconditions/data | Release artifact, previous artifact, migration plan, health check, queue worker and rollback owner. |
| Actor/scope | Deployment/operator role; end-user traffic controlled. |
| Environment | Staging mirroring production topology. |
| Trigger | Failed health check, migration error, worker incompatibility, elevated error rate after deploy. |
| Steps | Deploy candidate; run smoke/health; inject failure; stop traffic; rollback app/schema per supported path; resume queues. |
| Expected/invariants | No mixed incompatible versions; no lost/duplicated transaction; health and request IDs recover; rollback decision recorded. |
| Rollback/recovery | Use immutable artifact and backup; reconcile stock/money/audit before reopening traffic. |
| Observability/evidence | Deployment logs, health response, metrics, queue drain, reconciliation, approval record. |
| Automation/status | BLOCKED_BY_ENVIRONMENT — production topology, artifact pipeline, rollback runbook and owner absent. |

### FAIL-DR-001 — Backup/restore and disaster recovery drill

| Field | Detail |
|---|---|
| Owner/domain | QA/Operations / Disaster recovery |
| Requirements | NFR-01, NFR-04, NFR-07, AC-XCUT-08, AC-XCUT-15, AC-XCUT-16 |
| Risk/priority | Critical; irreversible business data loss |
| Preconditions/data | Approved backup destination/encryption/retention, RPO/RTO, isolated restore target, owner and anonymized dataset. |
| Actor/scope | Named operations owner and reviewer; no production writes. |
| Environment | Isolated restore environment matching production. |
| Trigger | Simulated database/storage loss; restore from scheduled backup. |
| Steps | Take/verify backup; destroy only disposable copy; restore; run migrations/health; compare critical row counts/checksums and reconcile ledgers. |
| Expected/invariants | Restore meets RPO/RTO; stock/sales/audit/permissions/history present and consistent; application resumes safely. |
| Rollback/recovery | Preserve source backup; document failed restore and retry; never test destructive restore against production. |
| Observability/evidence | Backup ID/checksum, restore duration, table counts, reconciliation and signed DR record. |
| Automation/status | BLOCKED_BY_ENVIRONMENT — no backup/restore command, destination, RPO/RTO or human DR owner (QA-012/QA-022). |

### FAIL-OBS-001 — Error, audit, and correlation recovery evidence

| Field | Detail |
|---|---|
| Owner/domain | QA / Observability |
| Requirements | NFR-01, NFR-03, NFR-04, NFR-07, AC-XCUT-08, AC-XCUT-15 |
| Risk/priority | High; failures cannot be investigated or replayed safely |
| Preconditions/data | Normal request, validation failure, authorization denial, unexpected exception, transaction rollback. |
| Actor/scope | Guest, authorized actor, unauthorized/out-of-scope actor. |
| Environment | Local test/log environment; staging observability required for full evidence. |
| Trigger/fault | Invalid request, denied action, forced exception, audit write/transaction rollback. |
| Steps | Invoke each failure; capture HTTP response, `X-Request-ID`, logs, audit and DB state. |
| Expected/invariants | Safe bilingual/error response; no stack trace/secrets; request correlation preserved; no orphan audit/partial business mutation. |
| Rollback/recovery | Retry only after correction; use request ID to trace; reconcile affected source. |
| Observability/evidence | Platform/error/audit tests and request-ID assertions; monitoring alert evidence absent. |
| Automation/status | PASS_LOCAL for current safe error/correlation boundaries; alert/production monitoring BLOCKED_BY_ENVIRONMENT. |

## Execution rule

Run focused PHPUnit checks for implemented scenarios and use `scripts/run-tests.sh milestone` when available. Do not mark blocked scenarios as passed. Any failure in a Tier-A scenario remains a release blocker until the underlying behavior is corrected and rerun, not until the assertion is weakened.

## Required-field conformance matrix

The detailed table under every scenario is the source for the `§ID` references below. Each required field is an independent column; references point to the scenario's full field values and are intentionally nonempty for machine validation.

| Scenario ID | Milestone | Workflow | Requirement ID | Preconditions | User Role | Test Data | Steps | Expected Result | Security Expectation | DB/Data Integrity Expectation | Audit Expectation | Failure/Rollback Expectation | Priority | Severity | Automation Status |
|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|
| FAIL-INV-001 | DM-2.4 | Movement rollback | INV-04/INV-05 | §FAIL-INV-001 | Inventory actor | §FAIL-INV-001 | §FAIL-INV-001 | §FAIL-INV-001 | §FAIL-INV-001 | §FAIL-INV-001 | §FAIL-INV-001 | §FAIL-INV-001 | P0 | Critical | PASS_LOCAL |
| FAIL-INV-002 | DM-2.4 | Fraction validation | INV-06 | §FAIL-INV-002 | Inventory actor | §FAIL-INV-002 | §FAIL-INV-002 | §FAIL-INV-002 | §FAIL-INV-002 | §FAIL-INV-002 | §FAIL-INV-002 | §FAIL-INV-002 | P0 | High | PASS_LOCAL |
| FAIL-INV-003 | DM-2.4 | Transfer state/rollback | INV-03/NFR-02 | §FAIL-INV-003 | Transfer actors | §FAIL-INV-003 | §FAIL-INV-003 | §FAIL-INV-003 | §FAIL-INV-003 | §FAIL-INV-003 | §FAIL-INV-003 | §FAIL-INV-003 | P0 | Critical | PASS_LOCAL (crash/power-loss injection still BLOCKED_BY_ENVIRONMENT) |
| FAIL-INV-004 | DM-2.4 | Count reconciliation | INV-08/INV-09 | §FAIL-INV-004 | Counter/Manager | §FAIL-INV-004 | §FAIL-INV-004 | §FAIL-INV-004 | §FAIL-INV-004 | §FAIL-INV-004 | §FAIL-INV-004 | §FAIL-INV-004 | P0 | Critical | PASS_LOCAL (crash/power-loss injection still BLOCKED_BY_ENVIRONMENT) |
| FAIL-POS-001 | DM-3.1 | Pre-post failure | POS-01/POS-02 | §FAIL-POS-001 | Cashier | §FAIL-POS-001 | §FAIL-POS-001 | §FAIL-POS-001 | §FAIL-POS-001 | §FAIL-POS-001 | §FAIL-POS-001 | §FAIL-POS-001 | P0 | Critical | PASS_LOCAL |
| FAIL-POS-002 | DM-3.1 | Conflicting replay | POS-02/NFR-06 | §FAIL-POS-002 | Cashier | §FAIL-POS-002 | §FAIL-POS-002 | §FAIL-POS-002 | §FAIL-POS-002 | §FAIL-POS-002 | §FAIL-POS-002 | §FAIL-POS-002 | P0 | Critical | PASS_LOCAL |
| FAIL-POS-003 | DM-3.1 | Suspended resume | POS-01/FLW-POS-02 | §FAIL-POS-003 | Cashiers | §FAIL-POS-003 | §FAIL-POS-003 | §FAIL-POS-003 | §FAIL-POS-003 | §FAIL-POS-003 | §FAIL-POS-003 | §FAIL-POS-003 | P1 | High | PASS_LOCAL (client-interruption/concurrent-resume still BLOCKED_BY_ENVIRONMENT) |
| FAIL-PAY-001 | DM-3.2 | Payment rollback | POS-03/NFR-01 | §FAIL-PAY-001 | Cashier/reviewer | §FAIL-PAY-001 | §FAIL-PAY-001 | §FAIL-PAY-001 | §FAIL-PAY-001 | §FAIL-PAY-001 | §FAIL-PAY-001 | §FAIL-PAY-001 | P0 | Critical | BLOCKED_NOT_IMPLEMENTED |
| FAIL-CSH-001 | DM-3.3 | Shift recovery | CSH-01..04 | §FAIL-CSH-001 | Cashier/reviewer | §FAIL-CSH-001 | §FAIL-CSH-001 | §FAIL-CSH-001 | §FAIL-CSH-001 | §FAIL-CSH-001 | §FAIL-CSH-001 | §FAIL-CSH-001 | P0 | Critical | BLOCKED_NOT_IMPLEMENTED |
| FAIL-WAL-001 | DM-4.2 | Wallet rollback | CUS-02/CUS-03 | §FAIL-WAL-001 | Retail/party actor | §FAIL-WAL-001 | §FAIL-WAL-001 | §FAIL-WAL-001 | §FAIL-WAL-001 | §FAIL-WAL-001 | §FAIL-WAL-001 | §FAIL-WAL-001 | P0 | Critical | BLOCKED_NOT_IMPLEMENTED |
| FAIL-PTY-001 | DM-5.1/5.2 | Party recovery | PTY-01..06 | §FAIL-PTY-001 | Party manager/reviewer | §FAIL-PTY-001 | §FAIL-PTY-001 | §FAIL-PTY-001 | §FAIL-PTY-001 | §FAIL-PTY-001 | §FAIL-PTY-001 | §FAIL-PTY-001 | P0 | Critical | BLOCKED_NOT_IMPLEMENTED |
| FAIL-AST-001 | DM-5.4 | Asset recovery | AST-01..05 | §FAIL-AST-001 | Asset operator | §FAIL-AST-001 | §FAIL-AST-001 | §FAIL-AST-001 | §FAIL-AST-001 | §FAIL-AST-001 | §FAIL-AST-001 | §FAIL-AST-001 | P0 | Critical | BLOCKED_NOT_IMPLEMENTED |
| FAIL-IMP-001 | DM-2.1/2.2 | Import runtime | PRC-01/PUR-04 | §FAIL-IMP-001 | Importer/approver | §FAIL-IMP-001 | §FAIL-IMP-001 | §FAIL-IMP-001 | §FAIL-IMP-001 | §FAIL-IMP-001 | §FAIL-IMP-001 | §FAIL-IMP-001 | P1 | High | BLOCKED_BY_ENVIRONMENT |
| FAIL-FILE-001 | DM-1.4 | Attachment cleanup | NFR-04/AC-XCUT-05 | §FAIL-FILE-001 | Authorized/unauthorized | §FAIL-FILE-001 | §FAIL-FILE-001 | §FAIL-FILE-001 | §FAIL-FILE-001 | §FAIL-FILE-001 | §FAIL-FILE-001 | §FAIL-FILE-001 | P1 | High | PASS_LOCAL_PARTIAL |
| FAIL-API-001 | DM-1.3 | Direct authorization | NFR-03/SEC-011 | §FAIL-API-001 | Scoped/no-access user | §FAIL-API-001 | §FAIL-API-001 | §FAIL-API-001 | §FAIL-API-001 | §FAIL-API-001 | §FAIL-API-001 | §FAIL-API-001 | P0 | Critical | PASS_LOCAL_PARTIAL |
| FAIL-PERF-001 | Cross-cutting | Stress/spike/soak | NFR-05/NFR-06 | §FAIL-PERF-001 | Synthetic actors | §FAIL-PERF-001 | §FAIL-PERF-001 | §FAIL-PERF-001 | §FAIL-PERF-001 | §FAIL-PERF-001 | §FAIL-PERF-001 | §FAIL-PERF-001 | P1 | High | BLOCKED_BY_ENVIRONMENT |
| FAIL-CHAOS-001 | DM-1.1/6.4 | Chaos resilience | NFR-01/NFR-04 | §FAIL-CHAOS-001 | Operators | §FAIL-CHAOS-001 | §FAIL-CHAOS-001 | §FAIL-CHAOS-001 | §FAIL-CHAOS-001 | §FAIL-CHAOS-001 | §FAIL-CHAOS-001 | §FAIL-CHAOS-001 | P0 | Critical | BLOCKED_BY_ENVIRONMENT |
| FAIL-MIG-001 | DM-1.1 | Fresh migration | MD-01/NFR-06 | §FAIL-MIG-001 | Deployment account | §FAIL-MIG-001 | §FAIL-MIG-001 | §FAIL-MIG-001 | §FAIL-MIG-001 | §FAIL-MIG-001 | §FAIL-MIG-001 | §FAIL-MIG-001 | P1 | High | PASS_LOCAL |
| FAIL-MIG-002 | DM-6.4 | Upgrade/downgrade | NFR-01/NFR-02 | §FAIL-MIG-002 | Release operator | §FAIL-MIG-002 | §FAIL-MIG-002 | §FAIL-MIG-002 | §FAIL-MIG-002 | §FAIL-MIG-002 | §FAIL-MIG-002 | §FAIL-MIG-002 | P0 | Critical | PARTIAL |
| FAIL-DEP-001 | DM-6.4 | Deployment rollback | NFR-04/NFR-07 | §FAIL-DEP-001 | Release operator | §FAIL-DEP-001 | §FAIL-DEP-001 | §FAIL-DEP-001 | §FAIL-DEP-001 | §FAIL-DEP-001 | §FAIL-DEP-001 | §FAIL-DEP-001 | P0 | Critical | BLOCKED_BY_ENVIRONMENT |
| FAIL-DR-001 | DM-6.4 | Backup/restore DR | NFR-01/NFR-07 | §FAIL-DR-001 | Operations owner | §FAIL-DR-001 | §FAIL-DR-001 | §FAIL-DR-001 | §FAIL-DR-001 | §FAIL-DR-001 | §FAIL-DR-001 | §FAIL-DR-001 | P0 | Critical | BLOCKED_BY_ENVIRONMENT |
| FAIL-OBS-001 | DM-1.1/6.4 | Error observability | NFR-01/NFR-07 | §FAIL-OBS-001 | All roles | §FAIL-OBS-001 | §FAIL-OBS-001 | §FAIL-OBS-001 | §FAIL-OBS-001 | §FAIL-OBS-001 | §FAIL-OBS-001 | §FAIL-OBS-001 | P1 | High | PARTIAL_LOCAL |
