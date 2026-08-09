# TOY & JOY Phase 1 Screen Surface and Navigation Inventory

**Audit date:** 2026-08-09  
**Scope:** Product information architecture, routes, screen responsibility, permissions, and implementation state  
**Primary priority:** TSK-009, Approval, Audit, Attachment, and Immutability Foundations  
**Repository status:** Existing worktree changes were preserved. This report does not claim production readiness.

## Executive summary

The application contains real local/dev slices for Platform, Catalog, Suppliers, Purchasing, Pricing, Inventory, POS, and Shifts. It also contains several readiness-only boundaries for Customers, Loyalty, Gift Cards, Returns, Parties, Rental Assets, Quotations, Reports, Exports, Alerts, and Offline POS.

The target navigation tree is broader than the current application. Several current labels reuse an operational page, a broad workspace, or a readiness page. Those mappings are recorded as incorrect rather than treated as completion.

TSK-009 is recorded as:

`READINESS_COMPLETE / PARTIALLY_IMPLEMENTED`

Its reusable Platform foundations include audit recording, approval records, protected attachment primitives, scoped policies, redaction, and immutability contracts. The remaining functional gaps are central approval inbox integration, source-document integration, business-model immutability enforcement, referenced corrections, shared evidence integration, numbering ownership, audit export/print, and complete browser/UAT evidence.

## State definitions

| State | Meaning |
|---|---|
| `EXISTS_AND_FUNCTIONAL` | A real route and business capability exist for the requested responsibility. |
| `EXISTS_BUT_PARTIAL` | A real implementation exists, but required behavior, integration, or verification is incomplete. |
| `EXISTS_BUT_WRONG` | A route exists, but it represents a different business responsibility. |
| `READINESS_ONLY` | The page records a boundary, dependency, or pending policy without implementing the business capability. |
| `ROUTE_ALIAS_ONLY` | The route is only a broad workspace, filtered reuse, or embedded view. |
| `MULTIPLE_ITEMS_SHARE_WRONG_PAGE` | Multiple unrelated destinations reuse the same incorrect page. |
| `MISSING` | No real route or business capability exists. |

## Evidence and source documents

- [AGENTS.md](../../AGENTS.md)
- [AI_INDEX.md](../../AI_INDEX.md)
- [.ai/UI_SCREENS.md](../../.ai/UI_SCREENS.md)
- [Current implementation gap matrix](IMPLEMENTATION-GAP-MATRIX.md)
- [Production closure matrix](PRODUCTION-CLOSURE-MATRIX.md)
- [docs/37-ui-screen-specifications.md](../../docs/37-ui-screen-specifications.md)
- [docs/20-ui-ux-design-system.md](../../docs/20-ui-ux-design-system.md)
- [docs/35-document-state-machines.md](../../docs/35-document-state-machines.md)
- [docs/36-module-data-contracts.md](../../docs/36-module-data-contracts.md)
- [docs/38-print-export-specification.md](../../docs/38-print-export-specification.md)
- [Current sidebar](../../resources/views/layouts/app/sidebar.blade.php)

The inventory is based on route inspection, current views and route-backed Livewire pages, module actions/models/policies, the registered UI screen specifications, and the documented PRD traceability. No unsupported page was treated as implemented merely because a sidebar label exists.

## Current implementation summary

| Area | Current state | Main implementation surface |
|---|---|---|
| Platform settings and authorization | `EXISTS_BUT_PARTIAL` | `routes/platform.php`, Platform actions, policies, settings and audit views |
| Audit persistence and audit screen | `EXISTS_BUT_PARTIAL` | `AuditLog`, `RecordAuditEvent`, `AuditLogPolicy`, `platform/system/audit-log` |
| Approval records | `EXISTS_BUT_PARTIAL` | `ApprovalRecord`, request/decision actions, approval policy, source integrations |
| Approval inbox | `MISSING` or local unlinked view | `platform/system/approval-inbox.blade.php` exists in the worktree, but a complete `/approvals` route and source-aware inbox are not established |
| Attachments | `EXISTS_BUT_PARTIAL` | Private storage, validation, protected delivery, access logging, product-media integration |
| Immutability and corrections | `READINESS_ONLY` | Contracts, guards, DTOs, and correction action exist, but business models/actions are not uniformly wired |
| Numbering | `EXISTS_BUT_PARTIAL` | Multiple module allocators and `document_sequences`; no single Platform-owned consumer boundary |
| Catalog | `EXISTS_BUT_PARTIAL` | Anonymous full-page Livewire product, category, brand, supplier and import screens |
| Purchasing | `EXISTS_BUT_PARTIAL` | Full-page Livewire orders, invoices, imports and supplier-return screens |
| Pricing | `EXISTS_BUT_PARTIAL` | `pricing::index`, pricing actions, proposal/history sections, labels readiness |
| Inventory | `EXISTS_BUT_PARTIAL` | Shared inventory renderer plus transfer, adjustment and count actions |
| POS and Sales | `EXISTS_BUT_PARTIAL` | POS, suspended sales, sales list/detail/print, payment and discount foundations |
| Shifts and cash | `EXISTS_BUT_PARTIAL` | Shift opening, movement, blind close and variance-review actions/pages |
| Customers, Parties, Assets, Quotations | `READINESS_ONLY` or `MISSING` | Readiness pages and wallet ledger foundations; no complete source domains |
| Reports, Alerts, Exports, Offline | `READINESS_ONLY` | Readiness pages and static/platform foundations without executable business surfaces |

