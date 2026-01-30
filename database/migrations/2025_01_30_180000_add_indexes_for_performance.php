<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->index('status');
            $table->index('created_at');
        });

        Schema::table('reviews', function (Blueprint $table) {
            $table->index('is_visible');
            $table->index('review_date');
        });

        Schema::table('faqs', function (Blueprint $table) {
            $table->index('sort_order');
        });

        Schema::table('employees', function (Blueprint $table) {
            $table->index('is_active');
        });
    }

    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropIndex(['status']);
            $table->dropIndex(['created_at']);
        });

        Schema::table('reviews', function (Blueprint $table) {
            $table->dropIndex(['is_visible']);
            $table->dropIndex(['review_date']);
        });

        Schema::table('faqs', function (Blueprint $table) {
            $table->dropIndex(['sort_order']);
        });

        Schema::table('employees', function (Blueprint $table) {
            $table->dropIndex(['is_active']);
        });
    }
};
