<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBerinfTable extends Migration
{
    public function up()
    {
        Schema::create('berinf', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('foto'); // Kolom 'foto'
            $table->string('judul'); // Kolom 'judul'
            $table->boolean('hight'); // Kolom 'hight' sebagai boolean
            $table->unsignedBigInteger('content_id'); // Kolom Foreign Key 'content_id'
            $table->foreign('content_id')->references('id')->on('content')->onDelete('cascade'); // Foreign Key Reference
            $table->timestamps(); // Kolom 'created_at' dan 'updated_at'
        });
    }

    public function down()
    {
        Schema::dropIfExists('berinf');
    }
}
