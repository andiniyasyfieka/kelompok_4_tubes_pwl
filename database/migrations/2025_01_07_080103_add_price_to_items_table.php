<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriceToItemsTable extends Migration
{
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            if (!Schema::hasColumn('items', 'price')) { // Cek apakah kolom 'price' sudah ada
                $table->decimal('price', 10, 2)->after('stock')->notNull();
            }
        });
    }

    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            if (Schema::hasColumn('items', 'price')) { // Cek apakah kolom ada sebelum menghapus
                $table->dropColumn('price');
            }
        });
    }
}
