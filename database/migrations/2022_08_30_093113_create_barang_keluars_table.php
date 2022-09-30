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
        Schema::create('barang_keluars', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 30);
            $table->integer('jumlah');
            $table->string('alamat',50);
            $table->string('customer',50);
            $table->date('tgl_keluar');
            $table->date('sub_total');
            // $table->date('status_id');
            $table->foreignId('transaksi_id');

            $table->enum('status', ['1','2','3','4'])->comment('Belum DiVerifikasi, 2 = Diverifikasi, 3 = Dalam Pengiriman, 4 = Diteriman');

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
        Schema::dropIfExists('barang_keluars');
    }
};
