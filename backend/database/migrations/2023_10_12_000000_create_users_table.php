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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable();
            $table->string('phone')->unique();
            $table->string('country')->nullable();
            $table->boolean('is_active')->default(false);
            $table->boolean('is_banned')->default(false);
            $table->unsignedInteger('role_id')->nullable();
            $table->string('login_code')->nullable();
            $table->timestamp('last_visited')->nullable();
            $table->timestamps();

            $table->foreign('role_id')
                ->on('roles')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
