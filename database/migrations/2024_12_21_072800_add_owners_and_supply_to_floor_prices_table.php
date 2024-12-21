<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('floor_prices', function (Blueprint $table) {
            $table->integer('owners')->unsigned()->nullable()->after('symbol');
            $table->integer('supply')->unsigned()->nullable()->after('owners');
            $table->integer('listed')->unsigned()->nullable()->after('supply');
        });
    }

    public function down(): void
    {
        Schema::table('floor_prices', function (Blueprint $table) {
            $table->dropColumn([
                'owners',
                'supply',
                'listed',
            ]);
        });
    }
};
