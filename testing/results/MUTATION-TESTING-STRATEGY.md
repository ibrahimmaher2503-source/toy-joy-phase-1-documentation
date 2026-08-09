# Mutation Testing Strategy

Audit date: 2026-08-08  
Scope: deterministic mutation checks for current financial and inventory rules.

## Tool availability

| Check | Evidence | Status |
|---|---|---|
| `infection --version` | PowerShell `Get-Command infection` returned `infection command not found`. | BLOCKED_BY_ENVIRONMENT |
| `vendor/bin/infection --version` | `vendor/bin/infection not found`. | BLOCKED_BY_ENVIRONMENT |
| Dependency installation | Not attempted; no dependency or `composer.phar` change authorized. | Not run |

## Intended mutation targets

When Infection is available in a reviewed environment, run it only against the current rule-bearing code and use the deterministic tests below as the initial mutation kill set:

| Target | Required killed mutations | Test evidence |
|---|---|---|
| `PurchaseInvoiceCalculator::calculateLine` | quantity/cost sign checks, discount ordering, percentage/amount branch, tax rejection, gross/total arithmetic, decimal normalization. | `PurchaseInvoiceCalculatorPropertyTest` |
| `PostInventoryMovement::execute` | zero/invalid quantity, negative-stock guard, WAC/value update, idempotency replay. | `InventoryBalancePropertyTest`, existing inventory integrity tests |
| `RetailSaleAction::create/finalize` | active shift/store scope, unpriced/stock rejection, barcode/product lookup, one movement/number, replay. | existing Retail integrity and suspended/barcode tests |
| `OpenPricePolicy::validate` | permission/offline/reason/minimum/maximum boundaries. | existing `OpenPricePolicyTest` |
| Inventory/route contract | route removal, missing auth/verified/can middleware, wrong endpoint names. | `InventoryPosContractTest` |

## Execution policy

Do not convert a surviving mutant into a weaker assertion. Install/enable Infection only after owner approval and dependency lock review. A future run must record command, Infection version, target files, mutation score, survived mutants, killed mutants, timeout/errors, and environment. Until then this strategy is `BLOCKED_BY_ENVIRONMENT`, not a mutation-testing pass.
