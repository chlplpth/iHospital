<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient', function (Blueprint $table) {
            $table->integer('userId');
<<<<<<< HEAD
            $table->integer('hospitalNo');
            $table->string('phoneNo');
            $table->string('address');
=======
            $table->string('hospitalNo');
            $table->string('phoneNo');
            $table->string('address');
            $table->string('sex');
            $table->string('bloodGroup');
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
        Schema::drop('patient');
    }
}
