# TSK-010 Browser Verification Evidence

Date: 2026-08-04

Environment: local Laravel application at `http://127.0.0.1:8094`; owner-authorized Chromium browser control; no production system used.

Accounts used: `demo-admin` / System Administrator, `demo-cashier` / Cashier, `demo-reviewer` / Accountant/Reviewer, `demo-branch-manager` / Branch Manager, and `demo-no-access` / No Access.

## Actual results

- `/catalog/products`, `/catalog/categories`, and `/catalog/brands` returned the expected authenticated screens for the System Administrator. Catalog navigation was visible to that account.
- `/catalog/products` was checked in English LTR at desktop and in Arabic RTL at desktop/mobile-sized viewports. `/catalog/categories` and `/catalog/brands` were also checked at a 390px viewport in English LTR. The browser reported no page-level horizontal overflow. Screenshots: `01-products-en-desktop.png`, `05-products-ar-desktop.png`, `05-products-ar-mobile.png`, `06-categories-en-mobile.png`, and `07-brands-en-mobile.png`.
- Category root and child creation succeeded. Duplicate category code validation and active-child dependency deactivation behavior were exercised. A stable Livewire browser submission rejected self-parent and descendant-cycle attempts with the expected messages; the valid root/child relationship remained persisted.
- Brand creation, duplicate-code validation, and active-product dependency deactivation behavior succeeded.
- Product identity creation, duplicate item-code validation, permitted identity edit, and attempted item-code change denial succeeded. The item code remained unchanged.
- Exact item-code search, Arabic-name search, and exact barcode search returned the expected product row.
- The barcode dialog opened. Local allocation persisted `1001000001`, demonstrating the four-digit supplier code `1001` plus six-digit serial `000001` with no invented check digit. The value appeared in the product list after the Livewire interaction.
- Supplier barcode `990222333444` was added once and its duplicate replay was rejected with `This barcode is already assigned and cannot be silently reassigned.` A local allocation using supplier code `1002` was replayed with the same allocation key; the original `1002000001` result was preserved and no second row was created.
- A direct `/catalog/products` request as `demo-branch-manager` and `demo-no-access` returned HTTP 403 and did not expose Catalog navigation. `demo-cashier` and `demo-reviewer` received HTTP 200 view access; the Cashier forged create action returned Livewire HTTP 403 and no write control was visible.
- No unexpected browser console errors or failed network requests were captured in successful catalog runs. Expected 403 console entries occurred only during intentional denial assertions. The barcode modal array/object rendering defect found during this continuation was fixed and rechecked.

## Authorization and database assertions

- DEC-038 `View (A)` was seeded for System Administrator, Cashier (limited view), Purchasing Officer, Warehouse Manager, Pricing Officer, and Accountant/Reviewer. No catalog `P`/`R` permission was seeded.
- `Gate::forUser(demo-cashier)` returned `products_categories_brands.view = true` and `.create = false`; persistent permission checks returned Reviewer view `true`, Branch Manager view `false`, and No Access view `false`.
- Database inspection: supplier barcode `990222333444` count `1`; replayed local barcode `1002000001` count `1`; product `AUD-PR-107606` has exactly `1001000001`, `1002000001`, and `990222333444`.
- Database inspection: root `AUD-CAT-C970702` has `parent_id = null`, child `AUD-CAT-D970702` has `parent_id = 5`, and self-parent row count is `0`; the rejected descendant-cycle attempt did not change either row.

## Closure result

All three required remaining local gaps passed. TSK-010 is **Completed for approved local scope**. Production catalog data, supplier master/history, final supplier-code assignments, final attributes, UAT, Phase 1/Phase 2 gates, and production readiness remain open. TSK-011 and TSK-013 were not started.

Automated status: the only existing TSK-010-related file, `php artisan test tests/Feature/Catalog/CatalogImplementationAbsenceTest.php --no-coverage`, returned 3 expected failures because it is a stale absence guard. No behavioral automated suite was created or claimed.

## Evidence boundary

The local System Administrator exercises the existing Gate bypass; the non-Super-Administrator view boundary was separately verified with Cashier, Reviewer, Branch Manager, and No Access accounts. Catalog `P`/`R` permissions remain ungranted by design. No production supplier data, production barcode range, supplier master/history, product media/type/composition/service behavior, stock, price, label queue, import, or POS behavior was exercised.
