<?php

use App\View\Components\table;
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
            $table->foreignId('bahan_baku_id');
            $table->string('nama_bahan_baku',100)->nullable();
            $table->string('satuan_id');
            $table->integer('jumlah');
            $table->integer('jenis')->comment('1: produksi, 2: kemasan');
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
