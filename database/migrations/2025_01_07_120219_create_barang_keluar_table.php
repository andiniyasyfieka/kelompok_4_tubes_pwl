<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangKeluarTable extends Migration
{
    public function up()
    {
        Schema::create('barang_keluar', function (Blueprint $table) {
            $table->id();
            $table->string('id_transaksi');
            $table->string('id_barang');
            $table->string('nama_barang');
            $table->integer('jumlah_keluar');
            $table->date('tanggal')->after('id_transaksi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('barang_keluar');
        $table->dropColumn('tanggal');
    }
}
