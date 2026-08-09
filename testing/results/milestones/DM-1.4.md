# DM 1.4 — Approval, Audit, Attachment and Immutability

**Requirements:** NFR-01, NFR-02, NFR-04; AC-XCUT-01–AC-XCUT-08, AC-XCUT-15–16; TSK-009.  
**Tests executed:** Approval, audit append-only/scope/backfill/recording/screen, attachment, correction/immutability and safe-error tests.  
**Tests added:** Delegated `AttachmentFoundationTest` (12 passed / 40 assertions).  
**Passed:** Private storage, validation/no-orphan, controlled delivery, audit, append-only behavior and broad audit foundations.  
**Failed:** Authenticated expiry authorization path; several old absence/wiring assertions are stale.  
**Blocked:** Source-specific browser flows and production object storage.  
**Defects:** QA-003, QA-004, QA-023.  
**Evidence:** Focused attachment/error group: 33 passed / 124 assertions; full-suite log.  
**Overall status:** **FAIL — LOCAL FOUNDATION PARTIAL**
