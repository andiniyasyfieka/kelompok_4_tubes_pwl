<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUnitToItemsTable extends Migration
{
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            if (!Schema::hasColumn('items', 'unit')) { // Cek apakah kolom 'unit' sudah ada
                $table->string('unit')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            if (Schema::hasColumn('items', 'unit')) { // Cek apakah kolom ada sebelum menghapus
                $table->dropColumn('unit');
            }
        });
    }
}
