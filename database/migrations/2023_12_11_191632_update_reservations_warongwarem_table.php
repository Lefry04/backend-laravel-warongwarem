<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateReservationsWarongwaremTable extends Migration
{
    public function up()
    {
        // Periksa apakah kolom 'table_type' sudah ada sebelum menambahkannya
        if (!Schema::hasColumn('reservations_warongwarem', 'table_type')) {
            Schema::table('reservations_warongwarem', function (Blueprint $table) {
                $table->enum('table_type', ['indoor', 'outdoor', 'restaurant'])->after('number_of_guests');
            });
        }
    }

    public function down()
    {
        // Hapus kolom 'table_type' jika rollback perlu dilakukan
        Schema::table('reservations_warongwarem', function (Blueprint $table) {
            $table->dropColumn('table_type');
        });
    }
}