## Target navigation inventory

The following tables use the requested columns. Page names grouped in one row are all explicit target destinations with the same current route/state and remediation. They are not considered one completed page.

### Workspace

| Group | Page | Route | Permission | PRD IDs | Current State | Problem | Action Required |
|---|---|---|---|---|---|---|---|
| Workspace | Dashboard | `dashboard` | `dashboard_reports.view` | RPT-01, US-031, UI-RPT-001 | `EXISTS_BUT_PARTIAL` | Local dashboard is not the complete KPI/report dashboard | Implement approved KPI queries, scope, filters, and states |
| Workspace | My Tasks | Missing | `tasks.view` | Platform workflow, US-046 | `MISSING` | No task inbox | Add real owned-task source and actions |
| Workspace | Pending Approvals | `pricing.approvals` | `approvals.view`, resource approve | SEC-015 | `EXISTS_BUT_WRONG` | Pricing workspace is used as generic approvals | Add a source-aware approval inbox |
| Workspace | Operational Alerts | `alerts.readiness` | `alerts.view` | RPT-03, US-031 | `READINESS_ONLY` | No alert records or acknowledgement workflow | Implement generated alerts, acknowledgement, escalation and audit |
| Workspace | Report Center | `reports.readiness` | `dashboard_reports.view` | RPT-01 to RPT-03, UI-RPT-001 | `READINESS_ONLY` | No report catalog or executable query surface | Implement authorized reports and export jobs |

### Sales & POS

| Group | Page | Route | Permission | PRD IDs | Current State | Problem | Action Required |
|---|---|---|---|---|---|---|---|
| Sales & POS | POS | `pos` | `pos_sales.view`, `pos_sales.create` | POS-01 to POS-06, PRC-07/08, UI-POS-001 | `EXISTS_BUT_PARTIAL` | Real checkout slice, but financial UI and evidence flows remain incomplete | Finish payment, evidence, tax, discounts, open price, rounding, receipts and reconciliation |
| Sales & POS | Sales; Sales Invoices | `sales.index`, `sales/{sale}` | `pos_sales.view`, print | POS-01 to POS-06, UI-POS-006/007 | `EXISTS_BUT_PARTIAL` | Sales and invoice responsibility is combined | Separate the user-facing responsibilities while reusing source services |
| Sales & POS | Suspended Sales | `pos.suspended` | `suspended_sales.view`, edit | POS-02, UI-POS-002 | `EXISTS_BUT_PARTIAL` | Resume, expiry and conflict behavior need completion | Finish lifecycle and audit behavior |
| Sales & POS | Payments | `pos.financial-readiness` | `payments.view`, create, reverse | POS-03 to POS-06, UI-POS-001/007 | `READINESS_ONLY` | No payment ledger destination | Implement payment records, reversals and reconciliation |
| Sales & POS | Payment Evidence | Missing | `payment_evidence.view`, create | POS-04, SEC-022 to SEC-024 | `MISSING` | Shared attachment boundary is not used for payment evidence | Add protected evidence upload, review, redaction and access audit |
| Sales & POS | Gift Receipts | `gift.receipts` | gift instrument view/print | POS-07, RET-03, UI-POS-010 | `READINESS_ONLY` | No gift receipt document flow | Implement source-linked gift receipt and print |
| Sales & POS | Returns & Exchanges | `returns.readiness` | returns view/create | RET-01 to RET-03, UI-POS-008/009 | `READINESS_ONLY` | No return or exchange operation | Implement state-safe source-linked reversal/refund/exchange |
| Sales & POS | Gift Cards | `gift.cards` | gift instrument view/create | POS-07, UI-POS-011 | `READINESS_ONLY` | No gift-card identity, ledger, issue or redemption | Implement gift-card state and ledger |
| Sales & POS | POS Activity Log | `admin.audit` | `audit_logs.view` | SEC-027, UI-AUD-001 | `EXISTS_BUT_WRONG` | Generic audit view is not a POS activity projection | Add POS-specific filtered activity view |

### Cash Drawers & Shifts

