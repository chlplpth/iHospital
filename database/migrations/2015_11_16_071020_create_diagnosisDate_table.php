<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiagnosisDateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosisDate', function (Blueprint $table) {
            $table->increments('diagnosisDateId');
            $table->integer('scheduleId')->unsigned();
            $table->date('workDate');
            $table->enum('workTime', ['morning','afternoon']);
            $table->timestamps();
        });


        Schema::table('diagnosisDate', function (Blueprint $table) {
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
        Schema::drop('diagnosisDate');
    }
}
