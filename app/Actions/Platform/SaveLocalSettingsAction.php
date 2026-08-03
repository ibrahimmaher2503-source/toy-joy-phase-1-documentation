<?php

namespace App\Actions\Platform;

use App\Models\Company;
use App\Models\DocumentSequence;
use App\Models\PaymentMethod;
use App\Models\PrinterConfiguration;
use App\Models\SettingsAuditLog;
use App\Models\TaxSetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Context;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SaveLocalSettingsAction
{
    /**
     * Execute local settings save/update with correlation ID and append-only audit log.
     *
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    public function execute(array $data): array
    {
        $correlationId = Context::get('request_id') ?? (string) Str::uuid();
        $user = Auth::user();

        return DB::transaction(function () use ($data, $correlationId, $user) {
            // 1. Company identity update or create
            $companyData = [
                'code' => $data['company']['code'] ?? 'TBD',
                'name_ar' => $data['company']['name_ar'] ?? null,
                'name_en' => $data['company']['name_en'] ?? null,
                'legal_name' => $data['company']['legal_name'] ?? null,
                'tax_number' => $data['company']['tax_number'] ?? null,
                'commercial_registration' => $data['company']['commercial_registration'] ?? null,
                'currency_code' => $data['company']['currency_code'] ?? 'TBD',
                'currency_symbol' => $data['company']['currency_symbol'] ?? 'TBD',
                'timezone' => $data['company']['timezone'] ?? 'UTC',
                'locale_default' => $data['company']['locale_default'] ?? 'ar',
                'phone' => $data['company']['phone'] ?? null,
                'email' => $data['company']['email'] ?? null,
                'address' => $data['company']['address'] ?? null,
                'status' => $data['company']['status'] ?? 'active',
                'policy_notes' => $data['company']['policy_notes'] ?? 'TBD: Production company legal and currency policy pending owner decision.',
            ];

            $company = Company::first();
            if ($company) {
                $company->update($companyData);
            } else {
                $company = Company::create($companyData);
            }

            // 2. Settings audit record for successful write
            SettingsAuditLog::create([
                'correlation_id' => $correlationId,
                'user_id' => $user?->id,
                'user_name' => $user?->name,
                'action' => 'update_local_settings',
                'setting_type' => 'company',
                'setting_id' => $company->id,
                'changes' => $companyData,
                'created_at' => now(),
            ]);

            return [
                'success' => true,
                'correlation_id' => $correlationId,
                'company' => $company,
            ];
        });
    }

    /**
     * Create or update a payment method setting.
     *
     * @param  array<string, mixed>  $data
     */
    public function savePaymentMethod(array $data, ?int $id = null): PaymentMethod
    {
        $correlationId = Context::get('request_id') ?? (string) Str::uuid();
        $user = Auth::user();

        return DB::transaction(function () use ($data, $id, $correlationId, $user) {
            $attributes = [
                'code' => strtoupper($data['code']),
                'name_ar' => $data['name_ar'],
                'name_en' => $data['name_en'],
                'type' => $data['type'] ?? 'manual',
                'requires_evidence' => (bool) ($data['requires_evidence'] ?? false),
                'offline_eligible' => (bool) ($data['offline_eligible'] ?? false),
                'status' => $data['status'] ?? 'active',
                'policy_notes' => $data['policy_notes'] ?? 'TBD',
            ];

            if ($id) {
                $method = PaymentMethod::findOrFail($id);
                $method->update($attributes);
                $action = 'update_payment_method';
            } else {
                $method = PaymentMethod::create($attributes);
                $action = 'create_payment_method';
            }

            SettingsAuditLog::create([
                'correlation_id' => $correlationId,
                'user_id' => $user?->id,
                'user_name' => $user?->name,
                'action' => $action,
                'setting_type' => 'payment_method',
                'setting_id' => $method->id,
                'changes' => $attributes,
                'created_at' => now(),
            ]);

            return $method;
        });
    }

    /**
     * Create or update a tax setting.
     *
     * @param  array<string, mixed>  $data
     */
    public function saveTaxSetting(array $data, ?int $id = null): TaxSetting
    {
        $correlationId = Context::get('request_id') ?? (string) Str::uuid();
        $user = Auth::user();

        return DB::transaction(function () use ($data, $id, $correlationId, $user) {
            $attributes = [
                'code' => strtoupper($data['code']),
                'name_ar' => $data['name_ar'],
                'name_en' => $data['name_en'],
                'rate' => $data['rate'] !== null && $data['rate'] !== '' ? $data['rate'] : null,
                'is_tax_inclusive' => (bool) ($data['is_tax_inclusive'] ?? false),
                'tax_number' => $data['tax_number'] ?? null,
                'status' => $data['status'] ?? 'active',
                'policy_notes' => $data['policy_notes'] ?? 'TBD: Production tax policy pending owner approval.',
            ];

            if ($id) {
                $tax = TaxSetting::findOrFail($id);
                $tax->update($attributes);
                $action = 'update_tax_setting';
            } else {
                $tax = TaxSetting::create($attributes);
                $action = 'create_tax_setting';
            }

            SettingsAuditLog::create([
                'correlation_id' => $correlationId,
                'user_id' => $user?->id,
                'user_name' => $user?->name,
                'action' => $action,
                'setting_type' => 'tax_setting',
                'setting_id' => $tax->id,
                'changes' => $attributes,
                'created_at' => now(),
            ]);

            return $tax;
        });
    }

    /**
     * Create or update a document sequence.
     *
     * @param  array<string, mixed>  $data
     */
    public function saveDocumentSequence(array $data, ?int $id = null): DocumentSequence
    {
        $correlationId = Context::get('request_id') ?? (string) Str::uuid();
        $user = Auth::user();

        return DB::transaction(function () use ($data, $id, $correlationId, $user) {
            $attributes = [
                'document_type' => $data['document_type'],
                'prefix' => $data['prefix'] ?? null,
                'suffix' => $data['suffix'] ?? null,
                'padding_length' => (int) ($data['padding_length'] ?? 6),
                'next_value' => (int) ($data['next_value'] ?? 1),
                'reset_rule' => $data['reset_rule'] ?? 'never',
                'status' => $data['status'] ?? 'active',
                'policy_notes' => $data['policy_notes'] ?? 'TBD',
            ];

            if ($id) {
                $seq = DocumentSequence::findOrFail($id);
                $seq->update($attributes);
                $action = 'update_document_sequence';
            } else {
                $seq = DocumentSequence::create($attributes);
                $action = 'create_document_sequence';
            }

            SettingsAuditLog::create([
                'correlation_id' => $correlationId,
                'user_id' => $user?->id,
                'user_name' => $user?->name,
                'action' => $action,
                'setting_type' => 'document_sequence',
                'setting_id' => $seq->id,
                'changes' => $attributes,
                'created_at' => now(),
            ]);

            return $seq;
        });
    }

    /**
     * Create or update a printer configuration.
     *
     * @param  array<string, mixed>  $data
     */
    public function savePrinterConfiguration(array $data, ?int $id = null): PrinterConfiguration
    {
        $correlationId = Context::get('request_id') ?? (string) Str::uuid();
        $user = Auth::user();

        return DB::transaction(function () use ($data, $id, $correlationId, $user) {
            $attributes = [
                'name' => $data['name'],
                'printer_type' => $data['printer_type'] ?? 'thermal',
                'paper_size' => $data['paper_size'] ?? '80mm',
                'template_name' => $data['template_name'] ?? 'default_thermal',
                'connection_type' => $data['connection_type'] ?? 'network',
                'ip_address' => $data['ip_address'] ?? null,
                'port' => $data['port'] !== null && $data['port'] !== '' ? (int) $data['port'] : null,
                'is_default' => (bool) ($data['is_default'] ?? false),
                'status' => $data['status'] ?? 'active',
                'notes' => $data['notes'] ?? 'TBD',
            ];

            if ($id) {
                $printer = PrinterConfiguration::findOrFail($id);
                $printer->update($attributes);
                $action = 'update_printer_configuration';
            } else {
                $printer = PrinterConfiguration::create($attributes);
                $action = 'create_printer_configuration';
            }

            SettingsAuditLog::create([
                'correlation_id' => $correlationId,
                'user_id' => $user?->id,
                'user_name' => $user?->name,
                'action' => $action,
                'setting_type' => 'printer_configuration',
                'setting_id' => $printer->id,
                'changes' => $attributes,
                'created_at' => now(),
            ]);

            return $printer;
        });
    }
}
