<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment', function (Blueprint $table) {
            $table->increments('appointmentId');
            $table->integer('patientId');
            $table->integer('doctorId');
            $table->string('date');
            $table->string('time');
            $table->string('symptom');
            $table->integer('diagRecordId');
            $table->timestamps();

            $table->foreign('patientId')
                  ->references('userId')
                  ->on('patient');

            $table->foreign('doctorId')
                  ->references('userId')
                  ->on('doctor');

            $table->foreign('diagRecordId')
                  ->references('diagRecordId')
                  ->on('diagRecord');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('appointment');
    }



}
