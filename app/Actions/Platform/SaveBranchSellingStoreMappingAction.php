<?php

namespace App\Actions\Platform;

use App\Models\Branch;
use App\Models\BranchSellingStore;
use App\Models\SettingsAuditLog;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Context;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use InvalidArgumentException;

class SaveBranchSellingStoreMappingAction
{
    /**
     * Map a branch to a POS selling store with strict effective date ordering, duplicate prevention, DB transaction, correlation ID, and audit log.
     */
    public function execute(int $branchId, int $storeId, ?string $approvalNotes = null): BranchSellingStore
    {
        $correlationId = Context::get('request_id') ?? (string) Str::uuid();
        $user = Auth::user();

        return DB::transaction(function () use ($branchId, $storeId, $approvalNotes, $correlationId, $user) {
            $branch = Branch::findOrFail($branchId);
            if ($branch->status !== 'active') {
                throw new InvalidArgumentException(__('Branch must be active to map a POS selling store.'));
            }

            $store = Store::findOrFail($storeId);
            if ($store->type !== 'selling') {
                throw new InvalidArgumentException(__('Selected store must be of type Selling Store.'));
            }

            if ($store->status !== 'active') {
                throw new InvalidArgumentException(__('Selected selling store must be active.'));
            }

            // Check if this branch is already actively mapped to this exact store
            $currentActive = BranchSellingStore::where('branch_id', $branch->id)
                ->where('status', 'active')
                ->first();

            if ($currentActive && $currentActive->store_id === $store->id) {
                return $currentActive;
            }

            $now = now();

            // Close existing active mapping for this branch cleanly with effective_to ordering
            if ($currentActive) {
                $currentActive->update([
                    'status' => 'inactive',
                    'effective_to' => $now,
                ]);
            }

            // Create new active mapping record
            $mapping = BranchSellingStore::create([
                'branch_id' => $branch->id,
                'store_id' => $store->id,
                'effective_from' => $now,
                'effective_to' => null,
                'status' => 'active',
                'approval_notes' => $approvalNotes ?: 'TBD: Reversible local selling store mapping update.',
                'created_by' => $user?->id,
            ]);

            SettingsAuditLog::create([
                'correlation_id' => $correlationId,
                'user_id' => $user?->id,
                'user_name' => $user?->name,
                'action' => 'map_branch_selling_store',
                'setting_type' => 'branch_selling_store',
                'setting_id' => $mapping->id,
                'changes' => [
                    'branch_id' => $branch->id,
                    'store_id' => $store->id,
                    'effective_from' => $mapping->effective_from?->toIso8601String(),
                    'approval_notes' => $approvalNotes,
                ],
                'created_at' => $now,
            ]);

            return $mapping;
        });
    }
}
