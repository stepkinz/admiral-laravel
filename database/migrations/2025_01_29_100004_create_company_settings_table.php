<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('company_settings', function (Blueprint $table) {
            $table->id();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->string('legal_name')->nullable();
            $table->string('inn')->nullable();
            $table->string('ogrn')->nullable();
            $table->string('kpp')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bik')->nullable();
            $table->string('checking_account')->nullable();
            $table->string('correspondent_account')->nullable();
            $table->string('director_name')->nullable();
            $table->timestamps();
        });

        // Одна запись по умолчанию для глобальных настроек
        DB::table('company_settings')->insert([
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('company_settings');
    }
};
