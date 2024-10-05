<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();  // Auto-increment primary key
            $table->string('name', 100);  // Nama dengan maksimal 100 karakter
            $table->string('email', 100);  // Email dengan maksimal 100 karakter
            $table->string('phone', 15)->nullable();  // Nomor telepon (opsional)
            $table->string('subject', 255)->nullable();  // Subject (opsional)
            $table->text('message');  // Pesan
            $table->timestamps();  // created_at dan updated_at otomatis
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
