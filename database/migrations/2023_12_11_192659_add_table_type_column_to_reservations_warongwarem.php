<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableTypeColumnToReservationsWarongwarem extends Migration
{
    public function up()
    {
        Schema::table('reservations_warongwarem', function (Blueprint $table) {
            $table->enum('table_type', ['indoor', 'outdoor', 'restaurant'])->after('number_of_guests');
        });
    }

    public function down()
    {
        Schema::table('reservations_warongwarem', function (Blueprint $table) {
            $table->dropColumn('table_type');
        });
    }
}
