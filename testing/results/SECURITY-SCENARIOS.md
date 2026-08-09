# TOY & JOY Expanded Security Scenario Register

Audit date: 2026-08-08  
Scope: implemented Laravel routes/actions, actual seeded roles, branch/store scope, attachment foundation, session/error controls, and explicit readiness boundaries.  
Authority: `docs/02-prd.md`, `docs/04-roles-permissions.md`, `testing/04-cross-cutting-test-suite.md`, `testing/14-test-plan.md`, and the current implementation.  
Status vocabulary: `PASS` means the named evidence passed; `FAIL` means a reproducible defect; `BLOCKED_NOT_IMPLEMENTED` means the target capability does not exist; `BLOCKED_BY_ENVIRONMENT` means the required tool/environment was unavailable; `PARTIAL` means only the implemented local slice is proven.

## Required scenario fields

Every scenario below records: ID, title, threat/control, requirements, test type, actors/roles, preconditions, target, input/data, steps, expected result, evidence/command, observed result, status, and defect/blocker. A scenario marked blocked is not a pass and does not reduce the requirement.

## Implemented route and role matrix

This matrix is limited to routes that exist today. A role with no listed capability must receive a direct `403`, not merely a hidden navigation item. Super-administrator behavior is tested separately and must not be interpreted as the production role matrix.

| Actual role | Platform/admin | Catalog | Purchasing/inventory | POS/sales | Wallet/customer | Party/gift/returns | Reports/audit | Expected direct boundary |
|---|---|---|---|---|---|---|---|---|
| System Administrator | settings, branches, stores, drawers, authorization, health, audit, dashboard | view | local implemented views/actions | super-admin bypass only | wallets/settings | readiness views | dashboard/audit | Global local-demo access; no unapproved production grant implied |
| Branch Manager | branches/stores | none in current grants | purchase/inventory view according to seeded grants | POS view | none | none | none | Branch/store scope applies |
| Cashier | none | catalog view | none | POS view/create/print | no wallet routes | no party wallet; only permitted readiness if separately granted | none | Own assigned store/shift only |
| Purchasing Officer | none | catalog/supplier view/create/edit | PO/invoice/return local actions | none | none | none | none | Delegated purchasing scope |
| Warehouse Manager | none | catalog/supplier view | inventory/transfer/count and invoice/return approval grants | none | none | none | none | Assigned store/branch scope; no POS sale |
| Pricing Officer | none | catalog view | none | none | none | none | pricing view/create/edit/submit | No approval unless separately granted |
| Party Manager | none | none | none | none | no Product Wallet | party capabilities are readiness-only | none | Party data cannot cross into retail wallet |
| Stock Counter | none | catalog/inventory/count view/create/edit/submit | none | none | none | none | Cannot reconcile/approve directly |
| Accountant / Reviewer | audit/dashboard, scoped review | catalog view | purchase/inventory review | no POS route | product/party wallet view | gift/return readiness if granted | dashboard/audit | Read/export/review scope only |

## Scenario records

### SEC-001 — Unauthenticated direct-route boundary

- **Threat/control:** Authentication bypass through a guessed URL.
- **Requirements:** NFR-03, NFR-04, FLW-SYS-01.
- **Test type:** Feature / negative / route authorization.
- **Actors/roles:** Unauthenticated browser; all protected roles are out of scope until login.
- **Preconditions:** Fresh test database; no session cookie.
- **Target:** `/dashboard`, `/admin/settings`, `/admin/audit`, `/catalog/products`, `/inventory`, `/purchasing/orders`, `/pos`, `/wallets/product`, `/reports-readiness`.
- **Input/data:** `GET` requests with no credentials and forged numeric IDs where applicable.
- **Steps:** Request each target directly; do not follow login redirects; inspect status, `Location`, body, and response headers.
- **Expected result:** `302` to `/login` (or the documented unauthenticated response), no protected payload, no internal path/stack trace.
- **Evidence/command:** `php artisan test --filter='RolePermissionScopeTest|MilestoneReadinessAuthorizationTest|PlatformOperationalBaselineTest'`.
- **Observed result:** Implemented protected routes are covered; ordinary-screen API routes are not present.
- **Status:** PASS_LOCAL.
- **Defect/blocker:** Production session/cookie/TLS behavior remains unverified.

### SEC-002 — No-permission direct URL matrix

- **Threat/control:** Authorization implemented only in menus.
- **Requirements:** NFR-03, AC-XCUT-10.
- **Test type:** Feature / RBAC / direct URL.
- **Actors/roles:** Authenticated `readiness-no-access` and each canonical role without the target permission.
- **Preconditions:** Canonical authorization seeded; verified user session.
- **Target:** Every route in SEC-001 plus all 21 readiness routes and `/admin/authorization-baseline`.
- **Input/data:** Direct `GET`; no UI navigation.
- **Steps:** Authenticate the role; request every out-of-scope route; assert `403`; repeat with a role granted only an adjacent module.
- **Expected result:** `403`, safe denied page, no business rows, no sensitive fields.
- **Evidence/command:** `php artisan test --filter=MilestoneReadinessAuthorizationTest`; `php artisan test --filter=RolePermissionScopeTest`.
- **Observed result:** Readiness direct-denial tests pass; full canonical role expectations are red because the current seed grants more permissions than the approved baseline.
- **Status:** FAIL.
- **Defect/blocker:** QA-002 canonical RBAC drift (348 seeded permissions versus documented 276) and unauthorized sensitive grants.

### SEC-003 — Full actual-role route/RBAC matrix

- **Threat/control:** A role receives a capability outside its approved module or sensitive action set.
- **Requirements:** NFR-03; `docs/04-roles-permissions.md`.
- **Test type:** Feature / policy / negative matrix.
- **Actors/roles:** All nine actual roles listed in the matrix above.
- **Preconditions:** `CanonicalAuthorizationSeeder`; one user per role; optional branch/store scopes.
- **Target:** Route and gate capabilities for platform, catalog, purchasing, inventory, POS, wallets, party/readiness, reports, and audit.
- **Input/data:** Permission code, route name, HTTP method, forged route ID, and action name for each role/module/action cell.
- **Steps:** For each role, call the route and corresponding direct gate/action; test view, create, edit, submit, approve, export, reverse, cancel, override, and print where the permission exists.
- **Expected result:** Allowed cells succeed; every denied cell is `403`/authorization exception and leaves rows/audit unchanged.
- **Evidence/command:** Existing `RolePermissionScopeTest` plus focused permission tests; retain per-role response/status output.
- **Observed result:** Basic role and wallet-denial tests pass; exact documented grant assertion fails against the expanded current seed.
- **Status:** FAIL.
- **Defect/blocker:** QA-002; owner must reconcile the canonical grant contract before production.

