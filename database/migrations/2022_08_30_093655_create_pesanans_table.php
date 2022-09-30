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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bahan_baku_id')->constrained('bahan_bakus');
            $table->foreignId('satuan_id')->constrained('satuans');
            $table->foreignId('jenis_id')->constrained('jenis');
            $table->integer('jumlah');
            $table->foreignId('transaksi_id');
            $table->bigInteger('sub_total');
            // $table->foreignId('status_id')->constrained('status');
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
        Schema::dropIfExists('pesanans');
    }
};
