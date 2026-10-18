<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transaksi_pembelian', function (Blueprint $table) {
            $table->increments('id_pembelian')->nullable();
            $table->string('nomor_transaksi')->unique();
            $table->timestamp('tanggal_pembelian');
            $table->unsignedInteger('id_supplier');
            $table->foreign('id_supplier')->references('id_supplier')->on('supplier');
            $table->unsignedInteger('id_pengguna');
            $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna');
            $table->string('total_biaya');

        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi_pembelian');
    }
};
