<?php

namespace App\Actions\Platform;

use App\Models\Branch;
use App\Models\SettingsAuditLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Context;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use InvalidArgumentException;

class SaveBranchAction
{
    /**
     * Create or update a branch record with correlation ID and append-only audit trail.
     *
     * @param  array<string, mixed>  $data
     */
    public function execute(array $data, ?int $id = null): Branch
    {
        $correlationId = Context::get('request_id') ?? (string) Str::uuid();
        $user = Auth::user();

        return DB::transaction(function () use ($data, $id, $correlationId, $user) {
            $attributes = [
                'code' => strtoupper(trim($data['code'])),
                'name_ar' => trim($data['name_ar']),
                'name_en' => trim($data['name_en']),
                'phone' => isset($data['phone']) && $data['phone'] !== '' ? trim($data['phone']) : null,
                'email' => isset($data['email']) && $data['email'] !== '' ? trim($data['email']) : null,
                'address' => isset($data['address']) && $data['address'] !== '' ? trim($data['address']) : null,
                'timezone' => $data['timezone'] ?? 'UTC',
                'status' => $data['status'] ?? 'active',
                'policy_notes' => $data['policy_notes'] ?? 'TBD: Production branch details pending owner approval (BLK-006).',
            ];

            if ($id) {
                $branch = Branch::findOrFail($id);

                if ($attributes['status'] === 'inactive' && $branch->status === 'active') {
                    if ($branch->stores()->where('status', 'active')->exists() || $branch->activeSellingStoreMapping()->exists()) {
                        throw new InvalidArgumentException(__('Cannot deactivate branch while it has active stores or an active selling store mapping.'));
                    }
                }

                $oldData = $branch->toArray();
                $branch->update($attributes);
                $actionName = 'update_branch';
                $changes = [
                    'before' => $oldData,
                    'after' => $branch->toArray(),
                ];
            } else {
                $branch = Branch::create($attributes);
                $actionName = 'create_branch';
                $changes = [
                    'after' => $branch->toArray(),
                ];
            }

            SettingsAuditLog::create([
                'correlation_id' => $correlationId,
                'user_id' => $user?->id,
                'user_name' => $user?->name,
                'action' => $actionName,
                'setting_type' => 'branch',
                'setting_id' => $branch->id,
                'changes' => $changes,
                'created_at' => now(),
            ]);

            return $branch;
        });
    }

    /**
     * Toggle branch status (active / inactive) with dependency checks and audit logging.
     */
    public function toggleStatus(int $id): Branch
    {
        $correlationId = Context::get('request_id') ?? (string) Str::uuid();
        $user = Auth::user();

        return DB::transaction(function () use ($id, $correlationId, $user) {
            $branch = Branch::findOrFail($id);
            $newStatus = $branch->status === 'active' ? 'inactive' : 'active';

            if ($newStatus === 'inactive') {
                if ($branch->stores()->where('status', 'active')->exists() || $branch->activeSellingStoreMapping()->exists()) {
                    throw new InvalidArgumentException(__('Cannot deactivate branch while it has active stores or an active selling store mapping.'));
                }
            }

            $oldStatus = $branch->status;
            $branch->update(['status' => $newStatus]);

            SettingsAuditLog::create([
                'correlation_id' => $correlationId,
                'user_id' => $user?->id,
                'user_name' => $user?->name,
                'action' => 'toggle_branch_status',
                'setting_type' => 'branch',
                'setting_id' => $branch->id,
                'changes' => [
                    'status_from' => $oldStatus,
                    'status_to' => $newStatus,
                ],
                'created_at' => now(),
            ]);

            return $branch;
        });
    }

    /**
     * Delete a branch record safely if no dependencies exist, with audit logging.
     */
    public function delete(int $id): void
    {
        $correlationId = Context::get('request_id') ?? (string) Str::uuid();
        $user = Auth::user();

        DB::transaction(function () use ($id, $correlationId, $user) {
            $branch = Branch::findOrFail($id);

            if ($branch->stores()->exists() || $branch->sellingStoreMappings()->exists()) {
                throw new InvalidArgumentException(__('Cannot delete branch with existing stores or mapping history. Deactivate the record instead.'));
            }

            $oldData = $branch->toArray();
            $branch->delete();

            SettingsAuditLog::create([
                'correlation_id' => $correlationId,
                'user_id' => $user?->id,
                'user_name' => $user?->name,
                'action' => 'delete_branch',
                'setting_type' => 'branch',
                'setting_id' => $id,
                'changes' => [
                    'deleted' => $oldData,
                ],
                'created_at' => now(),
            ]);
        });
    }
}
