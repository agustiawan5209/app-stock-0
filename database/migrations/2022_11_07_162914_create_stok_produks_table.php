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
        Schema::create('stok_produks', function (Blueprint $table) {
            $table->id();
            $table->string('jenis',50)->nullable();
            $table->integer('jumlah')->nullable();
            $table->date('tgl_permintaan')->nullable();
            $table->string('jumlah_produksi', 10);
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
        Schema::dropIfExists('stok_produks');
    }
};
