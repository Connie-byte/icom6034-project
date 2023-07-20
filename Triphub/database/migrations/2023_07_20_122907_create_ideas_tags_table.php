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
        Schema::create('ideas_tags', function (Blueprint $table) {
            $table->string('tagName');
            $table->unsignedBigInteger('ideaId');
            
            $table->primary(['tagName', 'ideaId']);
            $table->foreign('ideaId')->references('ideaId')->on('ideas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ideas_tags');
    }
};
