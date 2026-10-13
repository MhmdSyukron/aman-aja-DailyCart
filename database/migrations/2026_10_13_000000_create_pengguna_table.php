<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {

    public function up()
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->increments('id_pengguna')->nullable();
            $table->string('nama_lengkap');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('peran');
            $table->string('no_telepon')->nullable();
            $table->text('alamat')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('pengguna');
    }
};
