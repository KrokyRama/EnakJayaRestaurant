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
            $table->id('order_id');
            $table->foreignId('meja_id')->constrained('meja', 'meja_id');
            $table->foreignId('customer_id')->constrained('customers', 'customer_id');
            $table->dateTime('order_date');
            $table->string('jenis_pesanan');
            $table->tinyInteger('status_pesanan');
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