| Group | Page | Route | Permission | PRD IDs | Current State | Problem | Action Required |
|---|---|---|---|---|---|---|---|
| Cash Drawers & Shifts | My Current Shift; Open Shift; Shift Closing | `pos.shift` | `shifts_cash_movements.view`, create, close | CSH-01 to CSH-03, UI-POS-003/004 | `EXISTS_BUT_PARTIAL` | Real actions are combined in one page | Complete state handling, count capture, close submission and receipt |
| Cash Drawers & Shifts | Shifts | Missing | `shifts_cash_movements.view` | CSH-01 to CSH-04 | `MISSING` | No shift history/index | Add paginated shift history and filters |
| Cash Drawers & Shifts | Cash Drawers | `admin.cash-drawers` | drawer view/edit | CSH-01, UI-ADM | `EXISTS_BUT_PARTIAL` | Configuration view is not operational drawer activity | Add assignment, status, balance and activity views |
| Cash Drawers & Shifts | Cash Movements | `pos.shift` | movement create/view | CSH-02 | `ROUTE_ALIAS_ONLY` | Movement history is not a distinct destination | Add movement ledger and source links |
| Cash Drawers & Shifts | Shift Variance Review | `pos.shift-variance` | shift approve | CSH-04, UI-POS-005 | `EXISTS_BUT_PARTIAL` | Review action exists, but full separation and correction flow remain | Complete approve/reject/reason/audit behavior |
| Cash Drawers & Shifts | Daily Closing; Cash & Shift Reports | Missing | `dashboard_reports.view`, export | CSH-03/04, RPT-01 | `MISSING` | No daily closing or report surface | Implement reconciliation queries and print/export |

### Customers

| Group | Page | Route | Permission | PRD IDs | Current State | Problem | Action Required |
|---|---|---|---|---|---|---|---|
| Customers | Customers; Create Customer; Children; Child Details | Missing | customer view/create/edit | MD-06, CUS-01, US-003, UI-CUS-001/002 | `MISSING` | No customer or child domain | Implement master records, sensitive fields and consent |
| Customers | Purchase History; Party History; Payment History; Return History; Gift Card History | `sales.index` only for transaction history | customer history plus source permissions | CUS-01/03, RET-01/03, UI-CUS-002 | `EXISTS_BUT_WRONG` | Sales page is reused instead of customer-linked history | Add customer-scoped projections and filters |
| Customers | Loyalty Points; Loyalty Movements | `customers.loyalty-readiness` | loyalty view/adjust | CUS-03/04, US-023, UI-CUS-003 | `READINESS_ONLY` | Readiness/settings page is not a ledger | Implement append-only loyalty ledger and settings enforcement |
| Customers | Product Wallet; Product Wallet Movements | `wallets.product` | product wallet view/adjust/settle | CUS-02, UI-CUS-004 | `EXISTS_BUT_PARTIAL` | Separate ledger foundation exists, but no complete balance/mutation flow | Implement holder, balances, movements, policy and reconciliation |
| Customers | Party Wallet; Party Wallet Movements | `wallets.party` | party wallet view/adjust/settle | CUS-02, UI-CUS-005 | `EXISTS_BUT_PARTIAL` | Separate foundation exists, but settlement is missing | Implement party-specific settlement and movements |
| Customers | Consent & Privacy; Duplicate Customer Review / Merge | Missing | customer edit/merge | MD-06, SEC-016/017 | `MISSING` | No consent history, duplicate review or merge operation | Implement versioned privacy and reviewed merge workflow |

### Catalog

| Group | Page | Route | Permission | PRD IDs | Current State | Problem | Action Required |
|---|---|---|---|---|---|---|---|
| Catalog | Products; Create Product | `catalog.products`, `catalog.products.create` | catalog view/create/edit | MD-02 to MD-05, US-002, UI-CAT-001/002 | `EXISTS_BUT_PARTIAL` | Real product CRUD exists, but production configuration and downstream completeness remain | Complete lifecycle, media, UOM and type-specific rules |
| Catalog | Product Excel Import; Import Batches; Import Errors | `catalog.products.import` | catalog import/export | PRC-01, US-004, FLW-CAT-02, UI-CAT-004/005 | `EXISTS_BUT_PARTIAL` | Staging and error handling exist, but batch operations and shared attachment use need completion | Add batch history, protected artifacts, retry and audit |
| Catalog | Categories; Subcategories | `catalog.categories` | catalog view/create/edit/delete | MD-03, UI-CAT-006 | `EXISTS_BUT_PARTIAL` | Category screen exists; subcategory responsibility is not distinct | Add hierarchy management |
| Catalog | Brands | `catalog.brands` | catalog view/create/edit/delete | MD-03, UI-CAT-007 | `EXISTS_BUT_PARTIAL` | Real local slice | Complete lifecycle and production configuration |
| Catalog | Units of Measure | Missing | catalog view/create/edit | MD-04 | `MISSING` | No UOM management | Implement approved UOM model and rules |
| Catalog | Product Types: Standard, Composite, Service | Product form/detail only | catalog view/edit | MD-04/05, PRC-02 | `EXISTS_BUT_PARTIAL` | Type fields exist, but composite/service business behavior is incomplete | Implement type-specific validation and stock/service behavior |
| Catalog | Product Attributes: Colors, Sizes, Characters, Ages | Product form/detail only | catalog view/edit | MD-05, PRC-02 | `EXISTS_BUT_PARTIAL` | Attributes are embedded fields, not governed values | Implement controlled attribute masters |
| Catalog | Barcodes; Product Media; Inactive Products | Product detail/list filters | catalog edit/view | MD-05, SEC-022 to SEC-024 | `EXISTS_BUT_PARTIAL` | Embedded views lack dedicated history and lifecycle surfaces | Add barcode/media history and inactive-product actions |

