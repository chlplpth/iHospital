<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiagnosisRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosisRecord', function (Blueprint $table) {
            $table->increments('diagRecordId');
            $table->integer('appointmentId')->unsigned();
            $table->string('diseaseCode');
            $table->string('doctorAdvice');
            $table->string('diagnonsisDetail');
            $table->timestamps();
        });

        Schema::table('diagnosisRecord', function (Blueprint $table) {
            $table->foreign('appointmentId')
                  ->references('appointmentId')
                  ->on('appointment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('diagnosisRecord');
    }
}
