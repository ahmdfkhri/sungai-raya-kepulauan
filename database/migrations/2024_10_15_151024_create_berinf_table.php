<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBerinfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berinf', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('thumbnail', 255);
            $table->string('title', 255);
            $table->string('category', 100);
            $table->unsignedBigInteger('views')->default(0);
            $table->boolean('highlight')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berinf');
    }
}
