# Test Coverage Matrix

Audit date: 2026-08-08. This matrix reports achieved evidence, not planned filenames. `PARTIAL` means useful automated evidence exists but at least one required layer, browser/device check, concurrency proof, or complete workflow is absent.

## Master data and pricing

| Requirement | Status | Evidence / gap |
|---|---|---|
| MD-01 | PARTIAL | Platform/settings/branch/store/drawer/RBAC tests; production settings, printer and backup evidence open. |
| MD-02 | PARTIAL | Delegated catalog master behavior covers stable codes/supplier history; browser/import completeness open. |
| MD-03 | PARTIAL | Local barcode behavior covered in catalog tests; full uniqueness/concurrency/import path open. |
| MD-04 | PARTIAL | Product-card persistence/validation covered; real media/browser matrix incomplete. |
| MD-05 | PARTIAL | Attributes-not-balances behavior covered; large search/browser proof open. |
| MD-06 | BLOCKED_NOT_IMPLEMENTED | Customer mutation/history/children/loyalty/gift instruments are readiness-only. |
| PRC-01 | FAIL | Import dependency/runtime incompatible; full staged import cannot execute. |
| PRC-02 | PARTIAL | Product types covered; composite policy remains incomplete. |
| PRC-03 | PARTIAL | Calculator/pricing tests show cost does not auto-change sale price; import/browser evidence open. |
| PRC-04 | PARTIAL | Proposal lifecycle and immutability covered; true concurrent approval and historical sale proof incomplete. |
| PRC-05 | PARTIAL | Single-active-price behavior covered serially; production concurrency proof absent. |
| PRC-06 | PARTIAL | Queue/location behavior covered; physical printing blocked. |
| PRC-07 | PARTIAL | Unpriced sell/label boundaries covered; full POS/browser flow incomplete. |
| PRC-08 | PARTIAL | Open-price policy unit/feature evidence; full POS audit/UI flow absent. |

## Purchasing and inventory

| Requirement | Status | Evidence / gap |
|---|---|---|
| PUR-01 | PARTIAL | Supplier/status/history behavior covered; full UI and scale checks open. |
| PUR-02 | PARTIAL | Actual supplier history preserved in delegated tests. |
| PUR-03 | PARTIAL | PO state-machine/immutability tests pass; browser and concurrency layers open. |
| PUR-04 | FAIL | Manual calculation covered, but spreadsheet import is non-runnable. |
| PUR-05 | PARTIAL | Approval/stock/cost/audit/rollback/replay covered; true row-lock concurrency blocked. |
| PUR-06 | PARTIAL | Referenced supplier-return stock/cost behavior covered; full UI/output proof open. |
| INV-01 | PARTIAL | Availability/balance/history and scope assertions exist; scale/UI proof open. |
| INV-02 | PARTIAL | Selling-store isolation tests exist; complete cross-role matrix open. |
| INV-03 | PARTIAL | Transfer lifecycle/partial receipt/difference tests pass; concurrent dispatch/receipt open. |
| INV-04 | PARTIAL | Reason, separation, approval and audit covered for implemented documents. |
| INV-05 | PARTIAL | Negative stock/override boundaries covered; production locking open. |
| INV-06 | FAIL | Non-fractional product accepts a fractional movement (QA-027). |
| INV-07 | PARTIAL | Partial scope/reconciliation behavior covered; scan/browser/large-count proof open. |
| INV-08 | PARTIAL | Movement-window reconciliation covered serially; true sale/count race proof absent. |
| INV-09 | PARTIAL | Uncounted preservation and dual-role boundary covered; full reviewer UI open. |

## POS, returns, customers and shifts