### SEC-004 — Direct action authorization cannot be bypassed

- **Threat/control:** Calling an action through the container bypasses route middleware.
- **Requirements:** NFR-03, CUS-01, FLW-SYS-01.
- **Test type:** Feature / service authorization.
- **Actors/roles:** Accountant/Reviewer without `company_settings.edit`; Administrator with it.
- **Preconditions:** Canonical authorization seeded; action `SaveCustomerPolicySettingAction` resolvable.
- **Target:** `SaveCustomerPolicySettingAction::execute`.
- **Input/data:** Valid key `loyalty.retail_rule`, value, notes.
- **Steps:** Call the action directly while acting as Reviewer; call again as Administrator; inspect database/audit.
- **Expected result:** Reviewer receives authorization exception with zero setting/audit rows; Administrator creates version and audit in one transaction.
- **Evidence/command:** `php artisan test --filter=CustomerPolicySettingTest`.
- **Observed result:** 6 tests passed, 28 assertions; denied direct action and successful audited save proven.
- **Status:** PASS.
- **Defect/blocker:** Customer/loyalty mutation remains unimplemented; this proves only policy-version foundation.

### SEC-005 — Branch/store IDOR on protected attachments

- **Threat/control:** User changes a branch/store/source ID and downloads another scope's file.
- **Requirements:** AC-XCUT-04, AC-XCUT-10, NFR-03.
- **Test type:** Feature / IDOR / scope.
- **Actors/roles:** Scoped Cashier or manager; Administrator control.
- **Preconditions:** Two branches; attachment linked to foreign branch; private local disk.
- **Target:** `StoreAttachment`, `AuthorizeAttachmentAccess`, `DeliverAttachment`.
- **Input/data:** Foreign `branch_id`, mismatched `source_id`, valid image payload.
- **Steps:** Attempt linked upload and delivery from the out-of-scope user; repeat with source authorizer returning false.
- **Expected result:** `403`; no stored file, no attachment row for denied upload, no access audit for denied delivery.
- **Evidence/command:** `php artisan test --filter=AttachmentFoundationTest`.
- **Observed result:** Passed in 12 tests/40 assertions; foreign scope and source denial are enforced.
- **Status:** PASS_LOCAL.
- **Defect/blocker:** Object-storage IAM and production tenant isolation are not available.

### SEC-006 — Product media attachment IDOR

- **Threat/control:** A valid catalog user requests `/catalog/products/{other-product}/media/{attachment}` with a mismatched attachment.
- **Requirements:** AC-XCUT-04, NFR-03, MD-02/MD-06.
- **Test type:** Feature / IDOR / direct route.
- **Actors/roles:** Cashier/catalog viewer; Administrator control.
- **Preconditions:** Two products; active product image attached to only product A.
- **Target:** `catalog.products.media`.
- **Input/data:** Product B route parameter with Product A attachment UUID; missing attachment; revoked attachment.
- **Steps:** Request each forged combination; inspect status/body/headers.
- **Expected result:** `403` for mismatched source, `404` for missing model, no file bytes or storage path in response.
- **Evidence/command:** Route code inspection plus future product-media feature test; current attachment foundation tests cover action-level equivalent.
- **Observed result:** Route contains purpose/source/product-image membership checks; a dedicated route-level forged-ID test is not yet present.
- **Status:** PARTIAL.
- **Defect/blocker:** Add authenticated route test when stable product/media fixtures are selected; no claim of complete route proof.

### SEC-007 — Product Wallet / Party Wallet cross-activity isolation

- **Threat/control:** Cashier sees Party Wallet or Party Manager sees Product Wallet.
- **Requirements:** CUS-02, NFR-03.
- **Test type:** Feature / RBAC / IDOR / data isolation.
- **Actors/roles:** Cashier and Party Manager in both directions; Administrator control.
- **Preconditions:** Separate wallet tables and permissions; empty and populated ledger fixtures.
- **Target:** `/wallets/product`, `/wallets/party`, direct ledger queries.
- **Input/data:** Forged route and ledger IDs; one row in each ledger.
- **Steps:** Request both routes as each activity role; query both models; attempt update/delete.
- **Expected result:** Cross-activity route is `403`; ledger tables remain physically separate; direct updates/deletes throw append-only exceptions.
- **Evidence/command:** `php artisan test --filter=WalletIsolationTest`.
- **Observed result:** 4 tests pass, 19 assertions (current combined focused result includes this coverage).
- **Status:** PASS_LOCAL.
- **Defect/blocker:** Wallet settlement/reporting operations do not exist.

### SEC-008 — Hidden-control bypass on mutating POS endpoints

- **Threat/control:** User posts directly to a form action hidden from the UI.
- **Requirements:** NFR-03, POS-02, FLW-SYS-01.
- **Test type:** Feature / HTTP method / negative authorization.
- **Actors/roles:** Authenticated no-access user, Branch Manager (view-only), Cashier (create).
- **Preconditions:** Route session and product fixture; no active shift for denied actor.
- **Target:** `POST /pos/cart/add`, `/pos/cart/remove`, `/pos/cart/clear`, `/pos/checkout`, `/pos/suspend`.
- **Input/data:** Valid product IDs plus forged quantities, foreign sale IDs, missing CSRF when applicable.
- **Steps:** Call each endpoint directly for denied roles; then call valid cart action for Cashier; inspect session/database.
- **Expected result:** Denied roles receive `403` and no cart/sale mutation; Cashier follows validation and active-shift rules.
- **Evidence/command:** Route inspection; existing `RetailSaleIntegrityTest` covers sale integrity but a full denied POST matrix is not present.
- **Observed result:** Route-level `can:pos_sales.create` and action guards exist; complete matrix is not executed.
- **Status:** PARTIAL.
- **Defect/blocker:** Cash shifts/payment/offline workflows remain incomplete.

### SEC-009 — Session fixation and authenticated-session lifecycle

