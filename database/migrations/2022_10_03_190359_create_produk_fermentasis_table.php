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
        Schema::create('produk_fermentasis', function (Blueprint $table) {
            $table->id();
              // Kode fermentasi
              $table->string('kode' ,20)->unique();

              // Waktu Fermentasi
              $table->date('tgl_frementasi')->nullable();

              $table->string('jumlah_stock');

              // Status Berfungsi Sebagai Pemberitahu Jika Produk Sudah Difermentasi
              $table->enum('status', ['1','2','3']);
                $table->text('data');
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
        Schema::dropIfExists('produk_fermentasis');
    }
};
