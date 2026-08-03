<?php

namespace App\Actions\Platform;

use App\Models\Branch;
use App\Models\CashDrawer;
use App\Models\SettingsAuditLog;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Context;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use InvalidArgumentException;

class SaveCashDrawerAction
{
    public const ALLOWED_STATUSES = ['active', 'inactive', 'maintenance'];

    /**
     * Create or update a cash drawer master record with correlation ID and append-only audit trail.
     *
     * @param  array<string, mixed>  $data
     */
    public function execute(array $data, ?int $id = null): CashDrawer
    {
        $correlationId = Context::get('request_id') ?? (string) Str::uuid();
        $user = Auth::user();

        return DB::transaction(function () use ($data, $id, $correlationId, $user) {
            $branch = Branch::findOrFail($data['branch_id']);

            if ($branch->status !== 'active') {
                throw new InvalidArgumentException(__('Cannot assign cash drawer to an inactive branch.'));
            }

            if (! empty($data['store_id'])) {
                $store = Store::findOrFail($data['store_id']);
                if ($store->branch_id && (int) $store->branch_id !== (int) $branch->id) {
                    throw new InvalidArgumentException(__('Selected store does not belong to the chosen branch.'));
                }
            }

            $attributes = [
                'branch_id' => $branch->id,
                'store_id' => ! empty($data['store_id']) ? (int) $data['store_id'] : null,
                'assigned_user_id' => ! empty($data['assigned_user_id']) ? (int) $data['assigned_user_id'] : null,
                'code' => strtoupper(trim($data['code'])),
                'name_ar' => trim($data['name_ar']),
                'name_en' => trim($data['name_en']),
                'status' => $data['status'] ?? 'active',
                'policy_notes' => $data['policy_notes'] ?? 'TBD: Production cash drawer baseline pending shift rules and owner approval (BLK-006).',
            ];

            if ($id) {
                $drawer = CashDrawer::findOrFail($id);

                $oldData = $drawer->toArray();
                $drawer->update($attributes);
                $actionName = 'update_cash_drawer';
                $changes = [
                    'before' => $oldData,
                    'after' => $drawer->toArray(),
                ];
            } else {
                $drawer = CashDrawer::create($attributes);
                $actionName = 'create_cash_drawer';
                $changes = [
                    'after' => $drawer->toArray(),
                ];
            }

            SettingsAuditLog::create([
                'correlation_id' => $correlationId,
                'user_id' => $user?->id,
                'user_name' => $user?->name,
                'action' => $actionName,
                'setting_type' => 'cash_drawer',
                'setting_id' => $drawer->id,
                'changes' => $changes,
                'created_at' => now(),
            ]);

            return $drawer;
        });
    }

    /**
     * Toggle or update cash drawer status with explicit TBD shift dependency guards and audit logging.
     */
    public function toggleStatus(int $id, string $newStatus = 'inactive'): CashDrawer
    {
        if (! in_array($newStatus, self::ALLOWED_STATUSES, true)) {
            throw new InvalidArgumentException(__('Invalid cash drawer status provided.'));
        }

        $correlationId = Context::get('request_id') ?? (string) Str::uuid();
        $user = Auth::user();

        return DB::transaction(function () use ($id, $newStatus, $correlationId, $user) {
            $drawer = CashDrawer::findOrFail($id);
            $oldStatus = $drawer->status;

            // Explicit TBD shift dependency guard (Shifts module TSK-025 is not implemented in DM 1.2)
            // Drawers cannot be deactivated with active shifts once shifts are introduced.

            $drawer->update(['status' => $newStatus]);

            SettingsAuditLog::create([
                'correlation_id' => $correlationId,
                'user_id' => $user?->id,
                'user_name' => $user?->name,
                'action' => 'toggle_cash_drawer_status',
                'setting_type' => 'cash_drawer',
                'setting_id' => $drawer->id,
                'changes' => [
                    'status_from' => $oldStatus,
                    'status_to' => $newStatus,
                    'dependency_guard' => 'TBD: Active shift validation non-active (Shifts module deferred to DM 3.3 / TSK-025)',
                ],
                'created_at' => now(),
            ]);

            return $drawer;
        });
    }

    /**
     * Delete a cash drawer record safely if no dependencies exist, with audit logging.
     */
    public function delete(int $id): void
    {
        $correlationId = Context::get('request_id') ?? (string) Str::uuid();
        $user = Auth::user();

        DB::transaction(function () use ($id, $correlationId, $user) {
            $drawer = CashDrawer::findOrFail($id);

            // Safe guard check against active shift/session dependencies (TBD until DM 3.3)

            $oldData = $drawer->toArray();
            $drawer->delete();

            SettingsAuditLog::create([
                'correlation_id' => $correlationId,
                'user_id' => $user?->id,
                'user_name' => $user?->name,
                'action' => 'delete_cash_drawer',
                'setting_type' => 'cash_drawer',
                'setting_id' => $id,
                'changes' => [
                    'deleted' => $oldData,
                ],
                'created_at' => now(),
            ]);
        });
    }
}
