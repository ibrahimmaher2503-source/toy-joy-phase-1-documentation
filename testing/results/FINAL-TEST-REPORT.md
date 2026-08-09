# TOY & JOY Phase 1 — Final Test Report

Audit date: 2026-08-08  
Scope: repository code, documentation, 45 task records, 24 Development Milestones, 72 requirement IDs, 16 cross-cutting acceptance criteria, permissions, database, routes, UI, APIs/boundaries and existing tests.  
Final status: **NOT READY FOR PRODUCTION**

## Executive result

The Local/Dev foundation contains substantial implemented behavior, and the new delegated tests materially improve catalog, purchasing, pricing, inventory, retail, customer/wallet, attachment and readiness coverage. The audit nevertheless found open Critical/High defects, incomplete Phase 3–6 business workflows, a red regression suite, authorization-contract drift, broken spreadsheet runtime dependencies, replay-integrity violations, missing backup/restore and production infrastructure, and absent UAT/cutover evidence.

This result is not `BLOCKED — INSUFFICIENT TEST ENVIRONMENT` because executable evidence also proves product defects and missing functionality. Environment blockers are recorded separately and did not stop the remainder of the audit.

## Automated suite results

| Suite/check | Result | Evidence |
|---|---|---|
| Expanded Unit suite | **PASS** | 55 tests, 55 passed, 121 assertions, 4.232 s. |
| Expanded Feature suite | **FAIL** | 258 tests, 239 passed, 13 failed, 1 error, 5 skipped, 3 risky, 1,347 assertions, 151.829 s. `artifacts/qa-feature-extended.out`. |
| Inventory/Retail/Readiness focused | **FAIL (truthful defect assertions)** | 22 tests, 19 passed, 3 failed, 158 assertions. |
| Attachment focused | **PASS_LOCAL** | 12 tests, 40 assertions; attachment + error/environment group 33 tests, 124 assertions. |
| Catalog/Purchasing/Pricing delegated initial group | **PASS_LOCAL** | 28 tests, 74 assertions. |
| Import follow-up | **BLOCKED_BY_ENVIRONMENT** | 1 passed, 5 skipped, 3 assertions; OpenSpout runtime absent. |
| Purchasing numbering/replay follow-up | **FAIL** | Numbering passes; conflicting supplier-return replay fails. Combined follow-up: 6 passed, 1 failed, 5 skipped. |
| Clean SQLite migrate/seed | **PASS_LOCAL** | All migrations and canonical authorization seeder completed on an isolated temporary DB; DemoSeeder also completed. |
| Clean demo inventory reconciliation | **PASS_LOCAL** | 3 movement groups, 3 balances, 0 divergences. |
| Default local DB reconciliation | **FAIL_ENVIRONMENT_STATE** | Default SQLite lacks `stock_movements`. |
| Vite production build | **PASS** | Completed in approximately 6.09 s; optional font timing warnings only. |
| PHPStan | **FAIL** | 4 OpenSpout symbol errors (`ReaderFactory`, `FormulaCell`) across product and invoice imports. |
| Pint test | **FAIL** | 5 production catalog files require formatting; delegated changed tests pass targeted Pint. |
| npm audit | **FAIL** | 1 High `nanoid` advisory, 0 Critical. |
| Composer install/audit | **BLOCKED_BY_ENVIRONMENT** | Composer executable unavailable; installed vendor state differs from lock. |
| Locale parity | **PASS** | Arabic and English each contain 1,680 keys. |
| Route inventory | **PASS_DIAGNOSTIC** | 151 Laravel routes discovered. No separate ordinary-screen API surface. |
| Scheduler | **FAIL** | `schedule:list` reports no scheduled tasks. |
| Full PHP lint | **BLOCKED_BY_ENVIRONMENT** | Repository-wide lint exceeded 120 seconds; targeted changed-test lint passed. |

## Tests added by delegated lower-model agents

- `tests/Feature/Catalog/CatalogMasterBehaviorTest.php`
- `tests/Feature/Catalog/ImportRuntimeCompatibilityTest.php`
- `tests/Feature/Pricing/PriceProposalIntegrityTest.php`
- `tests/Feature/Purchasing/PurchasingLifecycleIntegrityTest.php`
- `tests/Feature/Inventory/InventoryWorkflowIntegrityTest.php`
- `tests/Feature/Retail/RetailSuspendedAndBarcodeTest.php`
- `tests/Feature/Retail/CashShiftOfflineBoundaryTest.php`
- `tests/Feature/Customer/CustomerPolicySettingTest.php`
- `tests/Feature/Platform/AttachmentFoundationTest.php`

The lower-model inventory/POS agent also corrected existing audit-added idempotency assertions so changed-payload replay must be rejected rather than accepted. After the owner's clarification, the primary agent coordinated, executed, investigated and reported; it did not author further test code.

Additional audit tests already created before that clarification cover purchasing calculations, open-price policy, inventory movement integrity, wallet isolation, milestone authorization and retail-sale integrity.

## Confirmed failures

The expanded Feature suite reports:

