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
        Schema::create('ideas_comments', function (Blueprint $table) {
            $table->id('commentId');
            $table->unsignedBigInteger('ideaId');
            $table->string('username', 50);
            $table->dateTime('date');
            $table->string('content', 255);

            $table->foreign('ideaId')->references('ideaId')->on('ideas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ideas_comments');
    }
};
