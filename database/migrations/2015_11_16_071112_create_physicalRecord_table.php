<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhysicalRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physicalRecord', function (Blueprint $table) {
            $table->increments('physicalRecordId');
            $table->integer('nurseId')->unsigned();
            $table->integer('appointmentId')->unsigned();
            $table->integer('weight');
            $table->integer('height');
            $table->integer('sysBlood');
            $table->integer('diBlood');
            $table->integer('heartRate');
            $table->timestamps();
        });


        Schema::table('physicalRecord', function (Blueprint $table) {
            $table->foreign('nurseId')
                  ->references('userId')
                  ->on('hospitalStaff');

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
        Schema::drop('physicalRecord');
    }
}
