# DM 2.1 — Catalog and Product Import

**Requirements:** MD-02–MD-05, PRC-01–PRC-02; TSK-010–TSK-013.  
**Tests executed:** Catalog master behavior, stale catalog-absence regression, import runtime compatibility, formula/macro/duplicate-batch cases.  
**Tests added:** Delegated `CatalogMasterBehaviorTest` and `ImportRuntimeCompatibilityTest`.  
**Passed:** Catalog behavior suite contributes to 28 delegated passing tests; import manifest check passed.  
**Failed:** Existing absence tests are stale; actual spreadsheet runtime cannot load OpenSpout.  
**Blocked:** Five import cases are `BLOCKED_BY_ENVIRONMENT`; complete UI/import security matrix unavailable.  
**Defects:** QA-004, QA-006, QA-007.  
**Evidence:** Import focused run: 1 passed, 5 skipped, 3 assertions.  
**Overall status:** **FAIL — IMPORT PATH NON-RUNNABLE**
