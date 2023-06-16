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
        Schema::create('pengemasan_barangs', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('jenis_produk', 50)->index();
            $table->string('nama_jenis' ,50);
            $table->integer('jumlah');
            $table->date('tgl_pengemasan');
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
        Schema::dropIfExists('pengemasan_barangs');
    }
};
