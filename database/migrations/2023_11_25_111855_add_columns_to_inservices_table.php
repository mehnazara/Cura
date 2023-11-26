<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('inservices', function (Blueprint $table) {
            $table->enum('payment_method', ['Cash After Service', 'Prepaid Online'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inservices', function (Blueprint $table) {
            $table->dropColumn('payment_method');
        });
    }
};
