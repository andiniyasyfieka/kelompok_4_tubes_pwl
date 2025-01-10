<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeToItemsTable extends Migration
{
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            if (!Schema::hasColumn('items', 'type')) { // Cek apakah kolom 'type' sudah ada
                $table->string('type')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            if (Schema::hasColumn('items', 'type')) { // Cek apakah kolom ada sebelum menghapus
                $table->dropColumn('type');
            }
        });
    }
}
