<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('floor_prices', function (Blueprint $table) {
            $table->id();
            $table->string('symbol')->default('pizza-ninjas');
            $table->integer('owners')->unsigned()->nullable();
            $table->integer('supply')->unsigned()->nullable();
            $table->integer('listed')->unsigned()->nullable();
            $table->double('price_in_sats')->unsigned();
            $table->timestamp('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('floor_prices');
    }
};
