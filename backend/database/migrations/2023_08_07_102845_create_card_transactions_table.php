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
            $table->decimal('sum', 10, 2)->default(0);
            $table->enum('type', ['SEPA', 'SWIFT'])->default('SEPA');
            $table->enum('status', ['OPEN', 'CLOSED'])->default('OPEN');
            $table->string('invoice_file')->nullable();
            $table->string('card_number')->nullable();
            $table->boolean('withdraw')->default(false);
            $table->timestamps();

            $table->foreign('credit_card_id')
                ->on('credit_cards')
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
