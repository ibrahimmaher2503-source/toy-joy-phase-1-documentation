# TOY & JOY Extended Test Strategy

**Run status:** strategy and executable scenario catalog prepared 2026-08-08. This is not a UAT or production-acceptance result. Human sign-off, physical devices, production-like infrastructure, and several business modules remain pending.

## 1. Scope and authority

This strategy traces the PRD requirements, `TASKS.md` milestones/tasks, `docs/04-roles-permissions.md`, `testing/01` through `testing/07`, and `testing/14-test-plan.md`. The PRD is authoritative for behavior; the Implementation Plan is authoritative for milestone order and gates. A result is recorded only when evidence exists:

| Result | Meaning |
|---|---|
| PASS | The named test ran and met its expected result. |
| FAIL | The test ran and exposed a product or test defect. Requirements are not weakened. |
| BLOCKED_BY_ENVIRONMENT | The test could not execute because a required dependency, device, service, owner input, or production-like environment is unavailable. |
| NOT_IMPLEMENTED | The required behavior has no implementation; a readiness page or schema is not treated as completion. |
| PENDING_HUMAN | Requires an actual business user, physical device, or signed operational evidence. |

The final release decision is `NOT READY FOR PRODUCTION` while any Critical/High defect, NOT_IMPLEMENTED requirement, BLOCKED production control, or unsigned UAT obligation remains.

## 2. Test levels and gates

| Level | Required evidence | Gate |
|---|---|---|
| Unit | Money, quantity, dates, state predicates, policy boundaries, parsers, redaction, and resolver rules. | Every changed calculation/policy has deterministic positive and negative cases. |
| Feature/API | Authenticated and unauthenticated route/action calls, validation, direct URL/API denial, server-side role and scope checks. | No authorization relies on hidden controls. |
| Integration/DB | Transactions, FK/unique/index constraints, audit, approval, stock/ledger effects, rollback, idempotency, and cross-module effects. | Financial/stock/wallet/shift writes are all-or-nothing. |
| E2E/browser | Real browser workflow with loading, empty, error, success, denied, validation, confirmation, print, RTL/LTR, and responsive states. | A complete vertical slice is usable by its role. |
| UAT | Named business user performs the scenario on staging with approved realistic data. | Human signature and dated evidence only. |
| Pre-production | Load/concurrency, backup/restore, security review, device/printer/scanner, migration rehearsal, monitoring, rollback. | Owner-approved release gate. |

Do not run destructive, load, backup, or browser work against production. Use `RefreshDatabase`/disposable SQLite for isolated tests and a separately identified staging database for UAT and realistic-volume checks.

## 2A. Contract, property, fuzz, and mutation testing

These are separate test types and must be reported separately from ordinary feature tests:

| Type | Contract in this repository | Required assertion | Current status |
|---|---|---|---|
| Contract | `tests/Feature/Contracts/InventoryPosContractTest.php` | Routes, middleware, names, and module boundaries remain present and authorized. | Executed only where the focused suite includes it; no browser claim. |
| Property-based | `tests/Unit/Purchasing/PurchaseInvoiceCalculatorPropertyTest.php`, `tests/Feature/Inventory/InventoryBalancePropertyTest.php` | A fixed reproducible input set preserves money, quantity, WAC, replay, and rejection invariants. | Added/executed focused deterministic tests; report exact command/result, not a randomized claim. |
| Fuzz/boundary | Property invalid-value cases, import formula/macro cases, malformed filter/file cases. | Invalid, formula-like, unsafe, oversized, or malformed input is rejected without coercion or mutation. | Import fuzz cases are `BLOCKED_BY_ENVIRONMENT` while OpenSpout is absent; other focused boundaries are partial. |
| Mutation | `testing/results/MUTATION-TESTING-STRATEGY.md` and its target kill set. | Infection must kill rule-removing mutations; surviving mutants are defects or missing assertions. | `BLOCKED_BY_ENVIRONMENT`: `infection` and `vendor/bin/infection` are absent. No mutation score or PASS is claimed. |