1. Four authorization-contract failures: 348 seeded permissions versus 276 documented, sensitive/unimplemented grants, and grant-map divergence.
2. Approval expiry error requiring explicit authenticated authorization.
3. One stale approval-wiring assertion.
4. Three stale catalog-absence assertions.
5. One stale print-route absence assertion.
6. Inventory conflicting idempotency replay accepted.
7. Retail-sale conflicting idempotency replay accepted.
8. Supplier-return conflicting idempotency replay accepted.
9. Fractional inventory quantity accepted for a non-fractional product.
10. Three risky tests that require test-maintenance investigation.

The stale assertions are test-maintenance defects, not proof that implemented behavior is wrong. They remain failures because the complete regression baseline must be trustworthy.

## Performance evidence

- Existing performance fixture generator completed with 50,000 products and 1,000,000 stock movements in **600.40 s** on local SQLite.
- Inventory reconciliation read/group processing over that fixture completed in **14.852 s**, found 50,000 divergences because the fixture intentionally contained no materialized balances, and exited non-zero without applying changes.
- The command emits one line per divergence (50,000 lines), which is operationally noisy. No stated latency/load threshold was accepted, and no k6/browser/concurrent workload exists, so this is diagnostic evidence only—not a performance pass.

## Coverage and milestone disposition

- All **72 / 72** functional requirement IDs and **16 / 16** cross-cutting criteria were mapped in `TEST-COVERAGE-MATRIX.md`.
- All **25** Development Milestones have individual reports under `testing/results/milestones/`.
- Phase 1 has useful Local/Dev control coverage but open RBAC, approval, backup and infrastructure failures.
- Phase 2 has the strongest automated business coverage, but imports, idempotency, fractional inventory and true concurrency remain unsafe/unverified.
- Phase 3 is partial/readiness-only beyond basic sale/suspend/stock behavior; payments, shifts and offline synchronization are incomplete.
- Phases 4–6 are primarily foundations/readiness screens; required business mutations, reconciliation, exports, UAT and go-live evidence are absent.

## `BLOCKED_BY_ENVIRONMENT` register

- Composer executable and consistent installed dependencies.
- OpenSpout runtime; formula/macro/import cases were skipped explicitly.
- Production database with row-lock semantics for genuine race tests.
- Production cache, queue, scheduler, storage, monitoring and deployment topology.
- Browsers/device automation suites, scanners, cameras and thermal/A4 printers.
- Backup target and destructive-safe restore environment.
- k6/Backstop/axe/Enlightn and the documented test orchestrator.
- Approved production data, named UAT users, client sign-off and cutover authority.

## Release decision

**NOT READY FOR PRODUCTION**

Minimum release blockers include resolving canonical RBAC grants, rejecting changed-payload idempotency replays, enforcing fractional inventory rules, restoring/import-testing locked dependencies, completing payments/shifts/offline/returns/customer/party/asset/report workflows, implementing reconciliation and backup/restore, obtaining production-like concurrency/security/performance evidence, and completing manual UAT and controlled handover.

## Extended strategy and automation update — 2026-08-08

The owner requested a substantially expanded, non-duplicative plan and required all test-code work to use lower-cost models. Delegated agents produced executable registers for E2E, security, concurrency, failure/recovery and UAT, plus Contract, Property-Based, deterministic Fuzz/Boundary and Mutation strategy coverage.

New scenario inventory:

- 40 E2E scenarios with 16 explicit fields each.
- 47 UAT scenarios with 16 explicit fields each and human-only status.
- 33 security/RBAC/IDOR/session/API scenarios.
- 23 concurrency/race/load scenarios.
- 24 failure/recovery/chaos/DR/deployment scenarios.
- Canonical role aliases were reconciled without inventing a Customer Service role or permissions.

New automated evidence:

- Product-media route IDOR/path-leak regression: 2 tests, 9 assertions, PASS_LOCAL.
- Deterministic Property-Based financial and inventory invariants, numeric Fuzz/Boundary cases, and Inventory/POS route/middleware Contract tests.
- Unified newly-added focused group: 7 tests, 130 assertions, PASS_LOCAL.
- Expanded Unit suite: 55 tests, 55 passed, 121 assertions.
- Expanded Feature suite: 258 tests, 239 passed, 13 failed, 1 error, 5 skipped, 3 risky, 1,347 assertions. The failure set remains the truthful RBAC, stale-regression, approval-expiry, conflicting-idempotency and fractional-quantity defects already recorded.
- Targeted Pint and PHP syntax checks for the four newest test files passed.
- Infection is unavailable; Mutation Testing is `BLOCKED_BY_ENVIRONMENT`, with no mutation score or PASS claimed.

No production code, dependency lock, requirement, or expected behavior was changed during this extension. Browser/device/UAT, production-DB races, stress/spike/soak, chaos, backup/restore and deployment rollback remain planned or blocked until their required environments exist.

## Defect closure update — 2026-08-08 (same day, following session)

