<?php

use App\Models\Client\BalanceRequest;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('metal_and_crypto_currency_transactions', function (Blueprint $table) {
            $table->foreignIdFor(BalanceRequest::class)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('metal_and_crypto_currency_transactions', function (Blueprint $table) {
            $table->dropForeignIdFor(BalanceRequest::class);
        });
    }
};
