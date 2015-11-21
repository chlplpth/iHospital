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
            $table->integer('patientId')->unsigned();
            $table->integer('doctorId')->unsigned();
            $table->integer('diagDateId')->unsigned(); //represent appointment date,time
            $table->string('symptom');
            $table->boolean('walkIn')->default(false);
            $table->timestamps();
        });

        Schema::table('appointment', function(Blueprint $table) {
            $table->foreign('patientId')
                  ->references('userId')
                  ->on('patient');

            $table->foreign('doctorId')
                  ->references('userId')
                  ->on('doctor');

            $table->foreign('diagDateId')
                  ->references('diagnosisDateId')
                  ->on('diagnosisDate');
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
