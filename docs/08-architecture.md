# 08 — Application Architecture

## Architectural Style

TOY & JOY is one Laravel modular monolith: one repository, runtime, application, database boundary, authentication system, deployment, and asset build. Business modules own their workflows and data access conventions while sharing explicitly defined platform capabilities. Modules are organizational boundaries, not independently deployed services.

The design favors Laravel conventions, cohesive use-case actions, transactions, policies, and server-driven UI. It rejects microservices, headless architecture, GraphQL, a separate frontend, and a separate API for ordinary screens.

## Proposed Module Boundaries

1. **Platform:** company, localization, users, roles, permissions, branches, stores, drawers, payments, tax, numbering, printers, settings.
2. **Catalog:** products, categories, brands, supplier links, barcodes, images, imports.
3. **Pricing:** price lists/versions/lines, approvals, open-price policy, label queues/printing.
4. **Purchasing:** suppliers, orders, invoices/receipts, supplier returns.
5. **Inventory:** balances, immutable movements, transfers, entries/exits/adjustments, counts/reconciliation.
6. **Retail:** POS, suspended carts, sales, payments/evidence, tax/discounts, Gift Receipts, returns/exchanges, Gift Cards.
7. **Cash Control:** drawers, shifts, cash movements, blind close, variance review, closing reports.
8. **Customers:** profile, children/consent, shared loyalty, Product Wallet, Party Wallet, customer history.
9. **Parties:** bookings, working/final invoices, payments on account, operating orders, party consumables.
10. **Assets:** rental asset master, calendar/reservations, checkout/return/inspection, damage/depreciation.
11. **Quotations:** typed non-posting retail/party offers.
12. **Reporting & Governance:** dashboard, alerts, reports, export, audit review, approvals.
13. **Offline:** PWA assets, device eligibility, IndexedDB queue, sync batches/conflicts; restricted to approved POS use.

Cross-module access occurs through clear use-case interfaces/actions and source references, not generic repositories or duplicated business rules. Extract a service only for real shared logic; do not create layers speculatively.

## Request and Use-Case Lifecycle

1. Laravel authenticates the session and resolves user, locale, branch/store/activity context.
2. Route middleware performs broad entry checks; the Livewire component/controller calls a policy/gate for the exact model/action/scope.
3. A Form Request or equivalent Livewire server-validation object validates shape, permissions, business context, and safe file inputs.
4. A focused Action handles a meaningful transactional use case. Simple CRUD remains conventional and does not require an artificial action/service.
5. Financial, stock, ledger, approval, numbering, and state changes run in one database transaction with row/advisory locks or optimistic version checks as appropriate.
6. The action validates the current state, separation rule, idempotency key, and current server price/balance before posting.
7. Source document, lines, ledgers/movements, approvals, attachments, and audit are committed atomically where integrity requires it.
8. UI receives a typed success/error result, refreshes authorized state, preserves user input where safe, and shows clear feedback.

## UI Architecture

### Layouts Inside One Application

- **Auth Layout:** sign-in, forgot/reset password, secure and minimal.
- **Admin Layout:** company, settings, users, roles, branches, global configuration, and high-level governance.
- **Operations Layout:** catalog, purchasing, inventory, customers, parties, assets, quotations, reports, and audit.
- **POS Layout:** dedicated low-overhead checkout/shift shell optimized for scanners, keyboard, touch, large cart/totals, and connectivity awareness.

Blade owns structural layouts, document templates, and stable compositions. Full-page Livewire components own interactive page state and server-driven interactions. Flux UI provides controls and common patterns. Alpine.js or small TypeScript is restricted to scanner events, keyboard shortcuts, browser printing, connectivity, IndexedDB, service-worker messaging, and unavoidable local-device behavior.

### Limited Shared Design Language