### Pricing

| Group | Page | Route | Permission | PRD IDs | Current State | Problem | Action Required |
|---|---|---|---|---|---|---|---|
| Pricing | Pricing Workspace | `pricing.index` | pricing view/create/edit | PRC-03 to PRC-05/07/08, UI-PRC-001 | `EXISTS_BUT_PARTIAL` | Real proposal/history/unpriced sections exist | Complete workflow and split responsibilities through correct inner routes |
| Pricing | Price Lists; Price Proposals; Price Versions; Price Change History; Unpriced Products | `pricing.index` | pricing view/create/edit | PRC-03 to PRC-05/07 | `MULTIPLE_ITEMS_SHARE_WRONG_PAGE` | Several distinct destinations reuse the full pricing workspace | Add specific filtered destinations and actions |
| Pricing | Price Approvals | `pricing.approvals` | pricing approve | PRC-04, SEC-015 | `EXISTS_BUT_WRONG` | Same page as pricing workspace | Add approval-specific inbox and maker/checker behavior |
| Pricing | Branch Prices; Branch Price Exceptions | `pricing.index` | pricing view/override | PRC-05, UI-PRC-002 | `ROUTE_ALIAS_ONLY` | Branch pricing is embedded, not a distinct surface | Add scoped branch price and exception views |
| Pricing | Open Price; Price Override History | POS/pricing workspace | pricing override | PRC-07/08 | `EXISTS_BUT_PARTIAL` | Provenance foundation exists, but checkout wiring and history destination are incomplete | Enforce configured policy and audited history |
| Pricing | Labels & Barcodes; Label Queue; Print Labels; Reprint; Print History | `pricing.labels` | labels view/print/reprint | PRC-06/07, UI-PRC-003 | `READINESS_ONLY` | Queue and printing are disabled | Implement queue, printer, reprint and print audit |

### Suppliers & Purchasing

| Group | Page | Route | Permission | PRD IDs | Current State | Problem | Action Required |
|---|---|---|---|---|---|---|---|
| Suppliers & Purchasing | Suppliers | `catalog.suppliers` | suppliers view/create/edit | PUR-01/02, US-009, UI-CAT-008 | `EXISTS_BUT_PARTIAL` | Real supplier master exists | Complete production owner/data and history behavior |
| Suppliers & Purchasing | Product-Supplier Links; Preferred Suppliers; Supplier Price History | `catalog.suppliers` | suppliers view/edit | PUR-02 | `ROUTE_ALIAS_ONLY` | Link/history sections are not separate destinations | Add link, preferred and source-linked history views |
| Suppliers & Purchasing | Purchase Orders; Open Purchase Orders | `purchasing.orders` | PO view/create/edit/approve/cancel | PUR-03, US-010, UI-PUR-001 | `EXISTS_BUT_PARTIAL` | Real local lifecycle, downstream receipt integration pending | Complete receiving linkage and production/UAT evidence |
| Suppliers & Purchasing | Partial Receipts; Goods Receipt | `purchasing.invoices.readiness` | receiving create/approve | PUR-05, UI-INV-002/003 | `READINESS_ONLY` | Receiving remains a readiness boundary | Implement receipt documents, quantities, differences and stock posting |
| Suppliers & Purchasing | Purchase Invoices; Create Purchase Invoice | `purchasing.invoices` | invoice view/create/edit/approve/reverse | PUR-04/05, US-011, UI-PUR-002 | `EXISTS_BUT_PARTIAL` | Real invoice lifecycle exists, but full downstream reconciliation is incomplete | Complete source, ledger and production configuration |
| Suppliers & Purchasing | Purchase Invoice Excel Import; Import Batches | `purchasing.invoices.import` | invoice import | PUR-04, UI-INV-003 | `EXISTS_BUT_PARTIAL` | Staged import exists; batch management remains incomplete | Add batch index, retry, correction and audit |
| Suppliers & Purchasing | Supplier Returns; Supplier Return Reasons | `purchasing.returns`, settings | returns view/create/approve/print | PUR-06, US-012, UI-PUR-003 | `EXISTS_BUT_PARTIAL` | Local return flow exists; rejection/approval synchronization and release evidence remain open | Synchronize source and ApprovalRecord atomically |
| Suppliers & Purchasing | Supplier Purchase History; Purchasing Reports | Invoice list or PO route | supplier/report permissions | PUR-01 to PUR-06, RPT-02 | `EXISTS_BUT_WRONG` | Operational pages are reused as history/reports | Add supplier-scoped history and report destinations |

