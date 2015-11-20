<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitalStaff', function (Blueprint $table) {
            $table->integer('userId');
            $table->integer('departmentId');
            $table->timestamps();

            // $table->foreign('userId')
            //       ->references('userId')
            //       ->on('user');

            // $table->foreign('departmentId')
            //       ->references('departmentId')
            //       ->on('department');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hospitalStaff');
    }
}
