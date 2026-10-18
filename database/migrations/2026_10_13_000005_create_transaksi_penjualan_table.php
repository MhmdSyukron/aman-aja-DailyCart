<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transaksi_penjualan', function (Blueprint $table) {
            $table->increments('id_penjualan')->nullable();
            $table->string('nomor_transaksi')->unique();
            $table->timestamp('tanggal_penjualan');
            $table->unsignedInteger('id_pelanggan');
            $table->foreign('id_pelanggan')->references('id_pengguna')->on('pengguna');
            $table->unsignedInteger('id_kasir')->nullable();
            $table->foreign('id_kasir')->references('id_pengguna')->on('pengguna');
            $table->unsignedInteger('id_promo')->nullable();
            $table->foreign('id_promo')->references('id_promo')->on('promo');
            $table->string('total_pembayaran');
            $table->string('status_transaksi')->default('selesai');

        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi_penjualan');
    }
};
