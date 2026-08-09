# DM 1.3 — Users, Roles, Permissions and Scopes

**Requirements:** NFR-03, AC-XCUT-10; TSK-008 criteria and canonical role matrix.  
**Tests executed:** `RolePermissionScopeTest`, `AuthorizationEnforcementTest`, direct-route/scope tests across implemented modules.  
**Tests added:** Scope/denial cases in delegated catalog, inventory, retail, customer and attachment suites.  
**Passed:** Many direct URL/action and branch/store denials work server-side.  
**Failed:** Permission catalog is 348 versus approved 276; sensitive/unimplemented permissions are granted.  
**Blocked:** Complete role × permission × branch × store matrix and production accounts.  
**Defects:** QA-002, QA-021, QA-023.  
**Evidence:** Full Feature suite failures in `artifacts/qa-feature-final.out`.  
**Overall status:** **FAIL — SECURITY RECONCILIATION REQUIRED**
