<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    public function up()
{
    Schema::create('items', function (Blueprint $table) {
        $table->id();
        $table->string('item_id');
        $table->string('name');
        $table->string('type');
        $table->integer('stock');
        $table->integer('price'); // Pastikan tipe data integer
        $table->string('unit');
        $table->timestamps();
    });
}



    public function down()
    {
        Schema::dropIfExists('items');
    }
}
