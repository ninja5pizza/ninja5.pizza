<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::rename('inscriptions', 'ninja5_inscriptions');
    }

    public function down(): void
    {
        Schema::rename('ninja5_inscriptions', 'inscriptions');
    }
};
