<?php

namespace App\Actions\Platform;

use App\Models\BranchSellingStore;
use App\Models\SettingsAuditLog;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Context;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use InvalidArgumentException;

class SaveStoreAction
{
    /**
     * Allowed store types.
     */
    public const ALLOWED_TYPES = [
        'selling',
        'warehouse',
        'party',
        'damaged',
        'transit',
    ];

    /**
     * Create or update a store record with correlation ID and audit logging.
     *
     * @param  array<string, mixed>  $data
     */
    public function execute(array $data, ?int $id = null): Store
    {
        $correlationId = Context::get('request_id') ?? (string) Str::uuid();
        $user = Auth::user();

        $type = $data['type'] ?? 'selling';
        if (!in_array($type, self::ALLOWED_TYPES, true)) {
            throw new InvalidArgumentException(__('Invalid store type specified.'));
        }

        return DB::transaction(function () use ($data, $id, $type, $correlationId, $user) {
            $attributes = [
                'branch_id' => isset($data['branch_id']) && $data['branch_id'] !== '' ? (int) $data['branch_id'] : null,
                'code' => strtoupper(trim($data['code'])),
                'type' => $type,
                'name_ar' => trim($data['name_ar']),
                'name_en' => trim($data['name_en']),
                'status' => $data['status'] ?? 'active',
                'allows_negative_stock' => (bool) ($data['allows_negative_stock'] ?? false),
                'policy_notes' => $data['policy_notes'] ?? 'TBD: Production store and inventory policy pending owner decision (BLK-006 / DEC-021).',
            ];

            if ($id) {
                $store = Store::findOrFail($id);

                // If deactivating, guard against active selling store mapping
                if ($attributes['status'] === 'inactive' && $store->status === 'active') {
                    if (BranchSellingStore::where('store_id', $store->id)->where('status', 'active')->exists()) {
                        throw new InvalidArgumentException(__('Cannot deactivate store while it is actively mapped to a branch as POS selling store.'));
                    }
                }

                $oldData = $store->toArray();
                $store->update($attributes);
                $actionName = 'update_store';
                $changes = [
                    'before' => $oldData,
                    'after' => $store->toArray(),
                ];
            } else {
                $store = Store::create($attributes);
                $actionName = 'create_store';
                $changes = [
                    'after' => $store->toArray(),
                ];
            }

            SettingsAuditLog::create([
                'correlation_id' => $correlationId,
                'user_id' => $user?->id,
                'user_name' => $user?->name,
                'action' => $actionName,
                'setting_type' => 'store',
                'setting_id' => $store->id,
                'changes' => $changes,
                'created_at' => now(),
            ]);

            return $store;
        });
    }

    /**
     * Toggle store status (active / inactive) with dependency checks and audit logging.
     */
    public function toggleStatus(int $id): Store
    {
        $correlationId = Context::get('request_id') ?? (string) Str::uuid();
        $user = Auth::user();

        return DB::transaction(function () use ($id, $correlationId, $user) {
            $store = Store::findOrFail($id);
            $newStatus = $store->status === 'active' ? 'inactive' : 'active';

            if ($newStatus === 'inactive') {
                if (BranchSellingStore::where('store_id', $store->id)->where('status', 'active')->exists()) {
                    throw new InvalidArgumentException(__('Cannot deactivate store while it is actively mapped to a branch as POS selling store.'));
                }
            }

            $oldStatus = $store->status;
            $store->update(['status' => $newStatus]);

            SettingsAuditLog::create([
                'correlation_id' => $correlationId,
                'user_id' => $user?->id,
                'user_name' => $user?->name,
                'action' => 'toggle_store_status',
                'setting_type' => 'store',
                'setting_id' => $store->id,
                'changes' => [
                    'status_from' => $oldStatus,
                    'status_to' => $newStatus,
                ],
                'created_at' => now(),
            ]);

            return $store;
        });
    }

    /**
     * Delete store record safely if no selling mappings exist.
     */
    public function delete(int $id): void
    {
        $correlationId = Context::get('request_id') ?? (string) Str::uuid();
        $user = Auth::user();

        DB::transaction(function () use ($id, $correlationId, $user) {
            $store = Store::findOrFail($id);

            if ($store->sellingStoreMappings()->exists()) {
                throw new InvalidArgumentException(__('Cannot delete store with active or historical branch mapping records. Deactivate the record instead.'));
            }

            $oldData = $store->toArray();
            $store->delete();

            SettingsAuditLog::create([
                'correlation_id' => $correlationId,
                'user_id' => $user?->id,
                'user_name' => $user?->name,
                'action' => 'delete_store',
                'setting_type' => 'store',
                'setting_id' => $id,
                'changes' => [
                    'deleted' => $oldData,
                ],
                'created_at' => now(),
            ]);
        });
    }
}
