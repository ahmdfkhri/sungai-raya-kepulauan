<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiTable extends Migration
{
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id(); // Kolom id primary key, auto increment
            $table->string('nama_pegawai', 100); // Kolom nama_pegawai (varchar 100)
            $table->string('jabatan', 100); // Kolom jabatan (varchar 100)
            $table->string('foto')->nullable(); // Kolom foto (bisa kosong/null)
            $table->enum('level', ['staff', 'sekretaris', 'camat']); // Kolom level dengan enum values
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
};
