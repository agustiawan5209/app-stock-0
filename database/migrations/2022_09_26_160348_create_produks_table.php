<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            // Kode fermentasi
            $table->string('kode' ,20)->unique();
            // Waktu Fermentasi
            $table->string('jumlah');
            // Status Berfungsi Sebagai Pemberitahu Jika Produk Habis ATau Kadaluarsa
            $table->enum('status', ['1','2', '3']);
            $table->date('tgl_kadaluarsa')->nullable();
            $table->string('jenis_id')->nullable();
            // Satuan Adalah  permililiter
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
};
