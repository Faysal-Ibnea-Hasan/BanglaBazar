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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number', 50)->unique();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('seller_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('buyer_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('bid_id')->constrained('bids')->onDelete('cascade')->nullable();
            $table->foreignId('shipping_address_id')->constrained('user_addresses')->onDelete('cascade')->nullable();
            $table->foreignId('billing_address_id')->constrained('user_addresses')->onDelete('cascade')->nullable();
            $table->decimal('final_price', 10, 2);
            $table->decimal('shipping_cost', 10, 2)->default(0);
            $table->decimal('tax_amount', 10, 2)->default(0);
            $table->decimal('total_amount', 10, 2);
            $table->integer('payment_status')->default(0)->comment('pending = 0; paid = 1; failed = 404; refunded = 00');
            $table->integer('order_status')->default(0)->comment('pending = 0; processing = 1; shipped = 2; delivered = 201; cancelled = 404; returned = 500');
            $table->string('tracking_number', 100)->nullable();
            $table->date('estimated_delivery_date')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
