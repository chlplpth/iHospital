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
            $table->integer('userId')->unsigned();
            $table->integer('staffId')->unsigned();
            $table->integer('departmentId')->unsigned();
            $table->timestamps();
        });

        Schema::table('hospitalStaff', function (Blueprint $table) {
            $table->primary('userId');
        });

<<<<<<< HEAD
            // $table->foreign('userId')
            //       ->references('userId')
            //       ->on('user');
=======
        Schema::table('hospitalStaff', function (Blueprint $table) {
            $table->foreign('userId')
                  ->references('userId')
                  ->on('users');
>>>>>>> 6b56f5942c0982b9e2264742d109d5604668d8af

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