- **Threat/control:** Old session remains valid after authentication or logout.
- **Requirements:** NFR-04, FLW-AUTH-01.
- **Test type:** Feature / authentication / session.
- **Actors/roles:** Guest, verified user, blocked/unverified user.
- **Preconditions:** Array session driver; Fortify routes available.
- **Target:** Login, logout, password confirmation, email verification, two-factor/passkey lifecycle.
- **Input/data:** Pre-auth session ID, valid/invalid credentials, logout request, stale password-confirmation state.
- **Steps:** Capture pre-login session; authenticate; assert session rotation; logout; replay old session; exercise protected route and confirmation middleware.
- **Expected result:** Session ID rotates on login, logout invalidates session, protected route does not accept old cookie, sensitive action requires confirmation where configured.
- **Evidence/command:** `php artisan test --filter=AuthenticationLifecycleTest`; security screen manual verification remains incomplete after `/user/confirm-password`.
- **Observed result:** Authentication lifecycle tests pass for implemented registration/login/lockout boundaries; complete post-confirmation walkthrough not run.
- **Status:** PARTIAL.
- **Defect/blocker:** Production cookie flags, domain, TLS, MFA policy, and full post-confirmation matrix are open.

### SEC-010 — Brute-force/rate-limit boundary

- **Threat/control:** Repeated credential attempts are unlimited or reveal account existence.
- **Requirements:** NFR-04, FLW-AUTH-02.
- **Test type:** Feature / rate limit / negative.
- **Actors/roles:** Guest attacker; known and unknown identity.
- **Preconditions:** Fortify login route and limiter enabled.
- **Target:** Login and password reset request endpoints.
- **Input/data:** Repeated bad credentials; known and unknown email/username; varying case/IP headers.
- **Steps:** Send attempts until limiter threshold; compare status/body for known/unknown identity; inspect no credential leakage.
- **Expected result:** Controlled `429`, generic identity-safe response, no stack/path/secret, no account lockout bypass through simple header mutation.
- **Evidence/command:** `php artisan test --filter=AuthenticationLifecycleTest` (existing test confirms `429`).
- **Observed result:** Existing login throttling test passes; comprehensive password-reset enumeration/IP spoof matrix is not present.
- **Status:** PARTIAL.
- **Defect/blocker:** Production proxy/IP trust and password policy require environment/UAT evidence.

### SEC-011 — Request-ID header injection and correlation safety

- **Threat/control:** Newline/header injection or unbounded correlation value contaminates logs/response.
- **Requirements:** NFR-01, NFR-04, AC-XCUT-15.
- **Test type:** Feature / fuzz / error observability.
- **Actors/roles:** Unauthenticated attacker.
- **Preconditions:** `SetRequestId` middleware active.
- **Target:** Any web/JSON response.
- **Input/data:** Missing ID, short ID, >64-character ID, newline-containing ID, valid alphanumeric-hyphen ID, `X-Correlation-ID`.
- **Steps:** Send each header variant; inspect response header and error body.
- **Expected result:** Invalid values replaced with UUID; valid safe value preserved; no newline or secret/path leakage.
- **Evidence/command:** `php artisan test --filter=PlatformOperationalBaselineTest`.
- **Observed result:** Existing tests pass for generated, preserved, invalid, and injected values.
- **Status:** PASS_LOCAL.
- **Defect/blocker:** Distributed tracing/log sink behavior is not production-tested.

### SEC-012 — Safe HTML and JSON unexpected-error responses

- **Threat/control:** Debug stack traces, source paths, secrets, or exception messages exposed.
- **Requirements:** AC-XCUT-15, NFR-04.
- **Test type:** Feature / error handling / API boundary.
- **Actors/roles:** Unauthenticated attacker; JSON client.
- **Preconditions:** `app.debug=false`; test-only throwing route.
- **Target:** HTML and `/api/*` JSON error responses, 403/404/500/503.
- **Input/data:** Exception containing `SECRET-INTERNAL-DETAIL`, `base64:`, vendor path, app key; malformed API path.
- **Steps:** Request HTML and JSON endpoints; inspect status, content type, body, and request ID.
- **Expected result:** Safe localized error shape with request ID; no trace/file/line/secret/vendor path.
- **Evidence/command:** `php artisan test --filter=PlatformOperationalBaselineTest`.
- **Observed result:** Existing safe-error tests pass.
- **Status:** PASS_LOCAL.
- **Defect/blocker:** Reverse proxy/custom 419/429/maintenance templates require production-like verification.

### SEC-013 — Attachment validation negative/fuzz boundary

- **Threat/control:** Malicious or malformed upload becomes executable, oversized, empty, or mismatched content.
- **Requirements:** AC-XCUT-04, AC-XCUT-05, NFR-04.
- **Test type:** Feature / validation / fuzz / file security.
- **Actors/roles:** Authorized uploader and unauthorized uploader.
- **Preconditions:** Local private disk; purpose MIME/size registry.
- **Target:** `ValidateAttachment`, `StoreAttachment`.
- **Input/data:** Empty file, invalid MIME, mismatched extension/content, double extension (`.php.jpg`), traversal filename, configured oversize, null byte filename, unconfigured purpose.
- **Steps:** Submit each payload; inspect ValidationException fields, row count, stored files, audit outcome.
- **Expected result:** Reject unsafe input; no active orphan/file; validation audit only where implemented; filename reduced to basename.
- **Evidence/command:** `php artisan test --filter=AttachmentFoundationTest`.
- **Observed result:** 12 tests/40 assertions pass; null-byte and unconfigured-purpose cases are covered in implementation but not yet separate assertions.
- **Status:** PASS_LOCAL/PARTIAL.
- **Defect/blocker:** Malware scanning, archive bombs, object-storage ACLs, and production limits are unavailable.

### SEC-014 — Attachment delivery state and path-leakage boundary

- **Threat/control:** Expired/deleted/unlinked/out-of-scope attachment is delivered or reveals internal storage path.
- **Requirements:** AC-XCUT-04, AC-XCUT-05, NFR-03.
- **Test type:** Feature / IDOR / response-header security.
- **Actors/roles:** Scoped Cashier; foreign-scope user; source authorizer.
- **Preconditions:** Active, temporary, expired, deleted, and missing-file attachment records; private disk.
- **Target:** `AuthorizeAttachmentAccess`, `DeliverAttachment`, catalog media route.
- **Input/data:** Forged attachment UUID, expired timestamp, deleted state, missing storage path, filename `../../private/file.png`.
- **Steps:** Attempt delivery for each state; inspect status, body, content disposition, cache headers, and audit rows.
- **Expected result:** Only active, linked, unexpired, in-scope, source-authorized file streams; denied/missing states return 403/404 without path or bytes; `private, no-store, nosniff` headers present.
- **Evidence/command:** `php artisan test --filter=AttachmentFoundationTest`.
- **Observed result:** Delivery/path/header/scope/expiry checks pass locally.
- **Status:** PASS_LOCAL/PARTIAL.
- **Defect/blocker:** Route-level product media forged-ID test and production object storage remain open.

