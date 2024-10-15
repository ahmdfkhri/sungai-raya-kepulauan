<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentTable extends Migration
{
    public function up()
    {
        Schema::create('content', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('values'); // Kolom 'values'
            $table->string('type'); // Kolom 'type'
            $table->integer('order'); // Kolom 'order'
            $table->timestamps(); // Kolom 'created_at' dan 'updated_at'
        });
    }

    public function down()
    {
        Schema::dropIfExists('content');
    }
}

