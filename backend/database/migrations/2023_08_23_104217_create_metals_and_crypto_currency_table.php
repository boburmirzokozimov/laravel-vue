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
        Schema::create('metals_and_crypto_currency', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Client::class);
            $table->string('card_type');
            $table->bigInteger('balance');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metals_and_crypto_currency');
    }
};
