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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('uuid')->unique()->nullable();
            $table->string('phone');
            $table->string('access_token')->nullable();
            $table->boolean('is_active')->default(false);
            $table->string('auth_key')->nullable();
            $table->string('comments')->nullable();
            $table->decimal('balance', 10, 2)->default(0);
            $table->timestamp('last_visited')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
