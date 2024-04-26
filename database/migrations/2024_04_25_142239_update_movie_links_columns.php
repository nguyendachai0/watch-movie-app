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
            $table->longText('link_stream')->nullable()->change();
            $table->longText('link_m3u8')->nullable()->change();
            $table->longText('link_server_2')->nullable()->change();
            $table->longText('link_server_3')->nullable()->change();
            $table->longText('link_server_4')->nullable()->change();
            $table->longText('link_server_5')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movies', function (Blueprint $table) {
            // If you need to rollback, you can revert these changes
            $table->text('link_stream')->nullable()->change();
            $table->text('link_m3u8')->nullable()->change();
            $table->text('link_server_2')->nullable()->change();
            $table->text('link_server_3')->nullable()->change();
            $table->text('link_server_4')->nullable()->change();
            $table->text('link_server_5')->nullable()->change();
        });
    }
};
