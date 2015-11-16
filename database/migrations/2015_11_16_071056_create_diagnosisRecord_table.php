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
            $table->integer('appointmentId');
            $table->string('diseaseCode');
            $table->string('doctorAdvice');
            $table->string('diagnonsisDetail');
            $table->integer('prescriptionId');
            $table->integer('phyRecordId');
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
        Schema::drop('diagnosisRecord');
    }
}
