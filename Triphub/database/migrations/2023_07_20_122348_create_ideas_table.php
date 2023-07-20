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
        Schema::create('ideas', function (Blueprint $table) {
            $table->id('ideaId');
            $table->string('title', 50);
            $table->string('destination', 50);
            $table->float('lat');
            $table->float('lng');
            $table->string('image', 255)->nullable();
            $table->dateTime('startDate');
            $table->dateTime('endDate');
            $table->string('content', 255);
            $table->unsignedBigInteger('AccommodationId')->nullable();
            $table->string('username', 255);
            $table->timestamps();

            $table->foreign('AccommodationId')->references('AccomodationId')->on('accommodations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ideas');
    }
};