The mutation strategy is authoritative for target files, required kill assertions, command capture, and the prohibition on weakening tests. Installing Infection or changing dependency locks requires owner approval. A green property/contract test run is not a mutation pass.

## 3. Role-to-workflow coverage

Every role must be tested from both its permitted path and a forbidden direct-action path. The canonical roles are:

| Role | Positive E2E/UAT scope | Mandatory denials |
|---|---|---|
| System Administrator | Company, branches/stores, drawers, users/roles, policy/configuration, audit, global review. | Cannot bypass approval separation or immutable approved history without an approved correction/override. |
| Branch Manager | Assigned branch monitoring, store override, shift review, return/adjustment approval, reports. | Global settings, another branch, and unassigned store. |
| Cashier | Assigned POS store/drawer/shift, barcode sale, suspended sale, payment evidence, receipt, gift receipt. | Party Wallet, other store, unapproved/open price, blind-close expected value, offline credit/loyalty. |
| Purchasing Officer | Supplier/card/history, PO, invoice draft/import, supplier return draft/submit, scoped print/export. | Approving own document, price approval, stock adjustment approval, another store/supplier scope. |
| Warehouse Manager | Receiving, stock card, transfer dispatch/receive, count review/reconciliation, purchase approval. | POS sale outside assigned store, own approval where separation applies, Party Wallet. |
| Pricing Officer | Product card price, proposal/version, submit, effective price, label queue. | Approving own proposal, open-price selling, unassigned location, editing approved version. |
| Party Manager | Booking, children consent, party invoice/payment, operating order/consumables, asset reservation/return, closure. | Product Wallet, retail sale lines, double-booked asset, edit after final close. |
| Stock Counter | Assigned stock-count session, count entry, uncounted-item review. | Reconciliation approval, movement adjustment, another store/count. |
| Accountant / Reviewer | Scoped read, audit, reconciliation, report/PDF/Excel export, approval where explicitly granted. | Operational create/edit/delete, cross-scope data, direct ledger/document mutation. |

Exact aliases, assignments, limits, own-record rules, cross-branch visibility, and sensitive-field grants remain owner decisions where the role document marks `P` or `R`.

### Role alias reconciliation

Scenario records use the canonical role names below. The aliases in older planning material are not additional RBAC roles:

| Planning alias | Canonical role in scenarios | Reconciliation rule |
|---|---|---|
| Admin | System Administrator | Use the canonical role for user setup, global configuration, and audit administration. |
| Manager | Branch Manager | Use the canonical branch-scoped manager role; do not imply global manager access. |
| Storekeeper | Warehouse Manager | This is an alias only, not an independent role or permission set. |
| Purchasing | Purchasing Officer | Use the canonical purchasing role for supplier, PO, invoice, and return workflows. |
| Finance | Accountant / Reviewer | Use the applicable canonical finance/read-review persona; do not infer operational write access. |
| Customer Service | No canonical role | Do not grant permissions or use this as an RBAC role until an Owner Decision defines it. |
| Operations / Release owner | Human release persona outside RBAC | This may observe release/operations evidence, but is not an application role and grants no application permissions. |

## 4. Module and requirement execution map