### Inventory

| Group | Page | Route | Permission | PRD IDs | Current State | Problem | Action Required |
|---|---|---|---|---|---|---|---|
| Inventory | Inventory Control Center; Stock Balances | `inventory.index` | inventory view | INV-01/02, US-013, UI-INV-001 | `MULTIPLE_ITEMS_SHARE_WRONG_PAGE` | Same broad renderer handles distinct destinations | Add proper control-center and balance views with pagination |
| Inventory | Available Stock; In Transit; Reserved | inventory/transfer views | inventory/transfers view | INV-01/03 | `ROUTE_ALIAS_ONLY` | Derived sections are not independent scopes | Add stock-state projections and reconciliation |
| Inventory | Stock Card | `inventory.stock-card` | inventory view | INV-02, UI-INV-002 | `EXISTS_BUT_PARTIAL` | Route exists but uses shared inventory renderer | Complete product-scoped card, source links, filters and pagination |
| Inventory | Stock Movement Ledger | `inventory.movements` | inventory view | INV-02/04, UI-INV-003 | `EXISTS_BUT_PARTIAL` | Append-only data exists, but view is limited | Add full filters, pagination and export |
| Inventory | Low Stock; Out of Stock; Reorder | inventory overview | inventory view/create | INV-01, RPT-02 | `ROUTE_ALIAS_ONLY` | No dedicated policy-driven views or reorder action | Implement approved thresholds and actions |
| Inventory | Transfers: Create Transfer, Sent Transfers, In Transit, Receipts, Difference Review | `inventory.transfers` and actions | transfer view/create/dispatch/receive | INV-03, US-014, UI-INV-004 to UI-INV-007 | `EXISTS_BUT_PARTIAL` | Real actions exist, but user-facing views are combined | Add transfer states, receipt and difference review destinations |
| Inventory | Stock Operations: Stock Entry, Stock Exit, Adjustment, Negative Stock Overrides | `inventory.adjustments` | adjustment create/approve/override | INV-04 to INV-06, US-015, UI-INV-011 | `EXISTS_BUT_PARTIAL` | Adjustment foundation exists; entry/exit and override responsibilities are not distinct | Implement separate state-safe workflows and approvals |
| Inventory | Stock Counts: Count Sessions, Full Count, Partial Count, Count Entry, Recount, Count Differences, Uncounted Items, Adjustment Approval | `inventory.counts`, entry, reconcile | stock-count view/create/submit/approve | INV-07 to INV-09, US-016, UI-INV-008 to UI-INV-010 | `EXISTS_BUT_PARTIAL` | Count/reconcile foundation exists, but target views and complete states are missing | Add session/detail/recount/difference/approval surfaces |

### Parties

| Group | Page | Route | Permission | PRD IDs | Current State | Problem | Action Required |
|---|---|---|---|---|---|---|---|
| Parties | Party Dashboard; Party Calendar; Bookings; Create Booking; Upcoming Parties; Child Details; Services; Party Packages | `party.readiness` | party booking view/create/edit | PTY-01, US-025, FLW-PTY-01/02, UI-PTY-001/002 | `READINESS_ONLY` | No party booking/calendar domain | Implement party records, booking state machine, calendar and services |
| Parties | Working Invoices; Edit Working Invoice; Change History | `party.readiness` | party invoice view/create/edit | PTY-02, UI-PTY-003 | `READINESS_ONLY` | No working invoice model or version history | Implement draft/versioned working invoices |
| Parties | Payment on Account; Payment Receipts; Outstanding Balance | `party.payments-readiness` | party payment view/create | PTY-03, UI-PTY-004 | `READINESS_ONLY` | No party payment ledger | Implement source-linked payments and receipts |
| Parties | Create Operating Order; Active Operating Orders; Responsibilities; Additions / Removals | `party.operating-readiness` | operating-order view/create/edit | PTY-04, UI-PTY-005 | `READINESS_ONLY` | No operating-order records or transitions | Implement transactional operating orders |
| Parties | Issue Consumables; Actual Consumption; Return Unused Consumables | `party.operating-readiness` | consumables view/create/edit | PTY-05, UI-PTY-006 | `READINESS_ONLY` | No consumables ledger or stock linkage | Implement issue, use and return reconciliation |
| Parties | Party Wallet | `wallets.party` | party wallet view/settle | CUS-02, PTY-06, UI-CUS-005 | `EXISTS_BUT_PARTIAL` | Ledger foundation exists; party settlement does not | Implement party-specific settlement |
| Parties | Closure Review; Final Invoice; Payment Reconciliation; Party Wallet Settlement; Remaining Balance / Credit; Final Receipt | `party.final-close-readiness` | party close/settle/print | PTY-06, UI-PTY-015 | `READINESS_ONLY` | No final closure workflow | Implement immutable closure, reconciliation and receipt |

### Rental Assets

