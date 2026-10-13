<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {

    public function up()
    {
        Schema::create('pengeluaran_operasional', function (Blueprint $table) {
            $table->increments('id_pengeluaran')->nullable();
            $table->integer('id_pengguna');
            $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna');
            $table->date('tanggal_pengeluaran');
            $table->string('jenis_pengeluaran');
            $table->string('nominal');
            $table->text('keterangan');

        });
    }

    public function down()
    {
        Schema::dropIfExists('pengeluaran_operasional');
    }
};
