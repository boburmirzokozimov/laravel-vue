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
        Schema::create('credit_cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('client_id');
            $table->string('card_number');
            $table->string('expire_date');
            $table->decimal('balance', 10, 2)->default(0);
            $table->unsignedInteger('credit_card_request_id');
            $table->timestamps();

            $table->foreign('client_id')
                ->on('clients')
                ->references('id')
                ->cascadeOnDelete();

            $table->foreign('credit_card_request_id')
                ->on('credit_card_requests')
                ->references('id')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credit_cards');
    }
};