| Group | Page | Route | Permission | PRD IDs | Current State | Problem | Action Required |
|---|---|---|---|---|---|---|---|
| Rental Assets | Asset Register; Add Asset; Asset Categories; Asset Locations; Asset Status | `party.assets-readiness` | asset view/create/edit | AST-01, US-028, UI-PTY-007 | `READINESS_ONLY` | No asset domain or master data | Implement asset register and lifecycle |
| Rental Assets | Availability Calendar; Reservations; Conflicts | `party.assets-readiness` | asset view/create | AST-02, UI-PTY-008/009 | `READINESS_ONLY` | No reservation lock or conflict logic | Implement concurrency-safe reservations |
| Rental Assets | Checkout; Return | `party.assets-readiness` | asset checkout/return | AST-03, UI-PTY-010/011 | `READINESS_ONLY` | No asset movement transactions | Implement source-linked checkout and return |
| Rental Assets | Pre-Party Inspection; Post-Party Inspection | `party.asset-events-readiness` | asset inspect | AST-04, UI-PTY-012 | `READINESS_ONLY` | No inspection records or evidence | Implement snapshots and protected attachments |
| Rental Assets | Damaged Assets; Lost Assets; Under Maintenance; Retired Assets | `party.asset-events-readiness` | asset view/edit | AST-03/04 | `READINESS_ONLY` | No lifecycle state workflow | Implement controlled status transitions |
| Rental Assets | Damage Assessment; Damage History | `party.asset-events-readiness` | asset damage/approve | AST-04, UI-PTY-013 | `READINESS_ONLY` | No assessment or charge linkage | Implement evidence-backed assessment and history |
| Rental Assets | Depreciation; Depreciation History; Asset History | `party.asset-events-readiness` | asset depreciation/view | AST-01 to AST-05, UI-PTY-014 | `READINESS_ONLY` | No approved depreciation policy or event projection | Implement only with approved values and immutable event history |

### Quotations

| Group | Page | Route | Permission | PRD IDs | Current State | Problem | Action Required |
|---|---|---|---|---|---|---|---|
| Quotations | All Quotations; Retail Quotation; Party Quotation; Drafts; Active Quotations; Expired Quotations; Cancelled Quotations | `quotations-readiness` | quotation view/create/edit/cancel | QTN-01 to QTN-03, US-030, UI-QTN-001 | `READINESS_ONLY` | No quotation domain or state machine | Implement standalone retail and party quotations |
| Quotations | Print / Share; Version History | `quotations-readiness` | quotation print/share/view | QTN-02/03 | `READINESS_ONLY` | No immutable versioned output | Implement print/share and version history |
| Quotations | Quotation-to-invoice conversion | Not applicable | Not applicable | Explicitly excluded from Phase 1 | `MISSING` | Must remain out of scope | Do not implement in Phase 1 |

### Reports & Analytics

| Group | Page | Route | Permission | PRD IDs | Current State | Problem | Action Required |
|---|---|---|---|---|---|---|---|
| Reports & Analytics | KPI Dashboard; Report Center | `dashboard`, `reports.readiness` | reports view | RPT-01 to RPT-03, UI-RPT-001 | `EXISTS_BUT_PARTIAL` / `READINESS_ONLY` | No complete report catalog or approved formula execution | Implement report center and KPI queries |
| Reports & Analytics | Sales Reports: Daily / Monthly Sales, By Branch, By Cashier, By Payment Method, By Product, By Category, Tax, Discounts | `sales.index` or readiness | reports view/export | RPT-01, US-031 | `EXISTS_BUT_WRONG` / `READINESS_ONLY` | Sales operations are reused as reports | Add report queries, filters, scope and export |
| Reports & Analytics | Inventory Reports: Balances, Valuation, Movements, Reorder, Unpriced, Transfers, Count Differences, Adjustments | `inventory.index` or readiness | reports view/export | RPT-02 | `EXISTS_BUT_WRONG` / `READINESS_ONLY` | Inventory operations are reused as reports | Add report-specific projections |
| Reports & Analytics | Purchasing Reports; Supplier Reports | purchasing pages or readiness | reports view/export | RPT-02, PUR-01 to PUR-06 | `EXISTS_BUT_WRONG` | No report destinations | Implement purchasing/supplier reports |
| Reports & Analytics | Cash Reports: Shifts, Cash Drawers, Payment Methods, Variances | `pos.shift` or readiness | reports view/export | RPT-01, CSH-01 to CSH-04 | `EXISTS_BUT_WRONG` | Shift operation is reused | Implement reconciled cash reports |
| Reports & Analytics | Customer Reports: Customer History, Loyalty, Wallets, Gift Cards | customer readiness | reports view/export | RPT-03, CUS-01 to CUS-04 | `EXISTS_BUT_WRONG` | No source customer domains | Implement after source domains exist |
| Reports & Analytics | Party Reports; Rental Asset Reports; Damage & Depreciation Reports | party/asset readiness | reports view/export | RPT-03, PTY/AST | `READINESS_ONLY` | No source domains exist | Implement after party and asset modules |
| Reports & Analytics | Export Center: PDF, Excel, Generated Files, Download History | `exports-audit-readiness` | exports view/create/download | RPT-01 to RPT-03, SEC-025/026, UI-RPT-002 | `READINESS_ONLY` | No export jobs, file lifecycle or download history | Implement bounded protected exports and auditing |

