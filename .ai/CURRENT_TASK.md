# Active Task: TSK-008 explicitly authorized local-only reversible baseline

Repository: /home/ubuntu/projects/toy-joy-phase-1-documentation. The owner explicitly approved: local-only reversible TSK-008 slice, without production roles, permissions, or grants; BLK-007 and DM 1.3 remain open.

Read AGENTS.md, README.md, PRODUCT.md, TASKS.md, all docs/ and .ai/ files before editing. Inspect actual current diff and preserve TSK-005/006/007.

Implement ONLY the smallest safe local baseline:
- SQLite-compatible schema/models for roles, permissions, role/user/permission pivots, and user branch/store scopes only if required to make an empty review screen structurally demonstrable. Use no seed rows and no grants.
- A protected full-page Livewire/Flux admin screen at `/admin/authorization-baseline` that shows current users only as an inventory and empty/TBD panels for roles, permissions, scopes, approval limits, and matrix. It must clearly say no authorization behavior is active and owner sign-off is required.
- Server gate may only be the existing local super-admin gate for viewing this development screen; it must not authorize business capabilities or grant permissions.
- No role creation, permission assignment, grant/revoke, scope mutation, package installation, policy engine, or production authorization behavior.
- Include loading/empty/error/denied states, Arabic RTL/LTR, pagination for users, and no secrets/passwords.
- Add a decision/tracking note for this explicit owner authorization while keeping BLK-007 and DM 1.3 open.

Forbidden: production role names/grants, seed users/roles/permissions, changes to existing auth semantics, automated tests, dependencies, commit/push. Do not alter TSK-005/006/007 behavior except minimal route/sidebar for this screen.

Run allowed PHP lint, migrations/status, route list, view cache, Vite build, git diff --check, and guest HTTP protection. Report actual files and do not claim authenticated verification.
