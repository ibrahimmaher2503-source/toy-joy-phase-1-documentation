# DM 2.4 — Inventory, Transfers and Counts

**Requirements:** INV-01–INV-09; TSK-019–TSK-022.  
**Tests executed:** Ledger/balance/replay, scope, transfer states/partial receipt, adjustment separation/audit, negative/fractional rules, counts and reconciliation.  
**Tests added:** Delegated `InventoryWorkflowIntegrityTest`; `InventoryMovementIntegrityTest` was corrected by the lower model to enforce conflicting-payload refusal.  
**Passed:** 19 of 22 scoped Inventory/Retail/Readiness tests; clean demo reconciliation found 0 balance divergences.  
**Failed:** Conflicting replay accepted and fractional movement accepted for a non-fractional product.  
**Blocked:** Production DB race/lock semantics and large browser count/scanner tests.  
**Defects:** QA-009, QA-014, QA-015, QA-027.  
**Evidence:** Scoped run: 22 tests, 19 passed, 3 failed, 158 assertions.  
**Overall status:** **FAIL — INVENTORY INTEGRITY DEFECTS**
