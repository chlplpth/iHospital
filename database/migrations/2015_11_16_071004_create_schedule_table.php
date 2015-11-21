<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule', function (Blueprint $table) {
            $table->increments('scheduleId');
            $table->integer('doctorId')->unsigned();
            $table->integer('staffId')->unsigned()->nullable();
            $table->string('startDate');
            $table->string('endDate');
            $table->timestamps();
        });

        Schema::table('schedule', function (Blueprint $table) {
            $table->foreign('doctorId')
                  ->references('userId')
                  ->on('doctor');

            $table->foreign('staffId')
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
        Schema::drop('schedule');
    }
}
