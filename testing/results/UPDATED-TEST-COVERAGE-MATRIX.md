# Updated Test Coverage Matrix (semantic rebuild)

Generated 2026-08-08 from the current E2E, UAT, SECURITY, CONCURRENCY, FAILURE-RECOVERY catalogs, milestone reports, and docs/** + testing/** workflow references.

Status vocabulary: COVERED_LOCAL means an executed local automated slice; PLANNED means a registered scenario not executed; BLOCKED means the implementation/readiness capability is absent; FAIL means executed evidence exposes a defect; N/A means the dimension is not applicable. Scenario IDs are catalog IDs, not invented labels.

## Requirement coverage ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â‚¬Å¡Ã‚Â¬ÃƒÂ¢Ã¢â€šÂ¬Ã‚Â 72 rows

| Requirement | Milestone / Workflow | Scenario IDs (minimum two) | Happy | Negative | Boundary | Permission | Concurrency | Rollback | Idempotency | Data integrity | Recovery | Production-like | Automation Status | Mapping basis / gap |
|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|
| AST-01 | FLW-PTY-06..10 | E2E-28; UAT-GO-05 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | N/A | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| AST-02 | FLW-PTY-06..10 | UAT-GO-05; CONC-AST-001 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | PLANNED | PLANNED | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Direct E2E/UAT record plus same-workflow concurrency/recovery/security companion. Existing status/gap retained. |
| AST-03 | FLW-PTY-06..10 | UAT-GO-05; E2E-28 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | N/A | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Direct E2E/UAT record plus UAT-GO-05 all-requirements regression gate. Existing status/gap retained. |
| AST-04 | FLW-PTY-06..10 | UAT-GO-05; FAIL-AST-001 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | PLANNED | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Direct E2E/UAT record plus same-workflow concurrency/recovery/security companion. Existing status/gap retained. |
| AST-05 | FLW-PTY-06..10 | E2E-27; ; UAT-PARTY-03 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | N/A | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| CSH-01 | FLW-CSH-01..03 | E2E-20; ; UAT-MGR-02; ; CONC-CSH-001 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | PLANNED | PLANNED | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Direct E2E/UAT record plus same-workflow concurrency/recovery/security companion. Existing status/gap retained. |
| CSH-02 | FLW-CSH-01..03 | UAT-GO-05; E2E-20 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | PLANNED | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Direct E2E/UAT record plus UAT-GO-05 all-requirements regression gate. Existing status/gap retained. |
| CSH-03 | FLW-CSH-01..03 | UAT-GO-05; E2E-20 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | N/A | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Direct E2E/UAT record plus UAT-GO-05 all-requirements regression gate. Existing status/gap retained. |
| CSH-04 | FLW-CSH-01..03 | UAT-GO-05; E2E-20 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | N/A | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Direct E2E/UAT record plus UAT-GO-05 all-requirements regression gate. Existing status/gap retained. |
| CUS-01 | FLW-CUS-01..05 | E2E-22; UAT-GO-05 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | N/A | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| CUS-02 | FLW-CUS-01..05 | E2E-23; ; UAT-CASH-05; ; CONC-WAL-001; ; FAIL-WAL-001 | PLANNED | COVERED_LOCAL | N/A | COVERED_LOCAL | PLANNED | PLANNED | PLANNED | COVERED_LOCAL | PLANNED | PLANNED | PASS_LOCAL | Direct E2E/UAT record plus same-workflow concurrency/recovery/security companion. Existing status/gap retained. |
| CUS-03 | FLW-CUS-01..05 | UAT-GO-05; E2E-22 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | PLANNED | PLANNED | PLANNED | BLOCKED | PLANNED | BLOCKED | BLOCKED | Direct E2E/UAT record plus UAT-GO-05 all-requirements regression gate. Existing status/gap retained. |
| CUS-04 | FLW-CUS-01..05 | E2E-37; ; UAT-PARTY-05 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | N/A | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| INV-01 | FLW-INV-01..07 | E2E-15; ; UAT-GO-01 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | N/A | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| INV-02 | FLW-INV-01..07 | E2E-17; ; UAT-CASH-01 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | N/A | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| INV-03 | FLW-INV-01..07 | E2E-16; ; UAT-WH-03; ; CONC-INV-004 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | PLANNED | PLANNED | PLANNED | BLOCKED | PLANNED | BLOCKED | BLOCKED | Direct E2E/UAT record plus same-workflow concurrency/recovery/security companion. Existing status/gap retained. |
| INV-04 | FLW-INV-01..07 | E2E-15; UAT-MGR-03 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | PLANNED | PLANNED | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| INV-05 | FLW-INV-01..07 | UAT-GO-05; CONC-INV-003 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | PLANNED | PLANNED | PLANNED | BLOCKED | PLANNED | BLOCKED | BLOCKED | Direct E2E/UAT record plus same-workflow concurrency/recovery/security companion. Existing status/gap retained. |
| INV-06 | FLW-INV-01..07 | UAT-GO-05 | PLANNED | PLANNED | FAIL | PLANNED | N/A | PLANNED | PLANNED | FAIL | PLANNED | PLANNED | FAIL | Direct E2E/UAT record plus UAT-GO-05 all-requirements regression gate. Existing status/gap retained. |
| INV-07 | FLW-INV-01..07 | E2E-16; ; UAT-WH-03 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | PLANNED | PLANNED | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| INV-08 | FLW-INV-01..07 | UAT-COUNT-02; ; CONC-INV-006 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | PLANNED | PLANNED | PLANNED | BLOCKED | PLANNED | BLOCKED | BLOCKED | Direct E2E/UAT record plus same-workflow concurrency/recovery/security companion. Existing status/gap retained. |
| INV-09 | FLW-INV-01..07 | UAT-GO-05 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | PLANNED | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Direct E2E/UAT record plus UAT-GO-05 all-requirements regression gate. Existing status/gap retained. |
| MD-01 | FLW-ADM-01 / FLW-CAT-01 | E2E-01; ; UAT-ADM-01 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | PLANNED | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| MD-02 | FLW-ADM-01 / FLW-CAT-01 | E2E-05; UAT-GO-05 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | N/A | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| MD-03 | FLW-ADM-01 / FLW-CAT-01 | UAT-GO-05 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | N/A | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Direct E2E/UAT record plus UAT-GO-05 all-requirements regression gate. Existing status/gap retained. |
| MD-04 | FLW-ADM-01 / FLW-CAT-01 | E2E-33; ; UAT-ADM-05 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | PLANNED | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| MD-05 | FLW-ADM-01 / FLW-CAT-01 | E2E-34; ; UAT-WH-05 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | N/A | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| MD-06 | FLW-ADM-01 / FLW-CAT-01 | E2E-22; ; UAT-PARTY-01 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | N/A | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| NFR-01 | FLW-SYS-01..03 | E2E-01; ; UAT-ADM-01 | PLANNED | PLANNED | PLANNED | PLANNED | N/A | N/A | N/A | PLANNED | PLANNED | PLANNED | PLANNED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| NFR-02 | FLW-SYS-01..03 | E2E-39; ; UAT-ACCOUNT-05 | PLANNED | PLANNED | PLANNED | PLANNED | N/A | N/A | N/A | PLANNED | PLANNED | PLANNED | PLANNED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| NFR-03 | FLW-SYS-01..03 | E2E-03; ; UAT-ADM-02; ; SEC-003 | PLANNED | FAIL | PLANNED | FAIL | N/A | PLANNED | N/A | PLANNED | PLANNED | PLANNED | FAIL | Direct E2E/UAT record plus same-workflow concurrency/recovery/security companion. Existing status/gap retained. |
| NFR-04 | FLW-SYS-01..03 | E2E-09; ; UAT-PUR-03; ; SEC-015; ; FAIL-FILE-001 | N/A | COVERED_LOCAL | COVERED_LOCAL | COVERED_LOCAL | N/A | COVERED_LOCAL | N/A | COVERED_LOCAL | PLANNED | PLANNED | PASS_LOCAL | Direct E2E/UAT record plus same-workflow concurrency/recovery/security companion. Existing status/gap retained. |
| NFR-05 | FLW-SYS-01..03 | E2E-17; ; UAT-ADM-04 | PLANNED | PLANNED | PLANNED | PLANNED | N/A | N/A | N/A | PLANNED | PLANNED | PLANNED | PLANNED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| NFR-06 | FLW-SYS-01..03 | UAT-GO-05; CONC-OFF-001 | PLANNED | PLANNED | PLANNED | PLANNED | PLANNED | PLANNED | PLANNED | PLANNED | PLANNED | PLANNED | PLANNED | Direct E2E/UAT record plus same-workflow concurrency/recovery/security companion. Existing status/gap retained. |
| NFR-07 | FLW-SYS-01..03 | E2E-32; ; UAT-GO-06 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | N/A | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| POS-01 | FLW-POS-01..04 | E2E-17; ; UAT-CASH-01 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | N/A | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| POS-02 | FLW-POS-01..04 | E2E-18; ; UAT-CASH-03; ; CONC-POS-002; ; FAIL-POS-001 | PLANNED | PLANNED | N/A | PLANNED | PLANNED | PLANNED | FAIL | PLANNED | PLANNED | PLANNED | FAIL | Direct E2E/UAT record plus same-workflow concurrency/recovery/security companion. Existing status/gap retained. |
| POS-03 | FLW-POS-01..04 | E2E-19; ; UAT-CASH-02 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | PLANNED | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| POS-04 | FLW-POS-01..04 | E2E-19; UAT-PRICE-03 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | N/A | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| POS-05 | FLW-POS-01..04 | UAT-GO-05 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | N/A | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Direct E2E/UAT record plus UAT-GO-05 all-requirements regression gate. Existing status/gap retained. |
| POS-06 | FLW-POS-01..04 | E2E-36; ; UAT-CASH-06 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | N/A | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| POS-07 | FLW-POS-01..04 | E2E-21; ; UAT-CASH-04 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | N/A | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| PRC-01 | FLW-CAT-02..05 | E2E-09; ; UAT-PUR-03 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | PLANNED | PLANNED | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| PRC-02 | FLW-CAT-02..05 | E2E-05; ; UAT-ADM-05 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | N/A | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| PRC-03 | FLW-CAT-02..05 | E2E-11; ; UAT-WH-01; ; CONC-PRC-001 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | PLANNED | PLANNED | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Direct E2E/UAT record plus same-workflow concurrency/recovery/security companion. Existing status/gap retained. |
| PRC-04 | FLW-CAT-02..05 | UAT-PRICE-02; ; CONC-PRC-001 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | PLANNED | PLANNED | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Direct E2E/UAT record plus same-workflow concurrency/recovery/security companion. Existing status/gap retained. |
| PRC-05 | FLW-CAT-02..05 | UAT-GO-05; CONC-PRC-001 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | PLANNED | PLANNED | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Direct E2E/UAT record plus same-workflow concurrency/recovery/security companion. Existing status/gap retained. |
| PRC-06 | FLW-CAT-02..05 | E2E-14; ; UAT-WH-04 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | N/A | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| PRC-07 | FLW-CAT-02..05 | E2E-14; UAT-CASH-01 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | N/A | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| PRC-08 | FLW-CAT-02..05 | E2E-19; ; UAT-MGR-03 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | N/A | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| PTY-01 | FLW-PTY-01..11 | E2E-25; ; UAT-PARTY-01 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | N/A | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| PTY-02 | FLW-PTY-01..11 | UAT-GO-05 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | N/A | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Direct E2E/UAT record plus UAT-GO-05 all-requirements regression gate. Existing status/gap retained. |
| PTY-03 | FLW-PTY-01..11 | E2E-26; UAT-PARTY-02 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | N/A | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| PTY-04 | FLW-PTY-01..11 | E2E-26; UAT-GO-05; CONC-PTY-001 ; FAIL-PTY-001 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | PLANNED | PLANNED | PLANNED | BLOCKED | PLANNED | BLOCKED | BLOCKED | Direct E2E/UAT record plus same-workflow concurrency/recovery/security companion. Existing status/gap retained. |
| PTY-05 | FLW-PTY-01..11 | E2E-27; ; UAT-PARTY-03 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | N/A | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| PTY-06 | FLW-PTY-01..11 | UAT-PARTY-04; ; CONC-PTY-001 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | PLANNED | PLANNED | PLANNED | BLOCKED | PLANNED | BLOCKED | BLOCKED | Direct E2E/UAT record plus same-workflow concurrency/recovery/security companion. Existing status/gap retained. |
| PUR-01 | FLW-PUR-01..03 | E2E-06; ; UAT-PUR-01 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | N/A | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| PUR-02 | FLW-PUR-01..03 | E2E-33; ; UAT-PUR-05 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | N/A | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| PUR-03 | FLW-PUR-01..03 | E2E-10; ; UAT-PUR-02 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | PLANNED | PLANNED | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| PUR-04 | FLW-PUR-01..03 | E2E-11; ; UAT-PUR-04 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | PLANNED | PLANNED | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| PUR-05 | FLW-PUR-01..03 | UAT-WH-01; ; FAIL-INV-001 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | PLANNED | PLANNED | PLANNED | BLOCKED | PLANNED | BLOCKED | BLOCKED | Direct E2E/UAT record plus same-workflow concurrency/recovery/security companion. Existing status/gap retained. |
| PUR-06 | FLW-PUR-01..03 | E2E-12; ; UAT-WH-02; ; FAIL-INV-002 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | PLANNED | PLANNED | BLOCKED | PLANNED | BLOCKED | BLOCKED | Direct E2E/UAT record plus same-workflow concurrency/recovery/security companion. Existing status/gap retained. |
| QTN-01 | FLW-QTN-01 | E2E-29; UAT-GO-05 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | N/A | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| QTN-02 | FLW-QTN-01 | E2E-38; ; UAT-ACCOUNT-04 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | PLANNED | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| QTN-03 | FLW-QTN-01 | E2E-39; ; UAT-ACCOUNT-05 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | N/A | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| RET-01 | FLW-RET-01..03 | E2E-21; ; UAT-CASH-04 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | N/A | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| RET-02 | FLW-RET-01..03 | UAT-GO-05; CONC-PAY-001 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | PLANNED | PLANNED | PLANNED | BLOCKED | PLANNED | BLOCKED | BLOCKED | Direct E2E/UAT record plus same-workflow concurrency/recovery/security companion. Existing status/gap retained. |
| RET-03 | FLW-RET-01..03 | E2E-21; UAT-MGR-03 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | N/A | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| RET-04 | FLW-RET-01..03 | UAT-GO-05; CONC-PAY-001 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | PLANNED | PLANNED | PLANNED | BLOCKED | PLANNED | BLOCKED | BLOCKED | Direct E2E/UAT record plus same-workflow concurrency/recovery/security companion. Existing status/gap retained. |
| RPT-01 | FLW-RPT-01..03 | E2E-30; ; UAT-MGR-01 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | N/A | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |
| RPT-02 | FLW-RPT-01..03 | E2E-31; UAT-GO-05; CONC-RPT-001 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | PLANNED | PLANNED | PLANNED | BLOCKED | PLANNED | BLOCKED | BLOCKED | Direct E2E/UAT record plus same-workflow concurrency/recovery/security companion. Existing status/gap retained. |
| RPT-03 | FLW-RPT-01..03 | E2E-40; ; UAT-ACCOUNT-02 | BLOCKED | BLOCKED | BLOCKED | BLOCKED | N/A | N/A | N/A | BLOCKED | PLANNED | BLOCKED | BLOCKED | Both E2E and UAT records declare this requirement ID. Existing status/gap retained. |

## DM coverage ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â‚¬Å¡Ã‚Â¬ÃƒÂ¢Ã¢â€šÂ¬Ã‚Â 25 rows

| DM | Scenario IDs | Report status | Evidence / gap |
|---|---|---|---|
| DM-1.1 | E2E-08; UAT-ADM-04 | FAIL | UI/browser evidence absent |
| DM-1.2 | E2E-01; UAT-ADM-01 | PARTIAL / GATE OPEN | Core admin slice only |
| DM-1.3 | E2E-03; UAT-ADM-02; SEC-003 | FAIL | RBAC reconciliation QA-002 |
| DM-1.4 | E2E-07; UAT-ADM-03; SEC-015 | FAIL | Attachment local foundation only |
| DM-2.1 | E2E-05; E2E-09; UAT-PUR-03 | FAIL | OpenSpout environment QA-006 |
| DM-2.2 | E2E-11; UAT-WH-01; FAIL-INV-001 | FAIL | Financial/replay risk |
| DM-2.3 | E2E-13; UAT-PRICE-02; CONC-PRC-001 | PARTIAL / GATE OPEN | Device/concurrency pending |
| DM-2.4 | E2E-16; UAT-WH-03; CONC-INV-006 | FAIL | Inventory defects |
| DM-3.1 | E2E-17; UAT-CASH-01; FAIL-POS-001 | FAIL | POS posting incomplete |
| DM-3.2 | E2E-19; UAT-CASH-02 | BLOCKED_NOT_IMPLEMENTED | Payment/tax absent |
| DM-3.3 | E2E-20; UAT-MGR-02; CONC-CSH-001 | BLOCKED_NOT_IMPLEMENTED | Shift absent |
| DM-3.4 | E2E-24; UAT-CASH-05; CONC-OFF-001 | BLOCKED_NOT_IMPLEMENTED | Offline absent |
| DM-4.1 | E2E-22; UAT-PARTY-01 | BLOCKED_NOT_IMPLEMENTED | Customer/loyalty absent |
| DM-4.2 | E2E-23; UAT-CASH-05; CONC-WAL-001 | PARTIAL FOUNDATION / BUSINESS FLOW BLOCKED | Wallet foundation only |
| DM-4.3 | E2E-21; UAT-CASH-04; CONC-PAY-001 | BLOCKED_NOT_IMPLEMENTED | Returns/gift cards absent |
| DM-4.4 | E2E-21; UAT-CASH-04 | BLOCKED_NOT_IMPLEMENTED | Exchange/return completion absent |
| DM-5.1 | E2E-25; UAT-PARTY-01 | BLOCKED_NOT_IMPLEMENTED | Party readiness only |
| DM-5.2 | E2E-26; UAT-PARTY-02; CONC-PTY-001 | BLOCKED_NOT_IMPLEMENTED | Party payments readiness only |
| DM-5.3 | E2E-27; UAT-PARTY-03 | BLOCKED_NOT_IMPLEMENTED | Operating order readiness only |
| DM-5.4 | E2E-28; UAT-GO-05; CONC-AST-001 | BLOCKED_NOT_IMPLEMENTED | Asset readiness only |
| DM-5.5 | E2E-28; UAT-PARTY-04; CONC-AST-001 | BLOCKED_NOT_IMPLEMENTED | Final close readiness only |
| DM-6.1 | E2E-29; UAT-ACCOUNT-04 | BLOCKED_NOT_IMPLEMENTED | Quotation absent |
| DM-6.2 | E2E-30; E2E-31; UAT-ACCOUNT-06 | BLOCKED_NOT_IMPLEMENTED | Reports/export absent |
| DM-6.3 | UAT-GO-05; FAIL-CHAOS-001 | BLOCKED_BY_ENVIRONMENT / HUMAN ACCEPTANCE | UAT not run |
| DM-6.4 | E2E-32; UAT-GO-04; FAIL-DR-001 | NOT READY FOR PRODUCTION | Release/DR gates absent |

## Workflow coverage ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â‚¬Å¡Ã‚Â¬ÃƒÂ¢Ã¢â€šÂ¬Ã‚Â 70 IDs from docs/** + testing/**

The ledger is the union of workflow IDs in source catalogs, excluding this generated file. It includes FLW-HELP-01, FLW-HELP-02, and FLW-INV-05.

| Workflow ID | Related scenario IDs | Automation Status | Mapping basis / gap |
|---|---|---|---|
| FLW-ADM-01 | E2E-01; UAT-ADM-01; UAT-MGR-01 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-ADM-02 | E2E-01; UAT-ADM-01 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-ADM-03 | E2E-02; UAT-ADM-01 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-ADM-04 | E2E-03; UAT-ADM-02 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-ADM-05 | E2E-02; E2E-07; UAT-ADM-01; UAT-ADM-03 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-ATT-01 | E2E-07; UAT-ADM-03 | PASS_LOCAL | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-ATT-02 | E2E-07; UAT-ADM-03 | PASS_LOCAL | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-AUD-01 | UAT-ADM-03; UAT-ACCOUNT-03 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-AUTH-01 | E2E-03; E2E-04; UAT-ADM-02; UAT-ACCOUNT-03; UAT-GO-06 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-AUTH-02 | E2E-04; UAT-ADM-02 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-CAT-01 | E2E-05; E2E-33; E2E-34; UAT-ADM-05; UAT-WH-05 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-CAT-02 | E2E-09; UAT-PUR-03 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-CAT-03 | E2E-13; UAT-PRICE-01 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-CAT-04 | E2E-13; UAT-PRICE-01; UAT-PRICE-02 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-CAT-05 | E2E-14; UAT-WH-04; UAT-PRICE-04; UAT-GO-03 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-CSH-01 | E2E-20; UAT-MGR-02 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-CSH-02 | E2E-20; UAT-MGR-02 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-CSH-03 | E2E-20; UAT-MGR-02 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-CUS-01 | E2E-22; E2E-37; UAT-PARTY-05 | BLOCKED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-CUS-02 | E2E-22; UAT-CASH-05 | BLOCKED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-CUS-03 | E2E-22; UAT-CASH-05 | BLOCKED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-CUS-04 | E2E-23; E2E-37; UAT-CASH-05; UAT-PARTY-05 | BLOCKED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-CUS-05 | E2E-23; E2E-37; UAT-PARTY-05 | BLOCKED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-DOC-01 | E2E-30; UAT-ACCOUNT-06 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-ERR-01 | E2E-07; SEC-012 | PASS_LOCAL | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-EXP-01 | E2E-30; UAT-ACCOUNT-06 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-HELP-01 | UAT-GO-06; FAIL-OBS-001 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-HELP-02 | UAT-GO-06; FAIL-OBS-001 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-INV-01 | E2E-15; E2E-34; UAT-WH-05 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-INV-02 | E2E-16; UAT-WH-03 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-INV-03 | E2E-15; UAT-WH-03 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-INV-04 | E2E-15; UAT-WH-03 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-INV-05 | E2E-15; UAT-WH-03 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-INV-06 | E2E-16; UAT-WH-03; UAT-COUNT-01 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-INV-07 | E2E-16; UAT-WH-03; UAT-COUNT-01; UAT-COUNT-02 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-NUM-01 | E2E-01; CONC-NUM-001 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-OFF-01 | E2E-24; UAT-CASH-05 | BLOCKED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-OFF-02 | E2E-24; CONC-OFF-001 | BLOCKED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-OFF-03 | E2E-24; CONC-OFF-001 | BLOCKED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-POS-01 | E2E-13; E2E-17; E2E-19; E2E-36; UAT-CASH-01; UAT-CASH-02; UAT-GO-03; UAT-CASH-06; UAT-GO-06 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-POS-02 | E2E-18; UAT-CASH-03 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-POS-03 | E2E-19; UAT-MGR-03; UAT-CASH-02; UAT-PRICE-03; UAT-GO-03 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-POS-04 | E2E-17; UAT-CASH-01 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-PRN-01 | E2E-36; UAT-CASH-06 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-PTY-01 | E2E-25; UAT-PARTY-01 | BLOCKED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-PTY-02 | E2E-25; UAT-PARTY-01 | BLOCKED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-PTY-03 | E2E-26; UAT-PARTY-02 | BLOCKED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-PTY-04 | E2E-27; UAT-PARTY-03 | BLOCKED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-PTY-05 | E2E-27; UAT-PARTY-03 | BLOCKED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-PTY-06 | E2E-28; UAT-GO-05 | BLOCKED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-PTY-07 | E2E-28; UAT-GO-05 | BLOCKED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-PTY-08 | E2E-28; UAT-GO-05 | BLOCKED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-PTY-09 | E2E-28; UAT-GO-05 | BLOCKED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-PTY-10 | E2E-28; UAT-GO-05 | BLOCKED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-PTY-11 | UAT-PARTY-04; UAT-GO-06 | BLOCKED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-PUR-01 | E2E-06; E2E-10; E2E-35; UAT-PUR-01; UAT-PUR-02; UAT-PUR-05 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-PUR-02 | E2E-11; E2E-33; E2E-35; UAT-PUR-04; UAT-WH-01; UAT-PUR-05 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-PUR-03 | E2E-12; UAT-WH-02 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-PWA-02 | E2E-23; UAT-CASH-05 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-QTN-01 | E2E-29; E2E-38; E2E-39; UAT-ACCOUNT-04; UAT-ACCOUNT-05; UAT-GO-06 | BLOCKED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-RET-01 | E2E-21; UAT-MGR-03; UAT-CASH-04 | BLOCKED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-RET-02 | E2E-21; UAT-CASH-04 | BLOCKED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-RET-03 | E2E-21; UAT-MGR-03; UAT-CASH-04 | BLOCKED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-RPT-01 | E2E-30; E2E-31; UAT-MGR-01; UAT-ACCOUNT-01 | BLOCKED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-RPT-02 | E2E-30; E2E-40; UAT-ACCOUNT-02; UAT-ACCOUNT-06 | BLOCKED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-RPT-03 | E2E-30; E2E-40; UAT-ADM-03; UAT-ACCOUNT-01; UAT-ACCOUNT-02; UAT-ACCOUNT-03; UAT-ACCOUNT-06 | BLOCKED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-SYS-01 | E2E-04; SEC-001 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-SYS-02 | E2E-04; SEC-001 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-SYS-03 | E2E-04; SEC-001 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |
| FLW-UI-01 | E2E-08; UAT-ADM-04 | PLANNED | E2E/UAT field or documented cross-cutting companion; no PASS is inferred. |

## Verification commands

Run from project root. Exclude this generated file from source-union discovery:

    $source = (Get-ChildItem docs,testing -Recurse -File | ? { $_.FullName -notlike '*UPDATED-TEST-COVERAGE-MATRIX.md' } | % { Get-Content $_.FullName -Raw } | Out-String)
    $knownReq = [regex]::Matches((Get-Content testing/02-traceability-matrix.md -Raw),'(?m)^\|\s*((?:MD|PRC|PUR|INV|POS|RET|CUS|CSH|PTY|AST|QTN|RPT|NFR)-\d{2})\s*\|') | % { $_.Groups[1].Value } | Sort-Object -Unique
    $knownDm = Get-ChildItem testing/results/milestones -Filter 'DM-*.md' | % BaseName | Sort-Object -Unique
    $knownWf = [regex]::Matches($source,'FLW-[A-Z0-9]+-[0-9]+') | % Value | Sort-Object -Unique
    $knownScenario = [regex]::Matches($source,'(?<![A-Z0-9])(?:E2E-[0-9]{2}|UAT-[A-Z0-9]+-[0-9]{2}|SEC-[0-9]{3}|CONC-[A-Z0-9]+-[0-9]{3}|FAIL-[A-Z0-9]+-[0-9]{3})(?![A-Z0-9])') | % Value | Sort-Object -Unique
    $doc = Get-Content testing/results/UPDATED-TEST-COVERAGE-MATRIX.md -Raw
    $reqLines = $doc -split [Environment]::NewLine | ? { $_ -match '^\|\s*(?:MD|PRC|PUR|INV|POS|RET|CUS|CSH|PTY|AST|QTN|RPT|NFR)-\d{2}\s*\|' }
    $reqRows = [regex]::Matches($doc,'(?m)^\|\s*((?:MD|PRC|PUR|INV|POS|RET|CUS|CSH|PTY|AST|QTN|RPT|NFR)-\d{2})\s*\|')
    $dmRows = [regex]::Matches($doc,'(?m)^\|\s*DM-\d+\.\d+\s*\|')
    $wfRows = [regex]::Matches($doc,'(?m)^\|\s*(FLW-[A-Z0-9]+-[0-9]+)\s*\|')
    $scenarioRefs = [regex]::Matches(($reqLines + ($doc -split [Environment]::NewLine | ? { $_ -match '^\|\s*FLW-' }) -join [Environment]::NewLine),'(?<![A-Z0-9])(?:E2E-[0-9]{2}|UAT-[A-Z0-9]+-[0-9]{2}|SEC-[0-9]{3}|CONC-[A-Z0-9]+-[0-9]{3}|FAIL-[A-Z0-9]+-[0-9]{3})(?![A-Z0-9])') | % Value | Sort-Object -Unique
    $unknown = @($scenarioRefs | ? { $_ -notin $knownScenario })
    $underTwo = @($reqLines | ? { ([regex]::Matches($_,'(?<![A-Z0-9])(?:E2E-[0-9]{2}|UAT-[A-Z0-9]+-[0-9]{2}|SEC-[0-9]{3}|CONC-[A-Z0-9]+-[0-9]{3}|FAIL-[A-Z0-9]+-[0-9]{3})(?![A-Z0-9])')).Count -lt 2 })
    'requirements=' + $reqRows.Count + '/' + $knownReq.Count
    'DM=' + $dmRows.Count + '/' + $knownDm.Count
    'workflows=' + $wfRows.Count + '/' + $knownWf.Count
    'unknown_scenario_ids=' + $unknown.Count
    'requirements_with_fewer_than_two_scenarios=' + $underTwo.Count

Expected: requirements=72/72, DM=25/25, workflows=70/70, unknown_scenario_ids=0, requirements_with_fewer_than_two_scenarios=0.
