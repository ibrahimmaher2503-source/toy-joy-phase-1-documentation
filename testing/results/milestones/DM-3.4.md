# DM 3.4 — Restricted Offline POS

**Requirements:** NFR-04, AC-XCUT-09, POS transaction integrity; TSK-026.  
**Tests executed:** PWA shell/readiness and offline boundary test only.  
**Tests added:** Offline readiness boundary in delegated `CashShiftOfflineBoundaryTest`.  
**Passed:** The UI truthfully remains readiness-only.  
**Failed:** Queue, trusted payload, sync, retry, replay/conflict and reconciliation implementation is absent.  
**Blocked:** Real browsers/devices/connectivity profiles and production endpoint.  
**Defects:** QA-018, QA-020, QA-023.  
**Evidence:** Source inspection and coverage matrix.  
**Overall status:** **BLOCKED_NOT_IMPLEMENTED**
