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
            $table->string('o_phim_id')->nullable();
            $table->string('name', 100);
            $table->integer('status')->default(1);
            $table->string('slug', 255);
            $table->string('thumb', 255);
            $table->string('poster', 255);
            $table->text('link_stream')->nullable();
            $table->text('link_m3u8')->nullable();
            $table->text('link_server_2')->nullable();
            $table->text('link_server_3')->nullable();
            $table->text('link_server_4')->nullable();
            $table->text('link_server_5')->nullable();
            $table->unsignedBigInteger('category_id');
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
