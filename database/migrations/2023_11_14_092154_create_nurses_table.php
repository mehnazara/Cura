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
        Schema::create('nurses', function (Blueprint $table) {
            $table->id('nurse_id');
            $table->string('name');
            $table->char('phone')->unique();
            $table->string('qualifications');
            $table->enum('gender', ['male', 'female']);
            $table->integer('age');
            $table->string('photo');
            $table->string('served_patients')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nurses');
    }
};
