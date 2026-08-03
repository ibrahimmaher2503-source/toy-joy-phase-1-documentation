# AI Handoff

## Current State

TOY & JOY Phase 1 implementation is In Progress. DM 1.1 is active, overall project progress is 1%, TSK-001 baseline work is paused for inputs, and local TSK-002, TSK-003, and TSK-004 slices are implemented under DEC-032. No task is marked complete because manual browser evidence remains pending.

The final project directory contains the documentation baseline and a runnable Laravel 13 Livewire starter foundation with Fortify authentication, passkeys, two-factor security foundations, SQLite local development database, responsive layouts, session-backed locale switching, static PWA manifest/service-worker shell, connectivity indicator, shared Blade UI components, print layout placeholders, and locale-aware RTL/LTR document direction.

## Verified Versions

- PHP 8.3.6
- Laravel 13.23.0
- Livewire 4.3.4
- Flux UI 2.15.0
- Tailwind CSS 4
- Vite 8.2.0
- Node.js 24.x

## Completed Foundation, Auth, Shell & Shared UI Slice Work

- Official Laravel Livewire scaffold created and placed beside the approved documentation.
- Composer and npm dependencies installed.
- Local `.env`, application key, and SQLite database initialized; starter migrations applied.
- Arabic RTL and English LTR document direction supported at root layout level.
- Request correlation middleware (`X-Request-ID`) and bilingual safe 403/404/500/503 error pages implemented.
- System Health screen added at `/admin/system/health`.
- Non-enumerating password reset link response binding registered in `FortifyServiceProvider` (`FailedPasswordResetLinkRequestResponse`) so password reset requests return generic success messages without exposing account existence.
- Registered `/forbidden` route in `routes/web.php` rendering `errors.403` with 403 HTTP status code and correlation ID for UI-SYS-009 Permission Denied.
- Session-backed locale switching (`SetLocale` middleware, `POST /locale` route, `lang/ar.json` and `lang/en.json`) implemented with instant RTL/LTR switching.
- Local PWA manifest (`public/manifest.json`) and static service-worker shell (`public/sw.js`, registered in `resources/js/app.js`) added with strict no-private-cache policy.
- Browser-standard connectivity indicator added to application sidebar, mobile header, POS top bar, and PWA system app page.
- System App Shell screen added at `/system/app` (`UI-SYS-002`) and dedicated POS layout shell added at `/pos` (`UI-OFF-001`).
- Implemented TSK-004 safe local shared UI foundation slice: reusable Blade components (`x-page-header`, `x-state.empty`, `x-state.loading`, `x-state.error`, `x-state.denied`, `x-status.badge`, `x-status.timeline`, `x-audit-panel`), safe shared print CSS (`@media print` in `app.css`), base print layout (`layouts.print`), and authenticated server-gated pattern showcase screen at `/admin/system/ui-showcase` under `@can('view-ui-showcase')` gate.
- Implemented TSK-005 safe local settings baseline slice: SQLite-compatible migrations (`companies`, `payment_methods`, `tax_settings`, `document_sequences`, `printer_configurations`, `settings_audit_logs`), Eloquent models, `SaveLocalSettingsAction` DB transactions with request correlation ID, append-only settings audit trail under DEC-033, and authenticated server-gated System Settings screen at `/admin/settings` (`admin.settings`) under `@can('manage-settings')` gate.
- Implemented TSK-006 safe local branch/store slice: SQLite-compatible migrations (`branches`, `stores`, `branch_selling_stores`), Eloquent models, `SaveBranchAction`, `SaveStoreAction`, `SaveBranchSellingStoreMappingAction`, and Livewire management screens at `/admin/branches` and `/admin/stores` under `@can('manage-branches-stores')` gate.
- Implemented TSK-007 safe local cash drawer baseline slice: SQLite-compatible migration (`cash_drawers`), `CashDrawer` Eloquent model, `SaveCashDrawerAction`, and Livewire management screen at `/admin/cash-drawers` under `@can('manage-branches-stores')` gate.

## Verification

Allowed diagnostics passed: PHP lint (`php -l`), `php artisan migrate --force`, `php artisan migrate:status`, `php artisan route:list`, `php artisan config:clear`, `php artisan view:cache`, `npx vite build`, `git diff --check`, and HTTP curl checks for `/manifest.json`, `/sw.js`, `/pos`, `/system/app`, `/forbidden`, `/login`, `/forgot-password`, `/admin/system/ui-showcase`, `/admin/settings`, `/admin/branches`, `/admin/stores`, and `/admin/cash-drawers` (302 redirecting to `/login` with `X-Request-ID`).

Manual browser verification is partial: Firefox visually verified `/login`, `/forgot-password`, and `/forbidden` without credential entry. Password reset submission, login/session regeneration, logout, profile/security updates, POS layout rendering, locale switching, shared UI pattern showcase interactive testing, print layout previews, system settings form updates, branch/store/drawer operations, and full RTL/LTR comparison remain pending.

## Local Run

From the project root:

```powershell
php artisan serve
```

## Critical Boundaries

- Do not start TSK-008 or later tasks.
- Do not mark TSK-002 through TSK-007 complete without manual authenticated browser evidence.
- Do not create or run automated tests under the current owner directive.
- Keep branch/store/drawer/tax/payment/currency/numbering policy as explicit local TBD values without inventing production policies.

## Recommended Next Action

Perform full manual browser verification for TSK-002 through TSK-007 scenarios (login, password reset, session regeneration/logout, profile update, POS layout, PWA shell info, UI pattern showcase, system settings updates, branch/store/drawer updates, RTL/LTR layout check), obtain BLK-001/002/005/006/007/008 owner inputs, and prepare for DM 1.3 users/roles/permissions work when authorized.


## Required Reading

Read `AGENTS.md` and follow its full required reading order before changing code or documentation. The PRD governs functional behavior. The Implementation Plan governs milestone order, Delivery Criteria, and Phase Gates.
