# TOY & JOY Mandatory Agent Instructions

This file governs every AI coding agent working on TOY & JOY Phase 1. The repository contains the documentation baseline and a Laravel 13 application foundation. DM 1.1 is In Progress, TSK-001 is the only active task, and overall implementation progress is 1%.

## Current Implementation Baseline

- PHP 8.4.21 and Laravel 13.23.0
- Livewire 4.3.4, Flux UI 2.15.0, Tailwind CSS 4, and Vite 8
- Laravel Fortify authentication with passkey and two-factor foundations from the official starter
- SQLite for local development only; the production database remains an owner decision
- Responsive application and authentication shells with locale-aware Arabic RTL and English LTR direction
- Automated tests remain Not Created and Not Run by explicit project-owner directive

Inspect `.ai/CURRENT_MILESTONE.md`, `.ai/PROGRESS.md`, and `.ai/TEST_RESULTS.md` for the exact current state before making any change.

## Required Reading Order

Before changing code or documentation, read these files completely and in order:

1. `AGENTS.md`
2. `README.md`
3. `docs/01-project-brief.md`
4. `docs/02-prd.md`
5. `docs/03-scope.md`
6. `docs/04-roles-permissions.md`
7. `docs/05-user-stories.md`
8. `docs/06-user-flows.md`
9. `docs/07-database-schema.md`
10. `docs/08-architecture.md`
11. `docs/09-coding-standards.md`
12. `docs/10-milestones.md`
13. `docs/11-master-checklist.md`
14. `docs/12-acceptance-criteria.md`
15. `docs/13-definition-of-done.md`
16. `docs/14-test-plan.md`
17. `docs/15-security-checklist.md`
18. `.ai/CURRENT_MILESTONE.md`
19. `.ai/PROGRESS.md`
20. `.ai/BLOCKERS.md`
21. `.ai/DECISIONS.md`
22. `.ai/UI_SCREENS.md`
23. `.ai/HANDOFF.md`
24. `.ai/TEST_RESULTS.md`
25. `TASKS.md`

The PRD is authoritative for functional behavior. The Implementation Plan is authoritative for Development Milestone order, Delivery Criteria, and Phase Gates. Never resolve a conflict silently; record it in `.ai/DECISIONS.md` with status `Requires Owner Decision`.

## Mandatory Technology Direction

- One Laravel modular-monolith repository and one deployment.
- PHP and Laravel on the backend; Laravel sessions, Form Requests, policies, gates, transactions, queues, and scheduler where justified.
- Blade layouts and templates; full-page Livewire components for interactive screens.
- Flux UI components first, Tailwind CSS for styling, Alpine.js only for small browser behaviors, and Vite for assets.
- Browser-based Arabic-first application with full RTL and English LTR support; restricted POS continuity as a PWA.
- Admin, Operations, POS, and Auth layouts remain inside the same Laravel application.

Do not adopt Filament, Inertia.js, Vue, React, Angular, Next.js, Nuxt, a separate frontend, a separate ordinary-screen API, GraphQL, a full SPA, headless architecture, or microservices.

## Working Rules

- Inspect the entire repository before concluding that a feature is absent.
- Work on only the current milestone and its linked tasks. Do not advance before its Delivery Criteria and Phase Gate are satisfied.
- Preserve every Requirement ID and business rule. Do not delete, merge away, or silently change a requirement.
- Record missing facts as assumptions, open decisions, or blockers with impact and affected milestones.
- Deliver the smallest reviewable vertical slice with a complete UI. A backend-only business feature or placeholder UI is not complete.
- Use Laravel conventions. Do not add repository patterns, generic services, base classes, traits, internal packages, event-driven architecture, or generalized workflow/form/table builders without a documented need.
- Apply authorization on the server through policies and gates; hiding a control is not authorization.
- Use database transactions for financial, inventory, wallet, loyalty, gift-card, shift, and document-approval operations. Use row locks or equivalent concurrency control where races can corrupt results.
- Approved documents are immutable. Correct them through referenced reversal, return, cancellation, or adjustment documents. Use logical deletion only where permitted.
- Keep retail products and party services/assets out of the same order or invoice. Keep Product Wallet and Party Wallet ledgers, visibility, settlement, and reporting separate.
- Never claim implementation, verification, or testing that did not occur. Update `.ai/` status files after every task.

## Reuse Before Custom Build

Do not build from scratch when Laravel, Flux UI, or an approved mature package provides the capability. This applies to authentication, password reset, email verification, roles/permissions, audit logging, Excel import/export, PDF generation, barcodes, backups, media handling, uploads, tables, pagination, filtering, sorting, date/time pickers, searchable selects, modals, drawers, toasts, alerts, charts, sidebar, breadcrumbs, form controls, loading states, and empty states.

If a standard component cannot meet a documented requirement, record why, implement the smallest extension, and do not create an internal UI library. Package names and versions require compatibility and maintenance review at implementation time and a decision-log entry.

## UI Rules

- Reuse the common application shell, navigation, page header, breadcrumbs, filters, data table, form sections, summary cards, status badges, dialogs, state panels, details, status timeline, audit panel, and print layouts.
- Every relevant screen must handle default, loading, empty, error, success, disabled, permission-denied, validation, confirmation, and unsaved-change states.
- Large tables use server-side pagination, filtering, sorting, indexed search, eager loading, and clear row actions; never load an unbounded dataset into the browser.
- Forms use logical sections, explicit bilingual fields, server validation, inline errors, required indicators, duplicate-submission protection, and confirmations for sensitive actions.
- All screens must be responsive and support Arabic RTL and English LTR. Printed documents must be verified in every required format.
- POS is a dedicated, fast, barcode-first, keyboard- and touch-friendly Livewire interface. It must preserve cart content on errors and display branch, selling store, drawer, shift, totals, and connectivity status.
- Alpine.js or small TypeScript may be used only for barcode events, shortcuts, print handling, IndexedDB, service worker, offline queue, connectivity detection, and local device integration.

## Automated Testing Directive

Automated tests are currently deferred by explicit project-owner directive. No automated test code shall be created or executed unless a new explicit instruction changes this policy.

- Do not create PHPUnit, Pest, unit, feature, integration, browser, end-to-end, Playwright, or Cypress tests.
- Do not run `php artisan test`, Pest, PHPUnit, Playwright, Cypress, or any automated suite.
- Automated tests are not a Definition of Done condition under the current directive.
- During future implementation, perform scenario-based manual browser verification, permission checks, data-integrity checks, print checks, responsive/RTL/LTR checks, backup/restore checks, and UAT as specified in `docs/14-test-plan.md`.
- Record only actual results in `.ai/TEST_RESULTS.md`.

## Required Task Closure

For each implementation task: confirm linked requirements and acceptance criteria, complete all listed UI states, apply validation and server authorization, review audit and concurrency requirements, perform the prescribed manual verification, update documentation and `.ai/` files, and leave no unresolved critical blocker.
