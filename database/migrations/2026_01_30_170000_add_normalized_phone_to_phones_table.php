<?php

declare(strict_types=1);

use App\Services\PhoneNormalizer;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('phones', function (Blueprint $table) {
            $table->string('normalized_phone', 20)->nullable()->after('phone_number');
        });

        foreach (DB::table('phones')->get() as $row) {
            $normalized = PhoneNormalizer::normalize((string) $row->phone_number);
            if ($normalized !== '') {
                DB::table('phones')->where('id', $row->id)->update(['normalized_phone' => $normalized]);
            }
        }

        Schema::table('phones', function (Blueprint $table) {
            $table->index(['is_active', 'normalized_phone']);
        });
    }

    public function down(): void
    {
        Schema::table('phones', function (Blueprint $table) {
            $table->dropIndex(['is_active', 'normalized_phone']);
            $table->dropColumn('normalized_phone');
        });
    }
};
