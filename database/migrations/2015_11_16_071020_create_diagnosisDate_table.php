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

<<<<<<< HEAD:database/migrations/2015_11_16_071254_create_diagnosisDate_table.php
            // $table->foreign('scheduleId')
            //       ->references('scheduleId')
            //       ->on('schedule');
=======
        Schema::table('diagnosisDate', function (Blueprint $table) {
            $table->foreign('scheduleId')
                  ->references('scheduleId')
                  ->on('schedule');
>>>>>>> 6b56f5942c0982b9e2264742d109d5604668d8af:database/migrations/2015_11_16_071020_create_diagnosisDate_table.php
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
