<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {

    public function up()
    {
        Schema::create('detail_penjualan', function (Blueprint $table) {
            $table->increments('id_detail_penjualan')->nullable();
            $table->integer('id_penjualan');
            $table->foreign('id_penjualan')->references('id_penjualan')->on('transaksi_penjualan');
            $table->integer('id_produk');
            $table->foreign('id_produk')->references('id_produk')->on('produk');
            $table->integer('jumlah');
            $table->string('harga_satuan');
            $table->string('subtotal');

        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_penjualan');
    }
};
