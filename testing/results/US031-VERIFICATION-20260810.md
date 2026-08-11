# US-031 Local/Dev Verification — 2026-08-10

## Disposable database

The focused TDD and reconciliation runs use the dedicated MariaDB schema
`toyjoy_us031_tdd_20260810`. It is disposable and must not be treated as the
normal local schema or as production data.

## Evidence log

This file records only execution performed during the current US-031 session.

### TDD and reconciliation

- The existing `tests/Feature/ScopedStories/AssetQuotationReportingTest.php`
  was extended; no new reporting test framework was created.
- Valid RED findings covered ignored user/module filters, missing PDF queue
  support, exposed inventory cost, missing low-stock/unpriced alerts,
  ignored product/category/payment/customer filters, foreign branch scope,
  and inconsistent document-status KPI arithmetic.
- GREEN fixes added scoped `ReportSnapshot` filters, authoritative source
  arithmetic, permission-redacted cost, deduplicated scoped alerts, queued
  PDF/XLSX exports, private expiry, and status-consistent sales
  KPI/detail/export reconciliation.

### Focused MariaDB results

All focused runs used XAMPP MariaDB only:

- Report snapshot/export boundary: 1/1, 13 assertions.
- User/module arithmetic plus product/category/payment/customer filters: 2/2,
  11 assertions.
- Document-status reconciliation: 1/1, 6 assertions.
- Separate same-session runs passed the queued-PDF, generated-private-PDF,
  cost-redaction, alert, and foreign-scope cases.
- The full `phpunit.us031.xml` bundle exceeded the five-minute command window;
  it is not counted as a pass or product failure. A later owner-download
  PHPUnit rerun was also blocked by concurrent MariaDB DDL from other
  workspace agents; the browser download check passed instead.

### Browser results

The existing `testing/e2e/agentd-us028-us031.spec.js` was extended rather than
duplicated. Against `http://127.0.0.1:8791` and disposable
`toyjoy_us031_browser_20260810`:

- The clean full run passed 4/4 before the final download assertion.
- The final report workflow passed with queued polling and an actual owner
  Excel download; the isolated surface smoke then passed 1/1.
- English/LTR, 390px responsive layout, Arabic RTL, report filters, export job
  center, queue completion, and download behavior were exercised.
- The final database check showed the newest XLSX job `ready`, 113 rows, a
  private local artifact, and `export_downloaded` audit evidence.

### Static/package checks

- Reporting PHP, Blade, and test files passed `php -l`.
- `php artisan view:cache --no-ansi` passed.
- Report route discovery passed for `reports`, `reports/export`, and the
  existing readiness route.
- `php composer.phar validate --no-check-publish` passed with only the
  repository's existing exact OpenSpout version warning.

### Remaining boundary

US-031 is complete for the local/dev boundary. Arabic PDF font fidelity,
physical printing, production grants/configuration, backup/restore, UAT, and
full-repository regression remain release gates. No commit or push occurred.
