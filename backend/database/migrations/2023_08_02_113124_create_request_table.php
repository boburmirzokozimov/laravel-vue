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
        Schema::create('credit_card_request', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('middle_name');
            $table->unsignedInteger('client_id');
            $table->boolean('status')->default(false);
            $table->string('phone');
            $table->string('scan_passport');
            $table->string('selfie_passport');
            $table->timestamp('birth_date');
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
        Schema::dropIfExists('credit_card_request');
    }
};