A fresh baseline at current `HEAD` reproduced the prior sessions' failure set exactly (Unit 55/55; Feature 258 total, 244 passed, 13 failed, 1 error, 3 risky, 1,358 assertions). Four of the five open Critical/High regression defects were then fixed and regression-verified directly (no delegation this pass); full root-cause detail is in `DEFECTS.md`:

| Defect | Disposition | Evidence |
|---|---|---|
| QA-015 — Idempotency changed-payload replay | **Fixed** | Payload-fingerprint check added to `PostInventoryMovement`, `RetailSaleAction`, `CreatePurchaseReturnDraftAction`. Exact replay still short-circuits; conflicting payload now throws. |
| QA-027 — Fractional quantity accepted | **Fixed** | `PostInventoryMovement` now rejects a non-zero fractional remainder against a non-fractional product. |
| QA-003 — Approval expiry authorization error | **Fixed** | Test violated `ExpireApprovalRequest`'s own documented contract (no `$authorize` callback under an authenticated context); test corrected, no production code changed. |
| QA-004 — Stale absence tests | **Fixed** | Catalog absence-guard file deleted (superseded); approval-wiring and print-route absence tests replaced with behavioral coverage of the now-implemented features. |
| QA-002 — RBAC 348 vs 276 | **Still open — root cause confirmed, owner decision required** | `docs/04-roles-permissions.md` (27 modules × 10 actions) is stale against `CanonicalAuthorizationSeeder` (28 modules × 12 actions) after later owner-authorized TSK-010/014/015/016 implementation. Neither side was edited unilaterally — this is a live Production-policy question, not accidental drift. |

Post-fix regression: Unit 55/55 (121 assertions). Feature 257 total, 253 passed, **4 failed** (all RBAC, the single item above), **0 errors** (down from 1), 3 risky (unchanged; this repo's custom JSON test printer does not itemize risky-test identities), 1,377 assertions, 151.9 s. Full output in `artifacts/qa-feature-postfix.out`.

Not attempted this pass: Playwright/browser E2E, k6 performance, OWASP ZAP DAST, Infection mutation testing, backup/restore/DR drill, and UAT execution — all remain `BLOCKED_BY_ENVIRONMENT` or require human/owner participation, unchanged from the prior sessions' findings.

**Final status remains NOT READY FOR PRODUCTION.** See `PRODUCTION-RELEASE-GATE.md` for the itemized gate.

## Critical E2E automation update — 2026-08-08 (same day, third pass)

Two distinct kinds of E2E evidence were added, matching the master audit's explicit separation of
"critical backend E2E/business integration" from "Playwright critical E2E":

**Backend business-chain E2E** — `tests/Feature/E2E/CatalogToInventoryChainTest.php` traces one
product through the full CATALOG → PRICING → POS → INVENTORY chain the master audit names
explicitly: category/product creation, price proposal → submit → approve (separate proposer/approver),
a POS sale against the approved price, and assertions on every seam — `SaleLine.stock_movement_id`,
`StockMovement.source_type/source_id/source_line_id` linking back to the sale, exact on-hand
decrement, WAC-consistent consumed cost, and the full audit trail (price submission, price
approval, and sale finalization). No prior test spanned this chain — each module was tested in
isolation. While building it, found and fixed QA-030: `RetailSaleAction::finalize()` never recorded
an audit event, unlike every comparable action in the codebase.

**Browser E2E (Playwright)** — installed `playwright`/`@playwright/test` (already declared in
`package.json`, not yet installed), configured `playwright.config.js` (Chromium, `testing/e2e/`),
and executed `testing/e2e/critical-auth-and-rbac.spec.js` against a real `php artisan serve`
instance backed by a dedicated disposable SQLite database (never the developer's local DB). 4 tests,
all passing: authenticated dashboard access with zero console/page errors, unauthenticated
redirect-to-login, wrong-password rejection, and a store-scoped Cashier reaching `/pos` (200) while
being denied a direct URL to `/admin/settings` (403). This is the project's **first executed browser
E2E evidence** — every prior session recorded all 40 `E2E-SCENARIOS.md` entries as
`NOT_RUN_BROWSER`/`NOT_IMPLEMENTED`/`BLOCKED_BY_ENVIRONMENT`.

This does **not** clear the "Critical E2E" release gate. 4 of 40 scenarios (E2E-03/E2E-04's core
assertions) now have real browser evidence; the remaining ~36 — catalog CRUD, purchasing lifecycle,
pricing approval, POS checkout, inventory transfers/counts, RTL/LTR, accessibility, cross-browser,
mobile viewports — are unconverted. See `testing/e2e/README.md` for exact scope and the setup
procedure (login fixtures needed known passwords since `CanonicalAuthorizationSeeder`'s demo users
have random unknowable ones).

Full regression after both additions: Unit 55/55 (121 assertions). Feature 268 total, 264 passed,
**4 failed** (same single RBAC cluster, unchanged), **0 errors**, 3 risky (unchanged), 1,422
assertions. `artifacts/qa-feature-e2e.out`.

**Final status remains NOT READY FOR PRODUCTION.**