- **Typography:** use an approved Arabic/Latin UI font pairing or one high-quality bilingual family; default body 14–16px equivalent, dense table text no smaller than accessible policy allows, clear 4-level heading scale.
- **Spacing:** consistent 4px-based scale; forms and touch targets use comfortable spacing; avoid page-specific arbitrary spacing.
- **Radius:** one small and one medium radius for controls/cards; no decorative inconsistency.
- **Semantic colors:** neutral base plus Success, Warning, Error, Info/Pending, Approved, Cancelled, Draft, and Disabled tokens meeting readable contrast. Never rely on color alone.
- **Reusable patterns:** application shell, sidebar, top navigation, page header, breadcrumbs, filter bar, standard server table, form section, summary card, status badge, confirmation dialog, empty/loading/error/success/denied state, detail view, document timeline, audit panel, printable layout.
- **Forms:** single-column on narrow viewports; clear two-column sections only when related and space permits; bilingual fields grouped and labeled; sticky actions only where they do not hide content.
- **Tables:** responsive priority columns with detail drawer/page rather than uncontrolled horizontal compression; server pagination/filter/sort/search; sticky header where useful.
- **Modals/drawers:** short, contextual actions only; complex document editing uses a full page.
- **Motion:** brief functional state transitions only; respect reduced motion; no ornamental heavy effects.

### Flux UI Reuse

Use Flux components for buttons, form controls, searchable selects/comboboxes, checks/radios/switches, menus/dropdowns, tables/pagination where available, dialogs/modals/drawers, tabs, dates/times/calendars, file inputs, toasts, badges, breadcrumbs, sidebars, headers, tooltips, cards, charts, loading/empty/error states, and confirmations. A custom component is allowed only after documenting the precise requirement Flux cannot satisfy and limiting the extension.

## Vite, Tailwind, and Localization

Vite owns CSS/JavaScript entry points and production hashing. Keep entry points small: common application assets plus POS/offline code only where separation materially improves performance. Tailwind consumes shared semantic tokens and logical-direction utilities; avoid scattered arbitrary values. The UI is Arabic-first and uses localized strings, logical start/end spacing, correct `dir`/`lang`, locale-aware numbers/dates, mirrored directional icons only where semantically appropriate, and English LTR verification.

## Authorization and Security Boundaries

- Laravel sessions with secure cookies, CSRF protection, login rate limiting, session regeneration, configurable expiry, and server-enforced revocation.
- Policies/gates authorize module, action, branch, store, document type, activity, state, ownership, approval/override, and sensitive field. Queries start from authorized scope.
- Cashier cannot see Party Wallet or expected blind-close amounts; Party Manager cannot see Product Wallet; Stock Counter cannot approve reconciliation.
- Attachment access always goes through an authorized controller/action or temporary authorized URL; raw public storage is prohibited for evidence and sensitive files.
- Exports repeat server authorization and exclude unauthorized fields even if the UI hid them.

## State Machines and Approval Workflows

Each document defines an enum and explicit transition map. A transition action validates current state, actor permission, required data, approvals, source references, and side effects. Invalid skipped/backward transitions fail safely. Submitted/approved/final/closed states lock relevant fields. Rejection/return-to-draft behavior is defined per document, not by a generic workflow builder. Approval events are append-only and capture actor, reason, limits, and context.

## Immutable Transactions and Audit

Approved sales, purchases, returns, transfers, adjustments, counts, shifts, payments, wallet/loyalty/gift-card movements, party finals, asset events, approvals, and stock movements are immutable. Correction creates a typed source-linked document/movement. Audit records user, timestamp, session/device where available, branch/store, source, event, reason, and protected before/after values. Audit logging must be inside or reliably coupled to the business transaction; failures cannot silently permit unaudited sensitive operations.

## Inventory Ledger and Weighted-Average Cost

`stock_movements` is the inventory source of truth; `stock_balances` is a locked/materialized current summary. Posting is idempotent and atomic. Approved purchase receipt calculates proposed new average cost as `(existing quantity × existing average cost + received quantity × received unit cost basis) / resulting quantity`, with owner-approved rounding and edge-case rules. It never automatically changes sale price. Transfers preserve accountable source/in-transit/destination quantities and cost context. Count reconciliation uses the reference balance plus subsequent movements and never makes uncounted items zero automatically.

## Customer Value Ledgers

- **Loyalty:** one shared append-only ledger with activity type, rule/version, source, expiry, and idempotency.
- **Product Wallet:** retail-only append-only ledger and policies.
- **Party Wallet:** party-only append-only ledger and policies.
- **Gift Card:** unique card summary locked during use plus append-only issue/redeem/void/expiry ledger.

