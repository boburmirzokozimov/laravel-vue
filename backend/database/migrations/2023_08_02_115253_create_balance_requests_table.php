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
        Schema::create('balance_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('client_id');
            $table->string('country')->nullable();
            $table->string('currency')->nullable();
            $table->enum('type', ['CASH', 'CASHLESS', 'USDT']);
            $table->enum('status', ['OPEN', 'CLOSED'])->default('OPEN');
            $table->string('usdt_type')->nullable();
            $table->string('contact')->nullable();
            $table->string('phone')->nullable();
            $table->text('info')->nullable();
            $table->string('withdraw_account_number')->nullable();
            $table->string('withdraw_wallet_number')->nullable();
            $table->boolean('withdraw')->default(false);
            $table->decimal('sum', 10, 2)->default(0);
            $table->timestamps();

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
        Schema::dropIfExists('balance_requests');
    }
};
