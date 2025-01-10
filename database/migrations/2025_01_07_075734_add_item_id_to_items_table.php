<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddItemIdToItemsTable extends Migration
{
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            if (!Schema::hasColumn('items', 'item_id')) { // Cek apakah kolom sudah ada
                $table->string('item_id')->after('id')->unique();
            }
        });
    }

    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            if (Schema::hasColumn('items', 'item_id')) { // Cek apakah kolom ada sebelum menghapus
                $table->dropColumn('item_id');
            }
        });
    }
}
