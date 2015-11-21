<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor', function (Blueprint $table) {
            $table->integer('userId')->unsigned();
            $table->string('proficiency');
            $table->timestamps();
        });

        Schema::table('doctor', function (Blueprint $table) {
            $table->primary('userId');
        });

<<<<<<< HEAD:database/migrations/2015_11_16_071226_create_doctor_table.php
            // $table->foreign('userId')
            //       ->references('userId')
            //       ->on('user');
=======
        Schema::table('doctor', function (Blueprint $table) {
            $table->foreign('userId')
                  ->references('userId')
                  ->on('hospitalStaff');
>>>>>>> 6b56f5942c0982b9e2264742d109d5604668d8af:database/migrations/2015_11_16_070826_create_doctor_table.php
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('doctor');
    }
}