### SEC-015 — Attachment transaction/orphan rollback

- **Threat/control:** File remains on disk after attachment row/audit transaction fails.
- **Requirements:** AC-XCUT-05, AC-XCUT-08, NFR-01.
- **Test type:** Feature / integration / rollback / data integrity.
- **Actors/roles:** Authorized uploader; induced audit failure.
- **Preconditions:** Private fake disk; `RecordAuditEvent` throws after file write.
- **Target:** `StoreAttachment` transaction and cleanup path.
- **Input/data:** Valid image; forced audit exception after storage.
- **Steps:** Execute upload; catch exception; query attachments/audit; enumerate disk.
- **Expected result:** Database transaction rolls back and catch block deletes stored file; no active orphan or misleading success audit.
- **Evidence/command:** `php artisan test --filter=AttachmentFoundationTest`.
- **Observed result:** Rollback test passes.
- **Status:** PASS_LOCAL.
- **Defect/blocker:** Cross-process/object-storage failure semantics remain unverified.

### SEC-016 — Append-only audit and sensitive-value redaction

- **Threat/control:** Audit history can be altered or secrets are persisted in before/after values.
- **Requirements:** NFR-01, NFR-02, AC-XCUT-08.
- **Test type:** Feature / data integrity / privacy.
- **Actors/roles:** Administrator; unauthorized direct model caller.
- **Preconditions:** Audit and attachment/customer setting records exist.
- **Target:** `AuditLog`, `Attachment`, `RecordAuditEvent`.
- **Input/data:** Direct update/delete; password, token, API key, refresh token fields.
- **Steps:** Record event; inspect serialized DB values; attempt update/delete on audit and attachment models.
- **Expected result:** Secrets become `[redacted]`; direct mutation/deletion throws; named actions create append-only event with actor/request/source.
- **Evidence/command:** `php artisan test --filter='AuditLogValueRedactorTest|AuditAppendOnlyAndScopeTest|CustomerPolicySettingTest|AttachmentFoundationTest'`.
- **Observed result:** Focused audit/customer/attachment tests pass locally.
- **Status:** PASS_LOCAL.
- **Defect/blocker:** Full mandated-event coverage and production log retention are open.

### SEC-017 — Self-authorization and self-approval separation

- **Threat/control:** Requester grants themselves sensitive rights or approves own request.
- **Requirements:** NFR-03, AC-XCUT-01.
- **Test type:** Feature / policy / SoD.
- **Actors/roles:** Administrator/requester; Reviewer/approver.
- **Preconditions:** Approval records and authorization action available.
- **Target:** `SaveUserAuthorizationAction`, `RequestApproval`, `ApproveRequest`.
- **Input/data:** Target user equal to actor; approval request with requester equal to approver.
- **Steps:** Call actions directly and through routes; inspect role/approval state/audit.
- **Expected result:** Self-grant/self-approval denied; no permission/state/audit success mutation; independent approver can proceed when authorized.
- **Evidence/command:** `php artisan test --filter='RolePermissionScopeTest|ApprovalFoundationTest'`.
- **Observed result:** Self-authorization guard tests pass; approval expiry path separately fails.
- **Status:** PARTIAL.
- **Defect/blocker:** QA-003 expiry authorization defect.

### SEC-018 — Approval expiry cannot be forced by an authenticated user

- **Threat/control:** Expiry action trusts an authenticated caller without explicit authorization.
- **Requirements:** AC-XCUT-01/02/03, NFR-03.
- **Test type:** Feature / state machine / negative authorization.
- **Actors/roles:** Authenticated requester; authorized reviewer; unauthorized reviewer.
- **Preconditions:** Expirable pending approval record.
- **Target:** `ExpireApprovalRequest` and approval route/action.
- **Input/data:** Expired timestamp, record ID, direct action call.
- **Steps:** Invoke expiry as requester and unauthorized reviewer; invoke as authorized actor; inspect state/audit.
- **Expected result:** Unauthorized call is controlled denial; authorized call transitions once and audits; no orphan/duplicate audit.
- **Evidence/command:** `php artisan test --filter=ApprovalFoundationTest`.
- **Observed result:** Existing test fails with `An authenticated expiry action requires explicit authorization.`
- **Status:** FAIL.
- **Defect/blocker:** QA-003; current expiry path does not meet the expected controlled authorization contract.

### SEC-019 — Idempotency key reuse with changed payload

- **Threat/control:** Replay key is accepted for a materially different payload, hiding tampering.
- **Requirements:** AC-XCUT-09, NFR-06, POS-02, INV-03.
- **Test type:** Integration / negative / data integrity.
- **Actors/roles:** Cashier or warehouse actor.
- **Preconditions:** Existing sale/transfer/mutation accepted with key K.
- **Target:** Retail sale and inventory action idempotency paths.
- **Input/data:** First payload quantity/price/source A with key K; second payload changed quantity/price/source B with same K.
- **Steps:** Submit first; replay identical; replay changed payload; compare response, rows, movements, totals, audit.
- **Expected result:** Identical replay returns original result without duplicates; changed payload is rejected as conflict and creates no mutation.
- **Evidence/command:** Existing expanded suite evidence in `testing/results/SECURITY-REPORT.md` and `DEFECTS.md`.
- **Observed result:** Inventory and retail accept same key with changed payload.
- **Status:** FAIL.
- **Defect/blocker:** Known high-risk replay-integrity defect; production release blocked.

### SEC-020 — Malformed route/query/filter fuzzing

- **Threat/control:** Type confusion, unbounded filters, SQL injection, or scope bypass through query parameters.
- **Requirements:** NFR-03, NFR-05, AC-XCUT-10/11/15.
- **Test type:** Feature / fuzz / API-boundary.
- **Actors/roles:** Authenticated scoped user and unauthenticated attacker.
- **Preconditions:** Implemented paginated/list routes.
- **Target:** Product, purchase, inventory, sales, audit, wallet routes and readiness filters where present.
- **Input/data:** `id[]=`, negative/huge page, null/UTF-8/control characters, SQL metacharacters, `branch_id`/`store_id` foreign values, unknown sort columns, `per_page=0/999999`.
- **Steps:** Send each parameter shape; inspect status, query result scope, response time, errors, and mutation count.
- **Expected result:** Validation or bounded safe response; no SQL error/trace, no cross-scope data, no unbounded memory/query.
- **Evidence/command:** Not fully automated; route/list tests cover selected pagination and scope cases.
- **Observed result:** Full fuzz/performance run is absent.
- **Status:** BLOCKED_BY_ENVIRONMENT/PARTIAL.
- **Defect/blocker:** Required fuzz/load harness and high-volume production-like data are unavailable.