| Requirement | Status | Evidence / gap |
|---|---|---|
| POS-01 | PARTIAL | Barcode/suspended/resume/ownership tests; print, touch, browser, customer lookup incomplete. |
| POS-02 | FAIL | Stock posting covered, but payments/drawer/customer chain incomplete and conflicting replay accepted. |
| POS-03 | BLOCKED_NOT_IMPLEMENTED | Electronic evidence/payment posting workflow absent. |
| POS-04 | BLOCKED_NOT_IMPLEMENTED | Complete optional-tax sale and unified-number behavior absent. |
| POS-05 | BLOCKED_NOT_IMPLEMENTED | Full discount anti-stacking calculation/UI absent. |
| POS-06 | BLOCKED_NOT_IMPLEMENTED | Required bilingual thermal/A4 invoice output not verified. |
| POS-07 | BLOCKED_NOT_IMPLEMENTED | Gift Receipt issue and later source lookup absent. |
| RET-01–RET-04 | BLOCKED_NOT_IMPLEMENTED | Return, exchange, inspection, refund, and gift-card mutations are readiness-only. |
| CUS-01 | BLOCKED_NOT_IMPLEMENTED | Unified customer mutation/history is absent. |
| CUS-02 | PARTIAL | Separate tables/routes/permissions and isolation tests pass; ledger settlement/reporting operations absent. |
| CUS-03–CUS-04 | BLOCKED_NOT_IMPLEMENTED | Loyalty ledger and complete source history are absent. |
| CSH-01 | PARTIAL | Active-shift requirement/open readiness covered; complete transaction linking/concurrency open. |
| CSH-02–CSH-04 | BLOCKED_NOT_IMPLEMENTED | Blind close, variance review, immutable close and outputs absent. |

## Party, assets, quotations and reports

| Requirement | Status | Evidence / gap |
|---|---|---|
| PTY-01–PTY-06 | BLOCKED_NOT_IMPLEMENTED | Readiness/authorization screens exist; booking, invoice, payments, operating orders and settlement do not. |
| AST-01–AST-05 | BLOCKED_NOT_IMPLEMENTED | Readiness screens exist; registry, calendar, double-book protection, state machine and damage workflows do not. |
| QTN-01–QTN-03 | BLOCKED_NOT_IMPLEMENTED | Readiness boundary only; quotation documents/outputs are absent. |
| RPT-01–RPT-03 | BLOCKED_NOT_IMPLEMENTED | Readiness boundary only; reconciled dashboards, alerts and secure export center are absent. |

## Non-functional and cross-cutting

| Requirement | Status | Evidence / gap |
|---|---|---|
| NFR-01 | PARTIAL | Broad append-only audit tests pass; unimplemented workflows cannot emit required events. |
| NFR-02 | PARTIAL | Approval/document immutability tests exist; several real correction workflows are absent. |
| NFR-03 | FAIL | Server authorization is widely tested, but canonical permission grants have materially drifted. |
| NFR-04 | PARTIAL | Auth, safe errors and protected attachments covered; offline and production controls absent. |
| NFR-05 | PARTIAL | Scoped/paginated implemented lists covered; high-volume browser/report proof absent. |
| NFR-06 | PARTIAL | Serial allocators/uniqueness covered; production concurrent allocation not proven. |
| NFR-07 | PARTIAL | Modular-monolith boundary reviewed; incomplete implementations prevent acceptance. |
| AC-XCUT-01–03 | PARTIAL/FAIL | Approval separation/staleness/terminal tests exist; expiry path fails and some legacy assertions are stale. |
| AC-XCUT-04–05 | PASS_LOCAL | Delegated attachment suite passed private storage and rejection/no-orphan cases. Production storage remains unverified. |
| AC-XCUT-06–08 | PARTIAL | Immutability, referenced actions, audit and rollback tests exist for implemented sources. |
| AC-XCUT-09 | FAIL | Conflicting inventory and retail replays are accepted. |
| AC-XCUT-10–11 | PARTIAL | Implemented list/direct-scope tests exist; complete route/report matrix absent. |
| AC-XCUT-12–14 | BLOCKED_NOT_IMPLEMENTED / ENVIRONMENT | Export center and safe-print catalog incomplete; true concurrent numbering needs production-like DB. |
| AC-XCUT-15 | PASS_LOCAL | Safe 403/404/500/JSON/request-ID/no-secret behavior covered. |
| AC-XCUT-16 | PARTIAL | Stale transitions are tested selectively; complete optimistic-concurrency coverage absent. |

## Coverage totals

- Functional requirement IDs reviewed: **72 / 72**.
- Cross-cutting criteria reviewed: **16 / 16**.
- No requirement is marked production-complete. `PASS_LOCAL` is deliberately limited to the implemented local control and is not UAT/Production acceptance.
