<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokpubTable extends Migration
{
    public function up()
    {
        Schema::create('dokpub', function (Blueprint $table) {
            $table->id(); // Kolom id otomatis
            $table->string('judul'); // Kolom judul
            $table->year('tahun'); // Kolom tahun
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('dokpub');
    }
};