### SEC-021 — Ordinary-screen API/direct JSON boundary

- **Threat/control:** An undocumented API exposes data without web authorization.
- **Requirements:** NFR-03, NFR-04, AC-XCUT-15.
- **Test type:** Route inventory / API security / negative.
- **Actors/roles:** Unauthenticated and authenticated no-access clients.
- **Preconditions:** Laravel route inventory generated from current app.
- **Target:** `/api/*`, JSON `Accept` requests to web routes, Livewire endpoints.
- **Input/data:** GET/POST/PUT/DELETE with JSON body and `Accept: application/json`.
- **Steps:** Enumerate route URIs; request guessed ordinary-screen API paths; request protected web paths as JSON.
- **Expected result:** No separate ordinary-screen API surface; web route middleware still authorizes; safe JSON errors contain no trace/path.
- **Evidence/command:** `php artisan route:list`; `php artisan test --filter=PlatformOperationalBaselineTest`.
- **Observed result:** Route inventory reports no separate ordinary-screen API; safe JSON error tests pass.
- **Status:** PASS_LOCAL/PARTIAL.
- **Defect/blocker:** Livewire transport and production WAF/API gateway remain outside local proof.

### SEC-022 — Validation failure has no business side effects

- **Threat/control:** Invalid input partially writes records, stock, money, or audit success.
- **Requirements:** FLW-SYS-02/03, AC-XCUT-08, NFR-01.
- **Test type:** Feature / transaction / negative.
- **Actors/roles:** Cashier, purchasing, warehouse, Administrator.
- **Preconditions:** Valid fixture plus one invalid request per action.
- **Target:** Customer policy, attachment, PO/invoice/return, inventory, POS endpoints.
- **Input/data:** Missing required fields, invalid state, invalid ID, negative/zero quantity, malformed amount, foreign scope.
- **Steps:** Capture row/movement/audit counts; invoke action; assert validation/403; compare all counts and source state.
- **Expected result:** Failure response contains field-safe error and request ID; no success audit, stock, payment, wallet, or source mutation.
- **Evidence/command:** Attachment and customer policy suites pass; purchasing/inventory delegated suites cover selected flows.
- **Observed result:** Local implemented slices pass selected rollback/validation tests; full module matrix cannot run for absent modules.
- **Status:** PARTIAL.
- **Defect/blocker:** Returns, wallets, shifts, parties, and reports mutations are not implemented.

### SEC-023 — Numeric and boundary input hardening

- **Threat/control:** Overflow, precision, zero/negative, fractional, or extreme values corrupt state.
- **Requirements:** NFR-03/05/06, INV-06, POS-04, CUS-03.
- **Test type:** Unit / feature / boundary / data integrity.
- **Actors/roles:** Cashier, warehouse, policy administrator.
- **Preconditions:** Implemented calculators/actions and their validation contracts.
- **Target:** POS cart quantity, inventory quantity, purchase invoice lines, customer policy max lengths, upload byte limits.
- **Input/data:** `0`, negative, `0.000001`, fractional non-fractional product, max decimal, integer overflow, 2001-character text.
- **Steps:** Invoke each validator/action; inspect errors and unchanged state.
- **Expected result:** Boundary values follow documented rule; invalid values rejected without mutation; no float truncation or overflow.
- **Evidence/command:** `php artisan test --filter='OpenPricePolicyTest|PurchaseInvoiceCalculatorTest|AttachmentFoundationTest|InventoryWorkflowIntegrityTest'`.
- **Observed result:** Attachment and calculator boundaries pass; inventory non-fractional movement defect is confirmed.
- **Status:** FAIL/PARTIAL.
- **Defect/blocker:** QA-027 fractional movement accepted for non-fractional product.

### SEC-024 — Report/export authorization and formula-injection boundary

- **Threat/control:** User downloads another branch's report or spreadsheet formula payload executes.
- **Requirements:** RPT-03, AC-XCUT-10/12, NFR-03/05.
- **Test type:** Feature / export security / IDOR / fuzz.
- **Actors/roles:** Reviewer, Manager, no-export user, attacker-controlled report field.
- **Preconditions:** Report/export implementation with artifact ownership and separate download authorization.
- **Target:** `/reports`, `/exports`, report/export direct IDs.
- **Input/data:** Foreign branch/store filter, guessed artifact ID, expired artifact, cell values beginning `=`, `+`, `-`, `@`.
- **Steps:** Generate and download with/without export permission; tamper filters/artifact ID; inspect file values and audit.
- **Expected result:** Scope applied before filters; generation/download separately re-authorized; foreign/expired artifact denied; formula cells escaped; export audit records actor/scope/outcome.
- **Evidence/command:** No report/export implementation or executable artifact exists; readiness route only.
- **Observed result:** Not runnable.
- **Status:** BLOCKED_NOT_IMPLEMENTED.
- **Defect/blocker:** QA-017; RPT-01–03 and AC-XCUT-12 are not implemented.

### SEC-025 — Customer/child sensitive-field purpose isolation

- **Threat/control:** Retail actor can view child/consent/sensitive customer fields outside purpose.
- **Requirements:** CUS-01/04, NFR-03/04.
- **Test type:** Feature / RBAC / privacy / IDOR.
- **Actors/roles:** Cashier, Party Manager, Reviewer, Administrator.
- **Preconditions:** Customer/child records and purpose-scoped policies implemented.
- **Target:** Customer list/profile/history/loyalty routes.
- **Input/data:** Foreign customer ID, child fields, consent fields, financial tabs, direct export/print URL.
- **Steps:** Request profile and tabs by each role; compare field payload and direct URLs.
- **Expected result:** Minimum necessary fields only; denied tabs return 403/404 without sensitive payload; consent purpose and audit enforced.
- **Evidence/command:** Only customer policy settings/readiness exists; no customer profile or child records.
- **Observed result:** Not runnable.
- **Status:** BLOCKED_NOT_IMPLEMENTED.
- **Defect/blocker:** QA-017; customer/loyalty mutation and profile screens are absent.

### SEC-026 — Party/Product separation and party-wallet IDOR

