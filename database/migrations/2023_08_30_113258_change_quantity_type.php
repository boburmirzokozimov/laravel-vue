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
        Schema::rename('metal_and_crypto_currency_transactions_table', 'metal_and_crypto_currency_transactions');
        Schema::table('metal_and_crypto_currency_transactions', function (Blueprint $table) {
            $table->dropColumn('quantity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('metal_and_crypto_currency_transactions_table', function (Blueprint $table) {
            $table->dropColumn('quantity');
        });
    }
};
