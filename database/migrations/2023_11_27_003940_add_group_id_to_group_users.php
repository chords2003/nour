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
        Schema::table('group_users', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('groups_users', function (Blueprint $table) {
            $table->unsignedBigInteger('group_id')->after('id');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
        });
    }
};
