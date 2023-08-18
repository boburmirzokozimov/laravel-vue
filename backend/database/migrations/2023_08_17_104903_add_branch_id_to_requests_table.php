<?php

use App\Models\Branch\Branch;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('balance_requests', function (Blueprint $table) {
            $table->foreignIdFor(Branch::class)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('balance_requests', function (Blueprint $table) {
            $table->dropForeignIdFor(Branch::class);
        });
    }
};
