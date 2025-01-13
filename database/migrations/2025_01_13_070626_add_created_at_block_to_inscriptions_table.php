<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('inscriptions', function (Blueprint $table) {
            $table->unsignedMediumInteger('created_at_block')
                ->nullable()
                ->after('meta');
        });
    }

    public function down(): void
    {
        Schema::table('inscriptions', function (Blueprint $table) {
            $table->dropColumn('created_at_block');
        });
    }
};
