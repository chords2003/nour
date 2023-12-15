<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('follows', function (Blueprint $table) {
        $table->id();
        $table->foreignIdFor(User::class, 'follower_id')->constrained('users')->onDelete('cascade');
        $table->foreignId('followable_id');
        $table->string('followable_type');
        $table->timestamps();

    $table->unique(['follower_id', 'followable_id', 'followable_type']);
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('follows');
    }
};
