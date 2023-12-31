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
        Schema::create('card_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('credit_card_id');
            $table->unsignedInteger('client_id');
            $table->integer('sum')->default(0);
            $table->enum('type', ['SEPA', 'SWIFT'])->nullable();
            $table->enum('status', ['WAITING', 'HOLD', 'SUCCESS', 'CANCELED', 'VERIFICATION'])->default('WAITING');
            $table->timestamps();

            $table->foreign('credit_card_id')
                ->on('credit_cards')
                ->references('id')
                ->cascadeOnDelete();
            $table->foreign('client_id')
                ->on('clients')
                ->references('id')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_transactions');
    }
};
