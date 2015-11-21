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

<<<<<<< HEAD
            // $table->foreign('nurseId')
            //       ->references('userId')
            //       ->on('nurse');

            // $table->foreign('diagRecordId')
            //       ->references('diagRecordId')
            //       ->on('diagnosisRecord');
=======
        Schema::table('physicalRecord', function (Blueprint $table) {
            $table->foreign('nurseId')
                  ->references('userId')
                  ->on('hospitalStaff');

            $table->foreign('appointmentId')
                  ->references('appointmentId')
                  ->on('appointment');
>>>>>>> 6b56f5942c0982b9e2264742d109d5604668d8af
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