### Administration & Settings

| Group | Page | Route | Permission | PRD IDs | Current State | Problem | Action Required |
|---|---|---|---|---|---|---|---|
| Administration & Settings | Initial Setup; Company Identity | `initial-setup`, `admin.settings` | company settings view/edit | MD-01, US-001 | `EXISTS_BUT_PARTIAL` | Real settings exist, but production values/effective versions remain open | Complete versioned settings and setup gates |
| Administration & Settings | Branches; Stores / Warehouses; Selling Store Mapping; Cash Drawers | admin branches/stores/drawers | branch/store/drawer permissions | MD-01, CSH-01 | `EXISTS_BUT_PARTIAL` | Platform foundation exists; complete scope and operational mapping remain | Finish assignments and audit |
| Administration & Settings | Users; Roles; Permissions; Branch / Store Scopes | `admin.authorization-baseline` | users/roles/permissions view/edit | DEC-038, security baseline | `EXISTS_BUT_PARTIAL` | Combined baseline page, not separate responsibilities | Add distinct access-management surfaces and maker/checker controls |
| Administration & Settings | Payment Methods; Tax Settings; Document Numbering; Document Templates; Printing Settings; Printers | `admin.settings`, drawer/settings routes | financial/admin settings permissions | POS-03 to POS-06, SEC-018 | `EXISTS_BUT_PARTIAL` | Settings are consolidated and some values are unset | Complete effective dating, validation and printer/template behavior |
| Administration & Settings | Customer Policies; Loyalty Settings; Product Wallet Settings; Party Wallet Settings; Gift Card Settings; Return Policy; Return Reasons; Inventory Policies; Pricing Policies; Open Price Policies; Offline POS Settings | settings/readiness routes | resource-specific settings | CUS, RET, INV, PRC, POS, OFF policies | `EXISTS_BUT_PARTIAL` / `READINESS_ONLY` | Most policy destinations are absent or readiness-only | Add versioned policies and explicit `BLOCKED_BY_CONFIGURATION` behavior |

### Control & System

| Group | Page | Route | Permission | PRD IDs | Current State | Problem | Action Required |
|---|---|---|---|---|---|---|---|
| Control & System | Approval Center; Pending Approvals; Rejections | pricing approval route only | approval view/approve/reject | SEC-015 | `EXISTS_BUT_WRONG` | No shared inbox or rejection surface | Add Platform-owned source-aware approval center |
| Control & System | Audit Logs; Before / After Changes; Logical Deletions; Cancellation / Reversal History; Override History; Price Change Audit; Label Print Audit | `admin.audit` | audit view/export | SEC-017/027, UI-AUD-001 | `MULTIPLE_ITEMS_SHARE_WRONG_PAGE` | All labels open one generic audit page | Add correctly scoped projections and event filters |
| Control & System | Attachments; Payment Evidence | generic attachment foundation; no payment evidence route | attachment/evidence view/create | SEC-022 to SEC-024 | `EXISTS_BUT_PARTIAL` / `MISSING` | Product media is the only substantive integration | Add contextual attachment UI and payment evidence integration |
| Control & System | Devices; Pending Transactions; Sync Queue; Sync History; Sync Conflicts | `pos.offline-readiness` | offline view/retry/resolve | NFR-01, NFR-03 to NFR-06, UI-OFF-001 to UI-OFF-003 | `READINESS_ONLY` | Offline policy and records are not implemented | Implement only after approved offline policy |
| Control & System | Document Numbering | `admin.settings` | numbering view/edit/override | NFR-06, SEC-018/020 | `ROUTE_ALIAS_ONLY` | Numbering is embedded in settings and allocation is duplicated | Create one Platform-owned allocator with explicit override controls |
| Control & System | System Status; Health Checks | `system.health` | system status/health view | UI-SYS-005/006 | `EXISTS_AND_FUNCTIONAL` | Health route exists, but permission ownership is broad | Separate system-health permission from audit permission |
| Control & System | Queue / Scheduler Status; Backup Status; Restore / Recovery Status | readiness/JSON status endpoints | operational status permissions | NFR-03, NFR-06, SEC-028 to SEC-031 | `READINESS_ONLY` / `MISSING` | No complete operational status and recovery surfaces | Implement read-only diagnostics and controlled recovery status |

## Duplicate and incorrect mappings