- **Threat/control:** Party service or child data is mixed into retail sale/product wallet, or a forged party ID exposes another party.
- **Requirements:** PTY-01/06, CUS-02, NFR-03.
- **Test type:** Integration / IDOR / data integrity.
- **Actors/roles:** Party Manager, Cashier, Reviewer.
- **Preconditions:** Party booking/invoice/payment/wallet modules and two party records.
- **Target:** Party invoice/payment/settlement and Product/Party Wallet routes.
- **Input/data:** Retail product line in party invoice, party service in retail sale, foreign party ID, settlement with wallet references.
- **Steps:** Invoke each cross-boundary operation; inspect invoice lines, ledgers, payments, audit, and scope.
- **Expected result:** Mixed lines blocked; Product Wallet untouched by party settlement; foreign party denied; immutable final source and audit.
- **Evidence/command:** Wallet route isolation passes; party mutation modules absent.
- **Observed result:** Only wallet storage/display foundation proven.
- **Status:** BLOCKED_NOT_IMPLEMENTED/PARTIAL.
- **Defect/blocker:** QA-017.

### SEC-027 — Asset reservation double-booking/concurrency boundary

- **Threat/control:** Two requests reserve the same asset interval or forged asset state skips inspection.
- **Requirements:** AST-02/03, NFR-06, AC-XCUT-16.
- **Test type:** Integration / concurrency / state machine / IDOR.
- **Actors/roles:** Two Party Managers, Reviewer.
- **Preconditions:** Asset registry, reservation intervals/buffers, row-lock/unique conflict rules implemented.
- **Target:** Asset reservation, checkout, return, inspection, damage actions.
- **Input/data:** Same asset/overlapping intervals, stale reservation ID, invalid `Checked Out → Available` jump.
- **Steps:** Submit concurrently; replay stale state; inspect reservations/events/status/audit.
- **Expected result:** Exactly one reservation succeeds; loser receives conflict; illegal state jump denied; no duplicate checkout.
- **Evidence/command:** No asset module/actions/tables exist; readiness route only.
- **Observed result:** Not runnable.
- **Status:** BLOCKED_NOT_IMPLEMENTED.
- **Defect/blocker:** QA-017; concurrency and asset lifecycle absent.

### SEC-028 — Offline POS trust boundary

- **Threat/control:** Tampered queued sale, replay, cross-device payload, or offline conflict posts unauthorized stock/payment.
- **Requirements:** NFR-04/06, FLW-OFF-01/02/03.
- **Test type:** Integration / security / replay / concurrency.
- **Actors/roles:** Offline Cashier, Manager conflict reviewer, attacker with local storage access.
- **Preconditions:** Offline queue, signatures/trusted policy cache, device/session binding, sync endpoint.
- **Target:** Offline queue, sync, conflict resolution, local IndexedDB/Service Worker.
- **Input/data:** Modified amount/product, duplicate local ID, expired policy, foreign branch, stale version, duplicate sync.
- **Steps:** Queue/replay/tamper payloads; sync online; inspect accepted/rejected/conflict state and ledger counts.
- **Expected result:** Accepted payload posts once; tampered/foreign/expired payload rejected; conflict explicit; no silent auto-resolve.
- **Evidence/command:** `php artisan test --filter=CashShiftOfflineBoundaryTest` covers readiness boundary only; no offline queue implementation.
- **Observed result:** Not runnable.
- **Status:** BLOCKED_NOT_IMPLEMENTED.
- **Defect/blocker:** QA-018.

### SEC-029 — Import file security and duplicate-batch boundary

- **Threat/control:** Formula/macro/zip-bomb/traversal file or duplicate batch enters catalog/purchasing.
- **Requirements:** AC-XCUT-04/05, MD-03, PUR-03, NFR-04.
- **Test type:** Feature / file security / fuzz / transaction.
- **Actors/roles:** Purchasing Officer/importer; independent approver.
- **Preconditions:** Locked OpenSpout reader and staging workflow available.
- **Target:** Product and purchase-invoice import upload/stage/review/approval/error download.
- **Input/data:** XLSX formulas/macros, malformed ZIP, oversized compressed ratio, traversal filename, duplicate source reference, invalid MIME.
- **Steps:** Upload/stage each artifact; inspect quarantine/private storage, staged rows, error file, approval/audit.
- **Expected result:** Unsafe file rejected/quarantined; formula/macro neutralized/rejected; duplicates isolated; no production mutation before approval; no public error file.
- **Evidence/command:** `vendor/bin/phpstan analyse --memory-limit=1G`; import tests blocked by missing/incompatible OpenSpout vendor state.
- **Observed result:** Reader dependency/API incompatibility prevents execution.
- **Status:** BLOCKED_BY_ENVIRONMENT/FAIL.
- **Defect/blocker:** QA-006.

### SEC-030 — Production configuration and secret exposure

- **Threat/control:** Debug mode, public storage, weak cookies, exposed env/keys, or missing TLS/header controls.
- **Requirements:** NFR-04/07, AC-XCUT-04/15.
- **Test type:** Configuration / static security / deployment.
- **Actors/roles:** Deployment operator; anonymous HTTP client.
- **Preconditions:** Production-like host, TLS, reverse proxy, secret manager, object storage.
- **Target:** `.env`, config cache, response headers/cookies, storage URLs, error pages.
- **Input/data:** `APP_DEBUG=true`, public attachment disk, missing secure cookie flags, `/up`, 404/500 responses.
- **Steps:** Inspect effective production config; request normal/error pages; inspect cookies/security headers and storage URL exposure.
- **Expected result:** Debug off; secrets never rendered; secure/http-only/same-site cookies; private storage; TLS/HSTS/CSP policy approved; safe errors.
- **Evidence/command:** Local environment safety tests and safe-error tests; production host unavailable.
- **Observed result:** Local safety passes; production controls unavailable.
- **Status:** BLOCKED_BY_ENVIRONMENT.
- **Defect/blocker:** QA-023 production platform/secret/storage decisions remain open.

### SEC-031 — Queue/scheduler authorization and duplicate-job boundary

- **Threat/control:** Expiry/reconciliation/alert jobs run without scope, repeat financial effects, or no scheduler executes them.
- **Requirements:** NFR-01/03/06, AC-XCUT-09.
- **Test type:** Integration / scheduler / replay / operations security.
- **Actors/roles:** Scheduler worker; system Administrator; scoped source owners.
- **Preconditions:** Queue workers, scheduled jobs, retry/idempotency policy.
- **Target:** Attachment expiry, approval expiry, alerts, reconciliation, export jobs.
- **Input/data:** Duplicate job ID, stale job payload, foreign branch, retry after partial failure.
- **Steps:** Dispatch/retry jobs; inspect job uniqueness, side effects, audit, failure handling, scope.
- **Expected result:** Job runs only authorized scope; retries idempotent; partial failure rolls back; failed jobs observable; scheduler heartbeat present.
- **Evidence/command:** `php artisan schedule:list` reports no scheduled tasks.
- **Observed result:** No scheduled tasks are registered.
- **Status:** FAIL/BLOCKED_NOT_IMPLEMENTED.
- **Defect/blocker:** QA-010 and missing operational jobs.

