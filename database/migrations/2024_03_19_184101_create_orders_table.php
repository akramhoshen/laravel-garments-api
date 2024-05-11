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
            $table->integer('style_id');
            $table->integer('buyer_id');
            $table->dateTime('order_date');
            $table->dateTime('delivery_date');
            $table->string('shipping_address');
            $table->integer('status_id');
            $table->double('order_total');
            $table->double('paid_amount');
            $table->string('remark');
            $table->float('discount');
            $table->float('vat');
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
