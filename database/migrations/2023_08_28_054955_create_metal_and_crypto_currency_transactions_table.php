<?php

use App\Models\Client\Client;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('metal_and_crypto_currency_transactions_table', function (Blueprint $table) {
            $table->id();

            $table->enum('type', ['1', '2'])->nullable();
            $table->enum('sort', ['XAU', 'XAG', 'XPT', 'BTC', 'ETH', 'BNB', 'ADA', 'DOT'])->nullable();
            $table->bigInteger('sum')->nullable();
            $table->boolean('withdraw')->default(false);
            $table->bigInteger('quantity')->nullable();

            $table->foreignIdFor(Client::class);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metal_and_crypto_currency_transactions_table');
    }
};
