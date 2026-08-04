# TSK-011 Browser Verification Results

Date: 2026-08-04
Application: http://127.0.0.1:8094
Scope: local-only TSK-011 product-card implementation. No UAT, production, or milestone-gate claim.

## Accounts and authorization

- `demo-admin` — System Administrator; exercised the authorized local catalog create/edit/media flows through the existing administrator bypass.
- `demo-cashier` — Cashier; verified view-only catalog access, no edit link, no upload control, and direct edit denial with HTTP 403.
- `demo-no-access` — No Access; verified direct product detail/edit/media denial with HTTP 403.
- Database role inspection also confirmed the DEC-038 catalog view grant boundary for the local view roles; no catalog create/edit/cost permission was silently granted.

## Screens and routes

Checked:

- `/catalog/products`
- `/catalog/products/create`
- `/catalog/products/{product}/edit`
- `/catalog/products/{product}`
- `/catalog/products/{product}/media/{attachment}`

Evidence screenshots:

- [01-products-en-desktop.png](01-products-en-desktop.png)
- [02-product-create-en-desktop.png](02-product-create-en-desktop.png)
- [03-product-edit-after-create.png](03-product-edit-after-create.png)
- [04-product-detail-en-desktop.png](04-product-detail-en-desktop.png)
- [05-product-media-five.png](05-product-media-five.png)
- [06-product-detail-media.png](06-product-detail-media.png)
- [09-product-detail-ar-desktop.png](09-product-detail-ar-desktop.png)
- [10-product-edit-ar-mobile.png](10-product-edit-ar-mobile.png)

## Assertions passed

- Product list, create form, edit form, and product detail rendered.
- Standard, composite, and service products were created and persisted with only the approved type values.
- Service products display a disabled reorder-threshold control and no stock-side-effect behavior.
- Composite products display the explicit policy boundary; composition rows, assembly, and bundle pricing remain deferred because the approved Phase 1 contract does not define them sufficiently.
- Full bilingual identity/description, model, UOM, physical values, and reportable attributes persisted.
- Exact item-code and colour filtering returned the expected product; pagination remained bounded.
- Forged item-code mutation was rejected as immutable.
- Forged invalid product type was rejected by server validation.
- Two-session stale edit was rejected with the changed-in-another-session feedback.
- One main image plus four additional protected images persisted (five active links total).
- Sixth image was rejected with the configured additional-image limit; the five existing links remained.
- Replayed duplicate upload preserved the existing image-link count and did not create another link.
- Unsafe SVG and MIME/signature mismatch upload attempts were rejected.
- Protected media delivery used the source-authorized product route; no raw storage URL or absolute storage path appeared in the rendered page.
- Cashier and no-access direct-route/media denial returned HTTP 403; unauthorized navigation and edit/upload controls were absent.
- Cost was omitted for all current local roles because DEC-038 does not grant a catalog cost-field permission.
- Arabic RTL desktop/mobile and English LTR layouts rendered without horizontal overflow in the checked viewports.
- Keyboard-visible form controls and responsive stacked forms were visually checked.

## Browser boundary result

The initial oversized-request observation was superseded by the final closure re-verification after the safe preflight fix. A file above the approved 8 MB application limit is cleared before upload and displays the localized inline message `The image is larger than the configured 8 MB local limit.` with zero selected files and no upload request.

## Final closure re-verification — 2026-08-04

- A separate 3 MB payload, below the application 8 MB limit but above the local PHP `upload_max_filesize=2M`, produced Livewire upload-endpoint HTTP 422 and no persisted media. After the upload action, the page rendered the localized message that the upload was rejected before Laravel could receive it.
- PHP reports `upload_max_filesize=2M` and `post_max_size=8M`. An upstream HTTP 413 rejected before Laravel/Livewire remains an infrastructure boundary that cannot be rendered by Laravel; the application limits were not weakened.
- Main plus four active images remained intact; the sixth image was rejected and the count stayed five.
- Direct/guessed media retrieval as `demo-no-access` returned HTTP 403.
- Stale update, immutable item-code denial, detail cost denial, RTL/LTR mobile layout, and normal-flow console/network checks passed.
- New visual evidence: `11-closure-rtl-mobile.png` and `12-closure-ltr-mobile.png`.
- New visual evidence: `11-closure-rtl-mobile.png`, `12-closure-ltr-mobile.png`, and `13-closure-oversized-inline.png`.

## Console and network

Normal successful flows had no unexpected console errors or failed network requests. Intentional HTTP 403 denial checks produced only the expected denial entries. The >8 MB client preflight produced no upload request; the 3 MB PHP-boundary check produced only the expected Livewire HTTP 422 entry. No sensitive cost, attachment path, or storage URL leakage was observed.

## Database evidence

- Products created for browser checks persisted as IDs 3 (standard), 4 (composite), 5 (service), and 6 (standard stale-update case).
- Product 3 retained five active `product_images` links: one `main` at sort order 0 and four `additional` links at sort orders 1–4.
- Product 6 retained its original item code and advanced its lock version after the accepted save; the stale second save was rejected.
- The migration-created product-card columns and `product_images` table were confirmed with schema inspection.
- No stock, price, label-queue, variant, composition, supplier-master, or purchase rows were created by these checks.

## Automated and static checks

Automated PHPUnit/Pest/browser suites were not created or run, per the current project directive. The existing TSK-010 stale absence guard was not used as TSK-011 evidence.

Passed on 2026-08-04:

- PHP syntax lint for all changed Catalog action/model/migration/route/Blade PHP files.
- `php artisan migrate --force --no-ansi`
- `php artisan migrate:status --no-ansi`
- Catalog `php artisan route:list --path=catalog --no-ansi`
- `php artisan view:cache --no-ansi`
- Product/product-image schema inspection through Artisan Tinker.
- `npm run build` (only the existing optional Fontaine optimization warning).
- Arabic and English locale JSON parsing.
- `git diff --check`.

## Remaining boundaries

TSK-012 staged import and TSK-013 supplier master/history were not started. Production UOM/type policy, final image sources/retention configuration, production catalog data, supplier codes, and final attribute/fractional-quantity policy remain production/configuration dependencies under the existing blockers. No Phase 1/Phase 2 completion, UAT acceptance, or production readiness is claimed.
