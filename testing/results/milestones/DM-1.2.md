# DM 1.2 — Operational Master Configuration

**Requirements:** MD-01; TSK-005–TSK-007 delivery/manual criteria.  
**Tests executed:** Company settings, branches/stores, selling-store mapping, cash drawer masters, authorization and audit regression tests.  
**Tests added:** None in this audit; existing module tests were reused.  
**Passed:** Implemented Local/Dev settings, branch/store isolation, mapping and drawer validations have automated coverage.  
**Failed:** Full suite remains red; tax effective-date/overlap and print-preview gaps remain.  
**Blocked:** Approved production values, devices/printers, UAT.  
**Defects:** QA-001, QA-020, QA-022, QA-023.  
**Evidence:** Full Feature suite log and existing `tests/Feature/Platform/*`.  
**Overall status:** **PARTIAL — GATE OPEN**
