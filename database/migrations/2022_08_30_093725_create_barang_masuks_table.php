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
        Schema::create('barang_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('kode',50);
            $table->foreignId('pesanan_id')->constrained('pesanans')->onDelete('cascade');
            $table->enum('status', ['1','2','3','4','5'])->comment('Belum DiVerifikasi, 2 = Diverifikasi, 3 = Dalam Pengiriman, 4 = Diterima, 5: diterima admin');
            $table->foreignId('supplier_id');
            $table->foreignId('bahan_supplier_id');
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
        Schema::dropIfExists('barang_masuks');
    }
};
