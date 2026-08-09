# DM 2.2 — Purchasing

**Requirements:** PUR-01–PUR-06; TSK-014–TSK-016.  
**Tests executed:** Supplier/PO/invoice/return lifecycles, totals, stock/cost posting, audit, rollback, numbering and idempotency.  
**Tests added:** Delegated `PurchasingLifecycleIntegrityTest`; lower-model extensions for numbering and conflicting return replay; calculator unit tests.  
**Passed:** Core lifecycle/calculation/rollback/serial replay cases pass; numbering check passed 6 assertions.  
**Failed:** Conflicting supplier-return payload under a reused idempotency key is silently accepted; invoice import is non-runnable.  
**Blocked:** True concurrent production-DB approval/number allocation and Excel cases.  
**Defects:** QA-006, QA-014, QA-015.  
**Evidence:** Follow-up run: 6 passed, 1 failed, 5 skipped.  
**Overall status:** **FAIL — FINANCIAL/REPLAY RISK**
