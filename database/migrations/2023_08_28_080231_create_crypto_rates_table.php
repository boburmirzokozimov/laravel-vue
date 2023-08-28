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
        Schema::create('crypto_rates', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['BTC', 'ETH', 'BNB', 'ADA', 'DOT'])->nullable();
            $table->string('rate')->nullable();
            $table->string('diff')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crypto_rates');
    }
};
