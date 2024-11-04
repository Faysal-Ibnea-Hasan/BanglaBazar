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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('sub_category_id')->constrained('sub_categories')->onDelete('cascade');
            $table->string('title', 100);
            $table->text('description');
            $table->decimal('base_price', 10, 2);
            $table->integer('condition')->nullable()->comment('new = 1; like_new = 2; good = 3; fair = 4; poor = 5;');
            $table->integer('status')->default(2)->comment('draft = 2; active = 1, sold = 100, inactive = 0, suspended = 404');
            $table->decimal('min_bid_amount', 10, 2)->nullable();
            $table->timestamp('bid_end_time')->nullable();
            $table->decimal('shipping_price', 10, 2)->nullable();
            $table->integer('views_count')->default(0);
            $table->integer('likes_count')->default(0);
            $table->integer('bids_count')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->string('seo_title', 100)->nullable();
            $table->text('seo_description')->nullable();
            $table->boolean('free_delivery')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