### SEC-032 — Backup/restore and post-restore authorization integrity

- **Threat/control:** Backup leaks secrets, restore loses permission/audit/ledger rows, or restored app accepts stale sessions.
- **Requirements:** NFR-01/03/04, release gate.
- **Test type:** Disaster recovery / security / data integrity.
- **Actors/roles:** Recovery operator; all nine roles after restore.
- **Preconditions:** Approved production-like database, encrypted backup, isolated restore host.
- **Target:** Backup artifacts, restored DB, auth/session/permission/audit/ledger tables.
- **Input/data:** Representative records, deleted/expired attachments, role scopes, audit rows, wallet/stock ledgers.
- **Steps:** Backup; restore clean; compare critical row counts/hashes; revoke a role before/after; execute smoke and reconciliation.
- **Expected result:** Backup private/encrypted; restore preserves integrity and authorization; no stale session bypass; reconciliation passes.
- **Evidence/command:** `scripts/backup-restore-drill.sh` is absent; no production-like database.
- **Observed result:** Not executed.
- **Status:** BLOCKED_BY_ENVIRONMENT.
- **Defect/blocker:** QA-005/QA-022/QA-023.

### SEC-033 — Human penetration/UAT privacy review

- **Threat/control:** Automated tests miss privilege escalation, privacy leaks, or Arabic/RTL field exposure.
- **Requirements:** NFR-03/04, CUS-01/04, release/UAT gates.
- **Test type:** Manual penetration / UAT / privacy.
- **Actors/roles:** Named business users, security reviewer, all applicable roles.
- **Preconditions:** Approved scenarios, representative non-production data, supported devices, evidence repository.
- **Target:** Auth, customer/child, wallets, POS, party, reports, exports, attachments, audit, print.
- **Input/data:** Forged URLs/IDs, role switching, Arabic names/notes, sensitive fields, expired sessions, device/offline conditions.
- **Steps:** Execute role-by-role misuse scenarios in Arabic and English; capture request IDs, screenshots, payloads, and defect retests.
- **Expected result:** No critical/high privacy or authorization defect; signed UAT and security report with owners and retest evidence.
- **Evidence/command:** No approved UAT owners/data/devices/evidence repository.
- **Observed result:** Not executed.
- **Status:** BLOCKED_BY_ENVIRONMENT.
- **Defect/blocker:** QA-022 and TSK-043/044 remain open.

## Explicit required-field completion matrix

The following matrix makes the required security/data/audit/rollback/release fields explicit for **every** scenario above. `N/A` means the capability is deliberately absent and therefore cannot be claimed as tested. Priority uses `P0` (release blocker), `P1` (high), `P2` (normal), or `P3` (low).

