<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiagnosisRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosisRecord', function (Blueprint $table) {
            $table->increments('diagRecordId');
            $table->integer('appointmentId')->unsigned();
            $table->string('diseaseCode');
            $table->string('doctorAdvice');
            $table->string('diagnonsisDetail');
            $table->timestamps();
        });

<<<<<<< HEAD
            // $table->foreign('appointmentId')
            //       ->references('appointmentId')
            //       ->on('appointment');

            // $table->foreign('prescriptionId')
            //       ->references('prescriptionId')
            //       ->on('prescription');

            // $table->foreign('physicalRecordId')
            //       ->references('physicalRecordId')
            //       ->on('physicalRecord');
=======
        Schema::table('diagnosisRecord', function (Blueprint $table) {
            $table->foreign('appointmentId')
                  ->references('appointmentId')
                  ->on('appointment');
>>>>>>> 6b56f5942c0982b9e2264742d109d5604668d8af
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('diagnosisRecord');
    }
}
