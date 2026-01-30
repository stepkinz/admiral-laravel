<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->id();
            $table->string('phone_number')->unique()->comment('Номер телефона');
            $table->text('description')->nullable()->comment('Описание/назначение номера');
            $table->boolean('is_active')->default(true)->comment('Активен');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('phones');
    }
};
