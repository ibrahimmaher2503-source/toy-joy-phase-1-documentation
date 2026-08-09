# DM 3.1 — POS Checkout and Suspended Sales

**Requirements:** POS-01–POS-02; TSK-023.  
**Tests executed:** Barcode lookup, suspended/resume ownership, shift requirement, stock posting, replay and route authorization.  
**Tests added:** Delegated `RetailSuspendedAndBarcodeTest`; `RetailSaleIntegrityTest` conflicting-replay assertion corrected by lower model.  
**Passed:** Implemented barcode/suspend/ownership/stock boundaries mostly pass.  
**Failed:** Conflicting sale replay is accepted; complete payment/drawer/customer linkage is absent.  
**Blocked:** Touch/keyboard/browser, printers, production concurrency and sustained POS performance.  
**Defects:** QA-013–QA-015, QA-020, QA-024.  
**Evidence:** Inventory/Retail/Readiness scoped run and full Feature log.  
**Overall status:** **FAIL — POS POSTING INCOMPLETE**
