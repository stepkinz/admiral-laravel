<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('company_settings', function (Blueprint $table) {
            $table->string('organizational_legal_form')->nullable()->after('legal_name');
            $table->text('full_company_name')->nullable()->after('organizational_legal_form');
        });
    }

    public function down(): void
    {
        Schema::table('company_settings', function (Blueprint $table) {
            $table->dropColumn(['organizational_legal_form', 'full_company_name']);
        });
    }
};
