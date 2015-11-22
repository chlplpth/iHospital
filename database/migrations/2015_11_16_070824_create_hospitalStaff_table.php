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


        Schema::table('hospitalStaff', function (Blueprint $table) {
            $table->foreign('userId')
                  ->references('userId')
                  ->on('users');

            $table->foreign('departmentId')
                  ->references('departmentId')
                  ->on('department');
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
