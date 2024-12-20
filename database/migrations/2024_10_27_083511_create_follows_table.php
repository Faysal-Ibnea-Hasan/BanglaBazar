<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->id();
            // 'follower_id' references 'id' on the 'users' table
            $table->unsignedBigInteger('follower_id');
            $table->foreign('follower_id')->references('id')->on('users')->onDelete('cascade');

            // 'following_id' references 'id' on the 'users' table
            $table->unsignedBigInteger('following_id');
            $table->foreign('following_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('status')->default(1)->comment('active = 1; blocked = 0');
            $table->timestamps();
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
