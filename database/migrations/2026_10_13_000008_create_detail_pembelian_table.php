<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {

    public function up()
    {
        Schema::create('detail_pembelian', function (Blueprint $table) {
            $table->increments('id_detail_pembelian')->nullable();
            $table->integer('id_pembelian');
            $table->foreign('id_pembelian')->references('id_pembelian')->on('transaksi_pembelian');
            $table->integer('id_produk');
            $table->foreign('id_produk')->references('id_produk')->on('produk');
            $table->integer('jumlah');
            $table->string('harga_beli_satuan');
            $table->string('subtotal');

        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_pembelian');
    }
};
