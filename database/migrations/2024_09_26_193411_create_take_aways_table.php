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
        Schema::create('takeaway', function (Blueprint $table) {
            $table->id('takeaway_id');
            $table->foreignId('order_id')->constrained('orders', 'order_id');
            $table->time('waktu_pengambilan');
            $table->tinyInteger('status_pengambilan');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('takeaway');
    }
};
