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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('description', 255);
            $table->integer('status');
            $table->string('slug', 255);
            $table->string('image', 255);
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('genre_id');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('genre_id')->references('id')->on('genres');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