| ID | Milestone / workflow | Security Expectation | DB/Data Integrity Expectation | Audit Expectation | Failure/Rollback Expectation | Priority | Severity | Automation Status |
|---|---|---|---|---|---|---|---|---|
| SEC-001 | DM 1.1 auth / protected routes | Guest cannot read protected payload | No rows or session-protected state exposed | No success audit | Redirect/error is safe and side-effect free | P0 | Critical | Existing automated PASS_LOCAL |
| SEC-002 | DM 1.1–6.4 role route matrix | No-permission role receives 403 | No protected row mutation | Denial has no success event | Denial must leave state unchanged | P0 | Critical | Existing automated partial; RBAC FAIL |
| SEC-003 | TSK-008 canonical RBAC | Only documented role/action cells allowed | Permission pivot equals approved contract | Grant changes are audited | Invalid grant rejected atomically | P0 | Critical | Existing automated FAIL (QA-002) |
| SEC-004 | TSK-027 customer policy action | Direct action enforces `company_settings.edit` | Authorized version increments per key | Version creation records actor/source/request | Invalid key/denial creates no row | P1 | High | New/existing automated PASS |
| SEC-005 | TSK-009 attachment scope | Foreign branch/store/source cannot upload/download | No denied attachment/file row | No denied access audit | Denial removes/avoids file | P0 | Critical | New automated PASS_LOCAL |
| SEC-006 | TSK-011 product media | Product ID and attachment source must match | Foreign media bytes never delivered | No access audit on IDOR denial | 403/404 is side-effect free | P0 | Critical | New route test PASS_LOCAL |
| SEC-007 | TSK-028 wallet separation | Activity roles cannot cross wallet routes | Separate tables and append-only rows | Wallet actions remain source-auditable | Cross-wallet mutation rejected | P0 | Critical | Existing automated PASS_LOCAL |
| SEC-008 | TSK-023 POS direct writes | Hidden controls cannot bypass `pos_sales.create` | Denied cart/sale leaves session/DB unchanged | No success audit on denial | Validation/authorization failure atomic | P0 | Critical | Existing route guards; matrix partial |
| SEC-009 | TSK-002 auth/session | Login/logout/confirmation resist fixation/replay | Old session cannot access new state | Auth lifecycle events safe | Failed auth does not mutate account | P0 | Critical | Existing lifecycle partial |
| SEC-010 | TSK-002 login throttling | Repeated attempts are rate-limited and enumeration-safe | No unintended lockout/account change | No credential leakage in logs/response | 429 path is safe and retryable | P1 | High | Existing automated partial |
| SEC-011 | TSK-001 request correlation | Header injection cannot alter response/log structure | No corrupted correlation state | Safe request ID carried to audit | Invalid header replaced with UUID | P1 | High | Existing automated PASS_LOCAL |
| SEC-012 | TSK-001 safe errors | No trace, path, key, or secret leakage | Errors do not commit failed mutations | Request ID available for support | Exception response is safe for HTML/JSON | P0 | Critical | Existing automated PASS_LOCAL |
| SEC-013 | AC-XCUT-04/05 file validation | Unsafe MIME/name/size/content rejected | No active orphan or unsafe file | Rejection outcome is auditable where supported | Validation fails before storage; rollback removes file | P0 | Critical | New automated PASS_LOCAL/PARTIAL |
| SEC-014 | AC-XCUT-04 delivery | Only active, linked, unexpired, scoped source is streamable | No foreign/missing bytes or path | Access success audited; denial not audited as success | 403/404 leaves state unchanged | P0 | Critical | New automated PASS_LOCAL |
| SEC-015 | AC-XCUT-05/08 attachment rollback | Failed transaction cannot expose stored file | Row and file are both removed | No orphan success audit | Induced audit failure rolls DB/storage back | P0 | Critical | New automated PASS_LOCAL |
| SEC-016 | TSK-009 audit/immutability | Audit and attachment history cannot be edited/deleted directly | Before/after values remain append-only | Secrets redacted; actor/source/request retained | Named action only; failed mutation leaves history | P0 | Critical | Existing/new automated PASS_LOCAL |
| SEC-017 | AC-XCUT-01 authorization SoD | Requester cannot self-grant or self-approve | Role/approval state unchanged on denial | No false success event | Denial is atomic | P0 | Critical | Existing automated partial |
| SEC-018 | AC-XCUT-01/02/03 expiry | Only explicitly authorized actor can expire | One valid terminal transition | Expiry event records authorized actor | Unauthorized expiry fails controlled; no partial state | P0 | Critical | Existing automated FAIL (QA-003) |
| SEC-019 | AC-XCUT-09 replay | Changed payload under same key is rejected | Exactly one business effect for key | One success audit; conflict recorded safely if supported | Conflict has no second movement/payment/number | P0 | Critical | Existing automated FAIL |
| SEC-020 | AC-XCUT-10/11 query fuzz | Malformed filters cannot broaden scope or DoS | Result remains bounded and scoped | No internal SQL/trace leakage | Invalid query has no mutation | P1 | High | Not fully automated; BLOCKED |
| SEC-021 | NFR-03 ordinary API boundary | No undocumented unauthorised API surface | JSON requests honor same route guards | JSON errors retain safe request ID | Unknown API returns safe 404/500 | P1 | High | Route diagnostic + safe JSON PASS_LOCAL |
| SEC-022 | FLW-SYS-02/03 validation | Invalid action cannot bypass server validation | No stock/payment/wallet/source side effect | No success audit on failure | Transaction rollback preserves all counts | P0 | Critical | Existing focused partial |
| SEC-023 | NFR-05/06 numeric boundaries | Overflow/negative/fractional invalid input rejected | Decimal/integer integrity preserved | Validation outcome safe/auditable | Boundary failure leaves row/balance unchanged | P0 | Critical | Existing tests; FAIL QA-027 |
| SEC-024 | TSK-038/040 secure exports | View and download reauthorization plus formula safety | Export contains only scoped/non-sensitive fields | Generation/download audit required | Expired/foreign artifact cannot leak or mutate | P0 | Critical | BLOCKED_NOT_IMPLEMENTED |
| SEC-025 | TSK-027 customer privacy | Purpose-role limits child/consent/financial fields | Foreign profile/tabs cannot be read | Sensitive access must be audited | Denied tab/export is side-effect free | P0 | Critical | BLOCKED_NOT_IMPLEMENTED |
| SEC-026 | TSK-031–036 party settlement | Party and retail activity cannot cross boundaries | Product Wallet untouched by party settlement | Payment/settlement source and actor audited | Mixed line/foreign party failure atomic | P0 | Critical | BLOCKED_NOT_IMPLEMENTED/PARTIAL |
| SEC-027 | TSK-034 asset reservation | Asset state and interval authorization enforced | No overlapping reservations/checkouts | Reservation/state transition audited | Concurrent loser rolls back with conflict | P0 | Critical | BLOCKED_NOT_IMPLEMENTED |
| SEC-028 | TSK-026 offline POS | Signed/device/scope/expiry/replay trust enforced | Accepted sale posts once; rejected posts zero | Sync/conflict outcomes audited | Retry/conflict is explicit and atomic | P0 | Critical | BLOCKED_NOT_IMPLEMENTED |
| SEC-029 | TSK-012/015 imports | MIME/archive/formula/traversal controls enforced | Staging isolated; no pre-approval production mutation | Import/approval/error download audited | Parse or approval failure rolls back batch effects | P0 | Critical | BLOCKED_BY_ENVIRONMENT (QA-006) |
| SEC-030 | TSK-042 production config | Debug/secrets/public storage/TLS controls safe | Production data not exposed in errors/storage | Security-relevant config changes owned/audited | Deployment failure has rollback path | P0 | Critical | BLOCKED_BY_ENVIRONMENT |
| SEC-031 | TSK-042 scheduler/queues | Jobs execute only approved scope and payload | Retries do not duplicate ledger/state effects | Job success/failure/retry observable | Partial job failure rolls back or resumes safely | P0 | Critical | FAIL/BLOCKED (QA-010) |
| SEC-032 | TSK-042/044 backup restore | Backup/restore does not weaken auth or expose secrets | Critical counts/hashes/reconciliation preserved | Restore evidence and owner recorded | Isolated restore and rollback tested | P0 | Critical | BLOCKED_BY_ENVIRONMENT |
| SEC-033 | TSK-043/044 UAT/security review | Human misuse/privacy scenarios find no critical escalation | Reconciliation confirms no unauthorized effects | Evidence, defects, owners, retests, sign-off retained | Critical findings block release until retest | P0 | Critical | BLOCKED_BY_ENVIRONMENT |

## Security execution summary

| Area | Local evidence | Current security status |
|---|---|---|
| Authentication/session | Lifecycle/rate-limit/request-ID tests | PASS_LOCAL/PARTIAL |
| Server-side RBAC | Direct route/action tests | FAIL due to canonical grant drift |
| Branch/store/IDOR | Scope, wallet, attachment foundations | PASS_LOCAL/PARTIAL |
| Attachment/file security | 12 focused tests, 40 assertions | PASS_LOCAL; production storage blocked |
| Safe errors | HTML/JSON 403/404/500/request-ID tests | PASS_LOCAL |
| Audit/immutability | Redaction, append-only, action audit | PASS_LOCAL/PARTIAL |
| Replay/concurrency | Selected tests; changed-payload replay found | FAIL/PARTIAL |
| Imports/exports/reports | Readiness only or dependency blocked | BLOCKED |
| Offline/party/assets/customer mutations | Not implemented | BLOCKED_NOT_IMPLEMENTED |
| Production/DR/UAT | No production-like environment | BLOCKED_BY_ENVIRONMENT |

Final security disposition: **NOT READY FOR PRODUCTION**. The expanded scenarios do not waive requirements; the known RBAC, idempotency, inventory validation, import dependency, scheduler, incomplete-module, production-environment, and UAT blockers remain release blockers.
