<?php

// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// return new class extends Migration
// {
//     /**
//      * Run the migrations.
//      */
//     public function up(): void
//     {
//         Schema::create('reservations_warongwarem', function (Blueprint $table) {
//             $table->id();
//             $table->timestamps();
//         });
//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::dropIfExists('reservations_warongwarem');
//     }
// };
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsWarongwaremTable extends Migration
{
    public function up()
    {
        Schema::create('reservations_warongwarem', function (Blueprint $table) {
            $table->id('id_reservation');
            $table->timestamp('time');
            $table->integer('number_of_guests');
            // $table->string('table_type');
            $table->enum('table_type', ['indoor', 'outdoor', 'restaurant']); // Constraint enum
            $table->text('special_requests')->nullable();
            $table->string('phone_number');
            $table->string('name');
            $table->unsignedBigInteger('id_user');

            // Foreign key constraint
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations_warongwarem');
    }
}

