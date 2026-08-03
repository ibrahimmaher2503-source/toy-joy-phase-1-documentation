<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('document_sequences', function (Blueprint $table): void {
            $table->unique('document_type', 'document_sequences_document_type_unique');
        });
    }

    public function down(): void
    {
        Schema::table('document_sequences', function (Blueprint $table): void {
            $table->dropUnique('document_sequences_document_type_unique');
        });
    }
};
