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
        Schema::create('pesanan_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->string('transaksi_id')->nullable();
            $table->foreignId('jenis_id')->nullable();
            $table->string('nama_jenis',50)->nullable();
            $table->integer('jumlah');
            $table->integer('sub_total');
            $table->enum('status', ['1','2','3','4','5'])->default('1');
            $table->string('ket')->nullable();
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
        Schema::dropIfExists('pesanan_users');
    }
};
