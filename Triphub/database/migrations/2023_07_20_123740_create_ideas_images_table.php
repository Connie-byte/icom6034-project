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
        Schema::create('ideas_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ideaId');
            $table->string('path', 255);

            $table->foreign('ideaId')->references('id')->on('ideas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ideas_images');
    }
};
