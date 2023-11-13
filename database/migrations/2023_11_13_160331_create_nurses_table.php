<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNursesTable extends Migration
{
    public function up()
    {
        Schema::create('nurses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('qualification');
            $table->text('description')->nullable();
            // Add other fields as needed
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nurses');
    }
}