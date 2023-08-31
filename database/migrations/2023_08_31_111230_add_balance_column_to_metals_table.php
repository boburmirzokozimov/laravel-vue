<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('metals', function (Blueprint $table) {
            $table->double('balance')->nullable();
        });
        Schema::table('crypto_currencies', function (Blueprint $table) {
            $table->double('balance')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('metals', function (Blueprint $table) {
            //
        });
    }
};
