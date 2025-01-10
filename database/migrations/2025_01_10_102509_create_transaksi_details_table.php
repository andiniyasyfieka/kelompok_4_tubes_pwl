<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('transaksi_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaksi_id'); // Foreign key ke tabel transaksi
            $table->unsignedBigInteger('item_id'); // Foreign key ke tabel item
            $table->integer('quantity'); // Jumlah barang
            $table->decimal('price', 15, 2); // Harga barang
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('transaksi_id')->references('id')->on('transaksis')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi_details');
    }
}
