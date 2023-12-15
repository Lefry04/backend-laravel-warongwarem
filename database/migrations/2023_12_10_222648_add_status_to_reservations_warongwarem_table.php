<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToReservationsWarongwaremTable extends Migration
{
    public function up()
    {
        Schema::table('reservations_warongwarem', function (Blueprint $table) {
            $table->enum('status', ['active', 'inactive', 'waiting'])->default('waiting');
        });
    }

    public function down()
    {
        Schema::table('reservations_warongwarem', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
