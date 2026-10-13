<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {

    public function up()
    {
        Schema::create('supplier', function (Blueprint $table) {
            $table->increments('id_supplier')->nullable();
            $table->string('nama_supplier');
            $table->string('kontak');
            $table->text('alamat')->nullable();
            $table->text('informasi_pemasok')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('supplier');
    }
};
