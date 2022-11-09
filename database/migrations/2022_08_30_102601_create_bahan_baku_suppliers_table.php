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
        Schema::create('bahan_baku_suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('gambar', 255)->nullable();
            $table->string('bahan_baku', 50);
            $table->string('isi')->nullable();
            $table->enum('jenis', ['1','2']);
            $table->string('satuan');
            $table->integer('harga');
            $table->integer('jumlah_stock');
            $table->foreignId('suppliers_id');
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
        Schema::dropIfExists('bahan_baku_suppliers');
    }
};
