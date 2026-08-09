ء# Security Test Report

Audit date: 2026-08-08  
Overall security status: **FAIL — unresolved Critical/High risks**

## Verified controls

- Existing authentication lifecycle, authorization enforcement, scope, audit, environment-safety, and safe-error suites were executed as part of the Feature suite.
- Delegated attachment tests passed 12 tests / 40 assertions: private storage, allowlists, size and signature checks, double-extension rejection, traversal-name neutralization, transaction cleanup, scoped authorization, controlled delivery, safe headers, access audit, and append-only protection.
- The focused attachment/environment/error group passed 33 tests / 124 assertions.
- Direct unauthorized paths are covered for several implemented modules, including branch/store scope, inventory, retail, customer settings, readiness screens, and attachment delivery.
- Demo identities are guarded to Local/Dev by existing tests and seed logic. A clean local seed completed successfully.

## Failed controls

| Risk | Result | Evidence / impact |
|---|---|---|
| Canonical RBAC integrity | **FAIL** | 348 seeded permissions versus the approved/documented 276; sensitive/unimplemented grants detected. Least privilege cannot be certified. |
| Conflicting idempotency reuse | **FAIL** | Inventory and retail accept the same key with changed payload. This can hide altered requests and undermines replay protection. |
| Approval expiry authorization | **FAIL** | Authenticated expiry path raises an explicit-authorization exception in the regression suite. |
| Dependency vulnerability | **FAIL** | One High `nanoid` advisory from `npm audit`; Composer audit is blocked because Composer is unavailable and vendor is inconsistent. |
| Import attack surface | **FAIL/BLOCKED** | OpenSpout is absent and the reader API usage is incompatible with the locked major version. Formula/macro/zip-bomb and duplicate-batch behavior cannot be end-to-end verified. |
| Offline trust boundary | **BLOCKED_NOT_IMPLEMENTED** | No offline queue/signature/scope/replay/conflict implementation exists. |
| Full IDOR matrix | **PARTIAL** | Selected direct IDs/routes are denied, but every permission × branch × store × source record combination has not been enumerated. |

## Required production evidence not available

- Production TLS, headers, cookies, secret injection, WAF/rate limits, log redaction, monitoring, and incident response.
- Production database row-lock behavior and race testing.
- Object-storage permissions, malware scanning, retention, legal/privacy review, and recovery.
- Full SAST/dependency scan: PHPStan ran and failed on imports; Enlightn is absent; Composer audit is blocked.
- Human penetration testing and privacy review, particularly customer/child data.

## Security conclusion

Server-side controls exist and the attachment foundation is well covered, but permission drift, replay-integrity failures, dependency/import failures, and missing production/offline controls prevent a production security approval.
