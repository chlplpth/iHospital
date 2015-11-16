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
<<<<<<< HEAD
            $table->increments('id');
=======
>>>>>>> d0de3813e89104db864975d9e7f27fc6957d0501
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
        Schema::drop('hospitalStaff');
    }
}