1. `pricing.approvals` renders the same `pricing::index` page as `pricing.index`.
2. Price Lists, Price Proposals, Price Versions, Price Change History, and Unpriced Products reuse the pricing workspace.
3. Customer files and Loyalty & Points both use `customers.loyalty-readiness`.
4. Customer transaction history points to `sales.index`.
5. Supplier invoices, supplier cost history, purchase invoices, and purchase cost history reuse `purchasing.invoices`.
6. Inventory Control Center, Balances, and several inventory substates reuse `inventory.index`.
7. Party Dashboard, Party Calendar, Working Invoice, and Party Reports use broad party/readiness pages.
8. Rental Asset Register, Calendar, Reservations, Checkout, Return, Damage, Depreciation, and History use readiness pages.
9. Reports reuse Sales, Purchasing, Inventory, Shift, Customer, Party, or Asset operational pages.
10. System Pending Approvals points to pricing approvals.
11. Audit Logs, Override Log, and Print Log all point to `admin.audit`.

Product Wallet and Party Wallet share a Blade ledger template, but their routes, tables, permissions and ledger identities are distinct. They remain partial foundations, not an acceptable substitute for complete wallet screens.

## Readiness-only boundaries

The following existing pages must not be counted as business-capability completion:

- Alerts readiness.
- Reports readiness.
- Export audit readiness.
- POS financial readiness.
- POS offline readiness.
- Returns readiness.
- Gift Card and Gift Receipt readiness.
- Party, Party Payments, Party Operating, and Party Final Close readiness.
- Rental Asset and Asset Events readiness.
- Quotations readiness.
- Purchasing receiving/invoice readiness.
- Operations readiness.

## TSK-009 screen and capability gaps

### Audit

- Audit persistence, append-only model guard, scoped policy, redaction, request/session context, and paginated screen exist.
- The audit screen still lacks authorized export/print and viewer-specific redaction for cost, customer, payment, wallet, and other sensitive values.
- Changed-field calculation and contextual source information need completion.
- POS, approval, correction, numbering, and label-specific projections are not complete.

### Approvals

- Approval request/decision records, locking, source hashes, idempotency, separation of duties, and audit exist.
- There is no complete `/approvals` inbox covering all implemented approval sources.
- Every terminal source decision must atomically synchronize its `ApprovalRecord`.
- Purchase-return rejection currently changes the source but leaves the shared approval record pending.
- Concurrent approval requests must handle unique-key races without leaking raw database errors.

### Attachments

- Private storage, UUID names, MIME/signature validation, scope checks, authorized delivery, and access logging exist.
- Product media is the only substantive integration.
- Imports and POS payment evidence do not consistently use the shared attachment boundary.
- Count limits, quarantine/redaction/retention lifecycle, and full link/revoke/expire coverage remain incomplete.
- A current defect exists: `RevokeAttachment` requires a reason, while `ManageProductMediaAction` calls it without one on several paths.

### Immutability and corrections

- Contracts, guards, DTOs, and `ExecuteCorrection` exist as reusable foundations.
- Business models and business actions do not uniformly enforce immutability for approved/final records.
- Existing reversal/version/adjustment actions do not uniformly use the shared correction contract or produce uniform correction evidence.

### Numbering

- Multiple modules allocate from locked sequences.
- Allocation logic is duplicated.
- Some allocators silently create defaults, including the retail `SALE-{Y}` fallback.
- Ordinary settings can edit sequence counters.
- A Platform-owned allocator must provide configured sequential uniqueness, locking, replay resistance, explicit override permission, stale-state protection, reason, and audit.

## Permission and scope coverage

Current permission foundations are present, but the target screen model is not fully wired:

- Missing resource-specific permissions exist for many target destinations.
- Broad gates are reused for readiness pages and unrelated reports.
- Approval, evidence, export, override, reverse/cancel, and reprint actions need explicit action permissions.
- Branch/store scope cannot be proven for domains that do not yet have source records.
- Sensitive fields require purpose-aware viewer redaction.
- Maker/checker separation must be applied to all approval-bearing source integrations.
- Direct route and action authorization must remain enforced server-side even when navigation is hidden.

## Recommended implementation order

1. Shared approvals, audit projections, immutability, correction, and numbering ownership.
2. Sales/POS payments, evidence, tax/discount/open-price UI, receipts and reconciliation.
3. Shifts/cash closing, variance workflow, daily closing and reports.
4. Offline POS after policy and device decisions are approved.
5. Customers and customer-linked history.
6. Loyalty.
7. Product Wallet and Party Wallet.
8. Gift Cards and Gift Receipts.
9. Returns and Exchanges.
10. Inventory navigation and workflow gaps.
11. Purchasing navigation and receiving gaps.
12. Party booking, payments, operating orders, consumables and settlement.
13. Rental Assets.
14. Quotations, without invoice conversion.
15. Labels and barcode printing.
16. Reports, Alerts and Export Center.
17. Administration and System surfaces.

## Verification statement

This report is an inventory and traceability export. It does not claim that every screen was browser-verified, UAT-approved, or production-ready. Existing focused test and browser evidence remains referenced by the relevant closure and test reports. No automated suite or browser action was run while generating this document.

