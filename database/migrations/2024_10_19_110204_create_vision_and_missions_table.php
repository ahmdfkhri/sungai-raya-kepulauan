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
        Schema::create('vision_and_missions', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['vision', 'mission']);
            $table->unsignedInteger('order');
            $table->text('value');
            $table->timestamps();

            $table->unique(['type', 'order']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vision_and_missions');
    }
};
