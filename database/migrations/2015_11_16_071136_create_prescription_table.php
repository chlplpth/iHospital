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

<<<<<<< HEAD:database/migrations/2015_11_16_071206_create_prescription_table.php
            // $table->foreign('diaRecordId')
            //       ->references('diagRecordId')
            //       ->on('diagnosisRecord');
=======
            $table->foreign('pharmacistId')
                  ->references('userId')
                  ->on('hospitalStaff');
>>>>>>> 6b56f5942c0982b9e2264742d109d5604668d8af:database/migrations/2015_11_16_071136_create_prescription_table.php
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
