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
        Schema::create('credit_card_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('client_id');
            $table->enum('status', ['PENDING', 'RELEASED'])->default('PENDING');
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('phone')->nullable();
            $table->timestamp('birth_date')->nullable();
            $table->string('scan_passport')->nullable();
            $table->string('selfie_passport')->nullable();
            $table->boolean('anonymous')->default(false);
            $table->string('anonymous_surname')->nullable();
            $table->string('anonymous_name')->nullable();
            $table->timestamps();

            $table
                ->foreign('client_id')
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
        Schema::dropIfExists('credit_card_requests');
    }
};