Balances are derived or transactionally maintained from immutable entries. Corrections are referenced movements. There is no generic cross-wallet transfer service.

## Files, PDF, Excel, Barcodes, and Printing

- Uploads are size/type/signature validated, safely named, protected from public execution, optionally malware-scanned based on infrastructure, hashed, authorized by purpose, and retained by policy.
- Excel import is staged, mapped, validated, previewed, approved, idempotent where possible, and produces safe downloadable rejected-row reports; it never writes invalid rows. Exports neutralize formula injection and obey row/field limits.
- PDF/thermal/A4/label outputs use dedicated Blade print views or an approved mature renderer, snapshot source data, localize direction, and avoid changing documents.
- Barcode generation uses an approved mature capability and always binds label output to selected location and approved price.

## Reporting Strategy

Start with indexed transactional queries and purpose-built read models/query objects where complexity is real. Every report exposes defined formula/source lineage and applies scope before aggregation. Paginate details; cap ranges and export size; queue expensive exports; authorize artifact downloads; expire files. Cache only non-sensitive, correctly keyed aggregates when invalidation and scope are explicit. Never cache one user's unrestricted result for another user.

## Queue, Scheduler, and Cache

Queues may support heavy import/export, PDF batches, label jobs, notifications, image processing, sync processing, backups, and monitoring where user feedback and idempotency are designed. Scheduler may run expiry, alert, reconciliation checks, cleanup, and backups. Exact drivers await Redis/runtime decisions. Synchronous integrity posting for an approved document must not depend on an unreliable later queue. Cache is an optimization after correctness and profiling, not an authority for stock, price, wallet, or loyalty settlement.

## PWA and Offline POS

The service worker caches only the approved application shell and versioned static assets plus narrowly approved reference data. It must not cache arbitrary authenticated HTML or sensitive responses. IndexedDB stores the minimum encrypted-as-supported provisional data needed for eligible devices, with device/user/branch binding, schema version, expiration, and logout/session-revocation cleanup.

Offline eligibility is evaluated before each action. Only cash and manually recorded electronic payments within owner-configured limits are allowed. Credit, wallets, loyalty redemption, special discounts, unpriced/stale/unsafe operations, and conflict-prone actions are blocked. Every local transaction has a non-guessable idempotency key and payload hash. On reconnect, the server reauthenticates, reauthorizes, validates schema/time/policy, recalculates price/stock, assigns final numbering, and either atomically posts, rejects, or creates a conflict. Server stock, price, wallet, and loyalty values prevail. Conflicts require an owner, reason, disposition, and reference documents; no silent overwrite.

## Concurrency Controls

- Lock or atomically increment document sequences.
- Lock/check version on stock balance, price activation, shift/drawer, Gift Card, loyalty/wallet redemption, transfer dispatch/receipt, asset reservation interval, purchase receipt, final party settlement, and sync idempotency.
- Use database uniqueness for item code, barcode, customer phone, document number, Gift Card identifier, active price/location, and source idempotency.
- Return a recoverable conflict message and current server state; never silently accept stale values.

## Backup, Restore, Deployment, and Monitoring

Deployment is one Laravel application with environment-specific secrets, production debug disabled, HTTPS, least-privilege database/storage, controlled migrations, worker/scheduler supervision, versioned assets, health checks, and rollback/recovery instructions. Backups must cover database and required attachments/configuration, be encrypted, retained off-host as approved, monitored, and restore-tested. RPO/RTO, destinations, provider/package, and ownership are blockers. Error monitoring must redact secrets/customer/payment evidence and route actionable alerts to approved owners.

## Package Candidates and Selection Gate

Mature package capability may be appropriate for roles/permissions, activity/audit logs, Excel import/export, PDF, media/attachments, barcode generation, backups, monitoring, charts, and PWA. No name/version is approved in this document. At implementation time, record framework/version compatibility, active maintenance, security history, license, adoption, footprint, queue/storage support, RTL impact, overlap with Laravel/Flux, migration/exit path, and why native capability is insufficient. Choose at most one primary package per capability.

## Future Extensions

Module boundaries and source-document references must allow later web commerce, gateway integration for website customers, quotation conversion, accounting, HR, marketing, and AI without weakening Phase 1 history or separation. Future-ready means preserving extension points, not building unused abstractions now.
