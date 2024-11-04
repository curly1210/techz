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
            $table->timestamp('order_time');
            // $table->integer('total_price');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('shipment_id')->constrained('shipments');
            $table->foreignId('payment_id')->constrained('payments');
            $table->foreignId('status_order_id')->constrained('status_orders');
            $table->foreignId('code_sale_id')->nullable()->constrained('code_sales');
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
