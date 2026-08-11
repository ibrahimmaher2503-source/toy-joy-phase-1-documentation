# TSK-027 — 48-Test Closure Matrix

**Date:** 2026-08-10  
**Scope:** TSK-027 only. TSK-028, TSK-029, and TSK-030 were not started.  
**Environment boundary:** Local/Dev disposable schemas only. The SQLite run is authorized by DEC-070 for this named closure audit; the application default and MariaDB run use XAMPP MySQL/MariaDB.  
**Interpretation:** `PASS` means the applicable evidence actually ran. `NOT_RUN`, `NOT_APPLICABLE`, `PARTIAL`, and `BLOCKED` are intentionally not presented as passes.

| # | Category | Status | Evidence / boundary |
|---:|---|---|---|
| 01 | Unit | **NOT_RUN** | No isolated unit suite was created; domain behavior is covered by the feature/action suite below. |
| 02 | Feature | **PASS** | `CustomerLoyaltyLifecycleTest`: SQLite 10/10, 81 assertions; MariaDB 10/10, 81 assertions. Includes canonical loyalty-adjustment rejection. |
| 03 | Livewire | **NOT_APPLICABLE** | TSK-027 uses approved Blade HTTP routes and POS integration; no TSK-027 Livewire mutation component exists. |
| 04 | Policy & Scope | **PASS** | Direct HTTP customer/POS routes, sensitive-field authorization, customer scope, ledger scope, and Party Manager retail-loyalty denial. |
| 05 | Integration | **PASS** | Real `RetailSaleAction` approval writes `sales.customer_id`, stock movement, loyalty earn, and audit in the sale transaction. |
| 06 | Database Constraints | **PASS** | Full migrations on SQLite and MariaDB; normalized phone/idempotency uniqueness, foreign keys, indexes, and immutable model guards exercised. |
| 07 | Transactions | **PASS** | Negative adjustment rollback and real POS sale/stock/loyalty atomicity verified. |
| 08 | Concurrency | **PASS** | `CustomerLoyaltyConcurrencyTest`: 3/3, 27 assertions against disposable MariaDB. |
| 09 | Deadlocks | **PASS** | Same-phone concurrent creation initially exposed a MariaDB deadlock; transaction retry was added and the final concurrency run passed. |
| 10 | Idempotency | **PASS** | Customer creation, consent, earn, expiry, adjustment approval/rejection/posting, redemption, and concurrent replay cases. |
| 11 | Invariants | **PASS** | No negative balance, FIFO allocations, one redemption per approved sale, append-only ledger, and source-linked before/after balances. |
| 12 | Reconciliation | **PASS** | Ledger sum equals displayed balance; FIFO allocations and expiry compensation reconcile to zero in the expiry scenario. |
| 13 | API Contract | **NOT_APPLICABLE** | Ordinary-screen API/GraphQL is prohibited by project architecture; no TSK-027 API was added. |
| 14 | API Negative | **NOT_APPLICABLE** | No ordinary TSK-027 API contract exists to test. |
| 15 | Webhooks | **NOT_APPLICABLE** | No webhook integration exists in TSK-027. |
| 16 | Queue | **NOT_APPLICABLE** | TSK-027 mutations are synchronous transaction boundaries; no queue consumer is required. |
| 17 | Scheduler | **NOT_RUN** | Manual expiry action is implemented and tested; an automatic scheduled expiry job was not added or verified. |
| 18 | External Integrations | **NOT_APPLICABLE** | No external customer/loyalty provider is used. |
| 19 | Authentication | **PASS** | Browser login exercised for administrator and store-scoped cashier; protected routes use authenticated/verified middleware. |
| 20 | Authorization Matrix | **PASS** | Server gates, direct HTTP denial, sensitive-field denial, Party Manager denial, cross-role scope checks, and the legacy readiness-route regression (`MilestoneReadinessAuthorizationTest`: 3/3, 71 assertions); exhaustive permission × role enumeration remains outside this focused run. |
| 21 | Tenant/Branch Isolation | **PASS** | Foreign branch/store customer and POS selection denied; ledger/consent/child/adjustment/history reads are filtered to authorized branch/store scope. |
| 22 | Application Security | **PASS** | CSRF-protected forms, validation, server-side gates, generic action errors, bounded queries, IDOR denial, and fail-closed policy reads; no penetration scan claimed. |
| 23 | File Security | **NOT_APPLICABLE** | TSK-027 creates no upload or attachment path. |
| 24 | Dependency Security | **NOT_RUN** | No new package was added for TSK-027; a fresh Composer/npm audit was not part of this focused rerun. |
| 25 | Browser E2E | **PASS** | Final clean disposable-DB run: 7 executed tests passed; 2 intentionally skipped non-Chromium mobile/visual cases. |
| 26 | Cross-Browser | **PASS** | Core customer-create/ledger and POS-customer-selection flows passed on Chromium, Firefox, and WebKit. |
| 27 | Responsive | **PASS** | Chromium 390×844 customer master showed no horizontal overflow. |
| 28 | RTL/LTR | **PASS** | Chromium verified English LTR and Arabic RTL direction/lang and no overflow. |
| 29 | Accessibility | **PASS** | axe-core scan on the stable Chromium customer surfaces had no critical/serious violations. |
| 30 | Visual Regression | **PASS** | Chromium customer-master screenshot matched the checked-in TSK-027 baseline. |
| 31 | Performance Smoke | **NOT_RUN** | No TSK-027 latency/SLO measurement was executed. |
| 32 | Load | **NOT_RUN** | No sustained-load harness was executed. |
| 33 | Stress | **NOT_RUN** | No broad stress run beyond the named concurrency cases was executed. |
| 34 | Spike | **NOT_RUN** | No spike-volume test was executed. |
| 35 | Soak | **NOT_RUN** | No long-running soak test was executed. |
| 36 | Migration Clean | **PASS** | Full fresh migrations completed on SQLite and MariaDB; the named browser MariaDB schema was also freshly migrated and seeded. |
| 37 | Upgrade Migration | **NOT_RUN** | No upgrade-from-production-customer-schema rehearsal was available. |
| 38 | Backup Restore | **NOT_RUN** | No backup/restore rehearsal was authorized or available in this task. |
| 39 | Disaster Recovery | **NOT_RUN** | No production disaster-recovery environment was available. |
| 40 | Recovery/Chaos | **PARTIAL** | Transaction rollback and failed approval recovery passed; process crash/chaos injection was not run. |
| 41 | Mutation Testing | **NOT_RUN** | No mutation run or coverage-driver result was produced for TSK-027. |
| 42 | Fuzz/Property-Based | **NOT_RUN** | No fuzz/property harness was added; validation and invariant examples are scenario-based. |
| 43 | State Transition | **PASS** | Customer active→merged, pending→approved/rejected adjustment, expiry compensation, and immutable history boundaries passed. |
| 44 | Business Chain E2E | **PASS** | `Customer → real POS Sale → Loyalty Earn → Balance → Redeem → Audit` passed through `RetailSaleAction` and the loyalty actions. |
| 45 | UAT | **BLOCKED** | Named business owners, approved UAT data/devices, human acceptance, and sign-off are not available. |
| 46 | Manual Visual | **PARTIAL** | Automated browser screenshot/RTL/LTR/accessibility evidence passed; human visual review was not claimed. |
| 47 | Physical/Hardware | **NOT_APPLICABLE** | TSK-027 has no customer-specific scanner/printer/device behavior; POS hardware acceptance remains outside this task. |
| 48 | Production/Staging Smoke | **BLOCKED** | Only local disposable MariaDB browser execution was performed; no production/staging deployment, role grant, backup, or release smoke was authorized. |

## Executed commands

```text
php vendor\bin\phpunit -c phpunit.tsk027.sqlite.xml --filter CustomerLoyaltyLifecycleTest --testdox
php vendor\bin\phpunit -c phpunit.tsk027.mariadb.xml --filter CustomerLoyaltyLifecycleTest --testdox
php vendor\bin\phpunit -c phpunit.tsk027.concurrency.xml --testdox
php vendor\bin\phpunit -c phpunit.tsk027.sqlite.xml tests\Feature\Readiness\MilestoneReadinessAuthorizationTest.php --testdox
npx playwright test testing/e2e/tsk027-customer-loyalty.spec.js --project=chromium --project=firefox --project=webkit
```

## Result summary

23 categories passed, 8 were not applicable, 13 were not run, 2 were partial, and 2 are blocked by owner/release conditions. This is sufficient evidence for the implemented Local/Dev customer and retail-loyalty slice, not a Production/UAT completion claim.
