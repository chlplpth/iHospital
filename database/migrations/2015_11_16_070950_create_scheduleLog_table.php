<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scheduleLog', function (Blueprint $table) {
            $table->increments('scheduleLogId');
            $table->integer('doctorId')->unsigned();
            $table->integer('staffId')->unsigned();
            $table->string('startDate');
            $table->string('endDate');
            $table->string('diagDateList');
            $table->timestamps();
        });

        Schema::table('scheduleLog', function (Blueprint $table) {
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
        Schema::drop('scheduleLog');
    }
}
