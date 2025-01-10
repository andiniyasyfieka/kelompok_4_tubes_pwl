<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangMasuksTable extends Migration
{
    public function up()
    {
        Schema::create('barang_masuks', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('id_barang');
            $table->string('nama_barang');
            $table->integer('jumlah_masuk');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('barang_masuks');
    }
}
