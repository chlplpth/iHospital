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
            $table->integer('scheduleLogId')->unsigned();
            $table->string('diagDate');
            $table->enum('diagTime', ['morning', 'afternoon']);
            $table->timestamps();
        });

        Schema::table('schedule', function (Blueprint $table) {
            $table->foreign('scheduleLogId')
                  ->references('scheduleLogId')
                  ->on('scheduleLog');
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
