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
        Schema::create('pending_payment', function (Blueprint $table) {
            $table->id('payment_id');
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('patient_id')->on('patients')->onDelete('cascade');
            $table->unsignedBigInteger('nurse_id');
            $table->foreign('nurse_id')->references('nurse_id')->on('nurses')->onDelete('cascade');
            $table->string('service_type');
            $table->date('service_start');
            $table->date('service_end');
            $table->integer('amount');
            $table->enum('payment_status', ['Incomplete', 'Success'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pending_payment');
    }
};
