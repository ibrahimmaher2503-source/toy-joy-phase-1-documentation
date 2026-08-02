# AI Handoff

## Current State

TOY & JOY Phase 1 implementation has started. DM 1.1 is In Progress at 10%, overall project progress is 1%, and TSK-001 is the only active task. No task is complete.

The final project directory contains the documentation baseline and a runnable Laravel 13 Livewire starter foundation. It uses Flux UI, Tailwind CSS, Vite, Laravel Fortify authentication, passkeys, two-factor security foundations, SQLite for local development, responsive layouts, and locale-aware RTL/LTR document direction.

## Verified Versions

- PHP 8.4.21
- Laravel 13.23.0
- Livewire 4.3.4
- Flux UI 2.15.0
- Tailwind CSS 4
- Vite 8.2.0
- Node.js 24.15.0

## Completed Foundation Work

- Official Laravel Livewire scaffold created and placed beside the approved documentation.
- Composer dependencies installed in the final project directory.
- npm dependencies installed with a workspace-local npm cache.
- TOY & JOY application identity configured.
- Local application key generated.
- Local SQLite database created and five starter migrations applied.
- Laravel starter branding replaced with a restrained TOY & JOY shell.
- Welcome page and authenticated dashboard foundation created.
- Starter repository and documentation links removed from application navigation.
- Arabic RTL and English LTR direction support added at the root layout level.
- Blade templates compiled and Vite production assets built.

## Verification

Composer validation, package discovery, application key generation, migrations, migration status, Blade compilation, route discovery, environment review, and Vite production build passed. See `.ai/TEST_RESULTS.md` for exact evidence.

No automated tests were created or run. Manual browser verification has not started.

## Local Run

From the project root:

```powershell
php artisan serve
```

The prepared `.env`, SQLite database, dependencies, and built assets are already present. For a fresh environment, follow `README.md`.

## Critical Boundaries

- Work only inside DM 1.1.
- Continue TSK-001; do not mark it complete until all listed deliverables and manual verification are accepted.
- Do not begin DM 1.2.
- Do not create or run automated tests under the current owner directive.
- SQLite is approved only as a local development assumption, not as the production database.
- Do not infer production hosting, backup, monitoring, device, offline POS, authentication, or role policy.
- Preserve retail and party separation and Product Wallet and Party Wallet separation.

## Open Inputs

Read `.ai/BLOCKERS.md`. The immediate blockers are production runtime and hosting, storage and backup, monitoring, devices and browsers, offline POS policy, authentication and session policy, and role scope approval.

## Recommended Next Action

Obtain the BLK-001 and BLK-002 production infrastructure inputs. Then complete the smallest approved TSK-001 slice for production environment conventions, cache/queue/scheduler, protected storage, error monitoring, backup and restore, and runbooks. Keep TSK-002 Not Started until TSK-001 dependency and the authentication policy are ready.

## Required Reading

Read `AGENTS.md` and follow its full required reading order before changing code or documentation. The PRD governs functional behavior. The Implementation Plan governs milestone order, Delivery Criteria, and Phase Gates.