| Area | Requirements/tasks | Automated evidence | E2E/UAT evidence still required |
|---|---|---|---|
| Auth/session/platform | NFR-01/03/04/07, TSK-001–004B | Auth lifecycle, route denial, layouts, request IDs, safe errors. | Password/MFA/passkey policy, session/device matrix, human recovery walkthrough. |
| Company/branch/store/drawer | MD-01, TSK-005–007 | Master validation and scope tests. | Admin creates configured branch/store/drawer/printer and manager/cashier verify scope. |
| RBAC/audit/approval | NFR-01–04/06, TSK-008–009 | Permission, append-only, approval, attachment, immutability tests. | Owner-approved role matrix, full role × action × branch/store matrix, audit review. |
| Catalog/product/media | MD-02–05, PRC-02, TSK-010–011 | Catalog action and product-card tests. | Media/device limits, search at realistic volume, Arabic/LTR card review. |
| Product import | PRC-01, TSK-012 | Manifest check; import cases are blocked by absent OpenSpout runtime. | Valid/error/update-only/approval/download and formula/macro workbook walkthrough. |
| Suppliers/PO/invoices/returns | PUR-01–06, TSK-013–016 | Supplier, PO, WAC, rollback, return and numbering tests. | Receiving devices, printer, approved financial settings, production DB locks and UAT. |
| Pricing/labels | PRC-03–08, TSK-017–018 | Price approval/resolver/open-price/label readiness tests. | Physical label dimensions/scanning, queue/print/reprint audit and concurrent approval. |
| Inventory/transfers/counts | INV-01–09, TSK-019–022 | Movement, transfer, count and scope tests. | Scanner/count-at-scale, concurrent sale/count/transfer and reconciliation. |
| POS/payments/shifts | POS-01–07, CSH-01–04, TSK-023–026 | Sale/suspend/stock boundary tests; payment/shift/offline gaps remain. | Full cashier session, payment evidence, blind close, printer and offline sync. |
| Customers/loyalty/wallets | MD-06, CUS-01–04, TSK-027–028 | Storage/isolation tests. | Consent/minor privacy, earn/redeem/expiry, settlement and cross-wallet denial. |
| Gift/returns/exchanges | RET-01–04, TSK-029–030 | Readiness/boundary evidence only for most operations. | Reference sale, condition, refund method, restock, gift receipt/card and reversal. |
| Party operations/assets | PTY-01–06, AST-01–05, TSK-031–036 | Readiness/foundation tests only. | Booking/calendar, child consent, invoice/payments, asset interval conflicts/damage/closure. |
| Quotations | QTN-01–03, TSK-037 | Readiness only. | Retail/party separation, expiry, conversion, no stock/payment/wallet effect, print/share. |
| Reports/exports/alerts/audit | RPT-01–03, TSK-038–040 | Scoped list/audit tests. | Reconciled totals, secure PDF/Excel export, alerts, pagination, redaction and print. |
| Production migration/operations/UAT | TSK-041–044, NFR-04–07 | Local diagnostics/readiness screens. | Approved data migration, backup/restore, queue/scheduler/monitoring, UAT, cutover/rollback. |

## 5. Cross-cutting invariants

Each applicable scenario must assert the invariant, not merely the visible state:

1. A user cannot reach a forbidden action through a forged POST, Livewire call, route parameter, export URL, or alternate locale.
2. Every branch/store query is scoped server-side; a record from another scope returns 403/404 or an empty authorized result as specified.
3. Approved documents, ledgers, price versions, audit events, and print events are append-only. Corrections reference the original.
4. Approval is separated from creation/submission; stale versions and terminal states are rejected.
5. A repeated identical request is idempotent; a reused key with a changed payload is rejected, never silently replayed.
6. Financial, stock, wallet, loyalty, gift-card, shift, and approval operations commit all effects or none, including audit.
7. A purchase cost change never changes sale price; product and party wallet ledgers never cross; retail products and party services/assets never mix.
8. Non-fractional products reject fractional movement; quantity, WAC, tax, discount, rounding, and totals reconcile to source lines.
9. Unpriced products are visible where permitted but cannot be sold or printed; labels bind to the selected store and effective price.
10. User-visible errors preserve cart/form state, avoid secrets, carry a request ID where applicable, and are bilingual.

## 6. Browser, accessibility, localization, and output matrix

Run every adopted browser flow at desktop 1280px, real 390×844 mobile, and a tablet width. Use current supported Chrome, Firefox, and Safari/WebKit on staging. Capture DOM and screenshot evidence for:

- Arabic RTL and English LTR, including mixed Arabic/Latin item codes, dates, decimal/currency values, input direction, icon mirroring, and print output.
- Keyboard-only navigation, visible focus, logical tab order, labels/errors, dialog escape, reduced motion, contrast, 44px touch targets, table semantics, and screen-reader names.
- Loading, empty, validation, permission-denied, network error, retry, success, disabled, unsaved-change, and duplicate-submit states.
- A4 purchase/sales/party/report output, thermal receipt, gift receipt without price, barcode label physical size/scannability, and export encoding/formulas/redaction.

The current environment has no approved browser automation/device/printer matrix; these are PENDING_HUMAN or BLOCKED, not passes.

## 7. Offline, queue, scheduler, and recovery controls

Before release, execute the scenarios in `E2E-SCENARIOS.md` for offline queue signing, permitted operation limits, replay, duplicate/conflicting payload, server-truth conflict, retry/backoff, and manual disposition. Verify queue workers, failed-job handling, scheduler listings, expiry/reconciliation/alerts, and notification delivery. Run a real backup, checksum/retention check, clean restore, migration compatibility check, and documented RPO/RTO measurement. Current evidence reports no complete offline workflow, no scheduled tasks, and no backup/restore drill.

## 8. Entry/exit and evidence protocol

Entry requires a clean disposable/staging database, approved role/scope matrix, synthetic/anonymised data, configured mail/queue/storage/printer substitutes, known build SHA, and owner-approved policy values. Evidence names must include `run-date`, `scenario-id`, `actor`, `locale`, `viewport/device`, and result. Never store real child/customer data in fixtures, screenshots, logs, or exports.

Exit requires zero untriaged Critical/High defects, zero unexplained failures, no skipped mandatory tests, complete traceability, successful migration/reconciliation, and signed human checklists for UAT/devices/DR. Current results do not meet this gate: the report remains `NOT READY FOR PRODUCTION`.

## 9. Low-frequency requirement traceability

The following IDs were specifically checked because the existing catalog had fewer than two meaningful paths for them. The references below are distinct positive/negative or role/device paths, not duplicate screen checks:

| Requirement | Added E2E/UAT paths |
|---|---|
| MD-01 | E2E-01/02/03; UAT-ADM-01/02; UAT-MGR-01 |
| MD-03/04/05/06 | E2E-05/08/22; UAT-ADM-04; UAT-CASH-01; UAT-PARTY-01/02 |
| PRC-02/03/08 | E2E-05/11/13/19; UAT-PRICE-01/03; UAT-WH-01 |
| PUR-01/02/04 | E2E-06/10/11; UAT-PUR-01/02/04 |
| INV-04/06 | E2E-15/16; UAT-WH-03; UAT-COUNT-01/02 |
| POS-04/06 | E2E-17/19; UAT-CASH-02/04 |
| CUS-04 | E2E-22/23; UAT-PARTY-02; UAT-CASH-05 |
| CSH-04 | E2E-20; UAT-MGR-02 |
| PTY-02/04 | E2E-25/26; UAT-PARTY-01/02 |
| AST-01 | E2E-28; UAT-PARTY-03 |
| QTN-01–03 | E2E-29 |
| RPT-01/03 | E2E-30; UAT-ACCOUNT-01/02 |
| NFR-01/04/05/06/07 | E2E-08/11/20/24/30/31/32; UAT-GO-01–05 |

## 10. Current evidence snapshot

- Focused delegated catalog/purchasing/pricing tests passed their implemented cases; the conflicting supplier-return idempotency test fails deliberately and exposes a defect.
- Import tests explicitly skip five cases as `BLOCKED_BY_ENVIRONMENT`: `composer.lock` declares OpenSpout 4.32.0, but its runtime classes/vendor package are absent. The macro-extension rejection test passes.
- Existing result files record red regression/static/dependency findings, unimplemented Phase 3–6 business workflows, missing production controls, and no human UAT/device/DR sign-off.
