<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'branch_id',
        'code',
        'type',
        'name_ar',
        'name_en',
        'status',
        'allows_negative_stock',
        'policy_notes',
    ];

    protected $casts = [
        'allows_negative_stock' => 'boolean',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function sellingStoreMappings(): HasMany
    {
        return $this->hasMany(BranchSellingStore::class);
    }

    public function cashDrawers(): HasMany
    {
        return $this->hasMany(CashDrawer::class);
    }
}
