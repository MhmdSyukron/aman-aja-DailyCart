<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {

    public function up()
    {
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->increments('id_pengiriman')->nullable();
            $table->integer('id_penjualan');
            $table->foreign('id_penjualan')->references('id_penjualan')->on('transaksi_penjualan');
            $table->integer('id_kurir')->nullable();
            $table->foreign('id_kurir')->references('id_pengguna')->on('pengguna');
            $table->text('alamat_tujuan');
            $table->string('nomor_resi')->nullable();
            $table->timestamp('tanggal_kirim')->nullable();
            $table->string('status_pengiriman')->default('diproses');

        });
    }

    public function down()
    {
        Schema::dropIfExists('pengiriman');
    }
};
