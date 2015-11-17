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
            $table->increments('physicalRecordid');
            $table->integer('nurseId');
            $table->integer('diagRecordId');
            $table->integer('weight');
            $table->integer('height');
            $table->integer('sysBlood');
            $table->integer('diBlood');
            $table->integer('heartRate');
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
        Schema::drop('physicalRecord');
    }
}
