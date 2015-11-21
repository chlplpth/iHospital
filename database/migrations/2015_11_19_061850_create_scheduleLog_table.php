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
            $table->integer('doctorId');
            $table->integer('staffId');
            $table->string('startDate');
            $table->string('endDate');
            $table->string('diagDateList');
            $table->timestamps();
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
