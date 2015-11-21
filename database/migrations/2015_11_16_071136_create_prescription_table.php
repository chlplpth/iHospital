<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescription', function (Blueprint $table) {
            $table->increments('prescriptionId');
            $table->integer('appointmentId')->unsigned();
            $table->integer('pharmacistId')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('prescription', function (Blueprint $table) {
            $table->foreign('appointmentId')
                  ->references('appointmentId')
                  ->on('appointment');

            $table->foreign('pharmacistId')
                  ->references('userId')
                  ->on('hospitalStaff');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('prescription');
    }
}
