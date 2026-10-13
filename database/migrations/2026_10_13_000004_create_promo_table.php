<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {

    public function up()
    {
        Schema::create('promo', function (Blueprint $table) {
            $table->increments('id_promo')->nullable();
            $table->string('kode_promo')->unique();
            $table->string('nama_promo');
            $table->string('potongan');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('status_aktif')->default('aktif');

        });
    }

    public function down()
    {
        Schema::dropIfExists('promo');
    }
};
