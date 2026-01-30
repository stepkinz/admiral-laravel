<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('company_settings', function (Blueprint $table): void {
            $table->string('meta_title')->nullable()->after('correspondent_account');
            $table->string('meta_description', 512)->nullable()->after('meta_title');
            $table->text('seo_text')->nullable()->after('meta_description');
        });
    }

    public function down(): void
    {
        Schema::table('company_settings', function (Blueprint $table): void {
            $table->dropColumn(['meta_title', 'meta_description', 'seo_text']);
        });
    }
};
