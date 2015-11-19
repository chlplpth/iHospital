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
            $table->integer('scheduleId');
            $table->timestamps();

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
