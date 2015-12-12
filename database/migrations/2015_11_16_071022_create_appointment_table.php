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
            $table->integer('staffId')->unsigned()->nullable();
            $table->integer('scheduleId')->unsigned();
            $table->text('symptom');
            $table->boolean('walkIn')->default(false);
            $table->timestamps();
        });

        Schema::table('appointment', function(Blueprint $table) {
            $table->foreign('patientId')
                  ->references('userId')
                  ->on('patient');

            $table->foreign('staffId')
                  ->references('userId')
                  ->on('hospitalStaff');

            $table->foreign('scheduleId')
                  ->references('scheduleId')
                  ->on('schedule');
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
