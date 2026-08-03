# Current Milestone

**Current phase:** Phase 1, Foundation, Access and Operational Controls  
**Current milestone:** DM 1.1, Platform Foundation  
**Status:** In Progress  
**Progress:** 10%  
**Started:** 2026-08-02

## Active Scope

TSK-001 is In Progress. The Laravel application foundation, local environment, authentication starter, responsive shell, direction-aware layouts, SQLite development database, and asset pipeline are present. Production infrastructure, backup, monitoring, audit, PWA/offline decisions, and the complete DM 1.1 shell and security acceptance remain open.

Do not begin DM 1.2 or later milestones.

## Related Requirements

MD-01, NFR-01, NFR-02, NFR-03, NFR-04, NFR-05, NFR-06, and NFR-07.

## Verified Local Baseline

- PHP 8.4.21 and Laravel 13.23.0
- Livewire 4.3.4 and Flux UI 2.15.0
- Tailwind CSS 4 and Vite 8
- SQLite local development database with five starter migrations applied
- Laravel Fortify authentication, passkey, two-factor, account, and appearance foundations
- Locale-aware `lang` and `dir` attributes for Arabic RTL and English LTR
- Production frontend assets built successfully

SQLite is a local implementation choice only. It does not approve the production database.

## Required Owner Inputs

- Production hosting, domain, database engine/version, deployment topology, SSL, cache, Redis, queue, and scheduler
- Attachment/object storage, retention, backup destination, RPO/RTO, encryption, and restore owner
- Error monitoring, log retention, alerts, and production support ownership
- Supported browsers, POS devices, scanners, cameras, printers, and connectivity profile
- Offline POS scope, limits, security, retention, retry, and conflict policy
- Authentication, password, MFA, verification, lockout, and session policy
- Approved role and scope matrix

## Remaining DM 1.1 Deliverables

- Complete production-safe environment and secret conventions
- Decide and implement queue, scheduler, cache, storage, backup, monitoring, and restore foundations
- Complete approved authentication and session behavior
- Complete Auth, Admin, Operations, and restricted POS/PWA shell requirements
- Establish approved shared operational UI, printing, error, access-denied, audit, and status patterns
- Perform required manual browser, responsive RTL/LTR, security, and backup/restore verification

## Verification Completed

- Composer manifest validation
- Laravel package discovery
- Application key generation
- SQLite migration execution and status review
- Blade template compilation
- Route discovery
- Vite production build

No automated tests were created or run. Manual browser verification has not started.

## Exit Criteria

- TSK-001 through TSK-004 are complete under `docs/13-definition-of-done.md`.
- Platform foundation is demonstrated on approved environments and devices.
- Backup/restore and baseline security evidence is recorded.
- Critical defects are closed and owner inputs or accepted exceptions are recorded.
- DM 1.1 handoff is current and advancement to DM 1.2 is explicitly approved.

## Next Action

Continue TSK-001 by resolving production infrastructure inputs and implementing only the approved platform services. TSK-007 local cash drawer baseline slice is implemented under DEC-035; BLK-006 remains open for production master data and DM 1.2 completion.
