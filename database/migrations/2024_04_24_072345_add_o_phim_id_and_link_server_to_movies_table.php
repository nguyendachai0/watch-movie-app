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
        Schema::table('movies', function (Blueprint $table) {
            $table->string('o_phim_id')->after('id')->nullable();
            $table->text('link_m3u8')->after('slug')->nullable();
            $table->text('link_server_2')->after('slug')->nullable();
            $table->text('link_server_3')->after('slug')->nullable();
            $table->text('link_server_4')->after('slug')->nullable();
            $table->text('link_server_5')->after('slug')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->dropColumn('o_phim_id');
            $table->dropColumn('link_server');
        });
    }
};
