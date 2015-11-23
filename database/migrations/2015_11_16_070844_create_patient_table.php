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

            $table->integer('userId')->unsigned();
            $table->integer('hospitalNo');
            $table->string('telMobile');
            $table->string('telHome');
            $table->string('address');
            $table->enum('sex', ['M', 'F']);
            $table->string('dateOfBirth');
            $table->enum('bloodGroup', ['A', 'AB', 'B', 'O']);
            $table->string('drugAllergy');
            $table->string('citizenNo');
            $table->timestamps();
        });

        Schema::table('patient', function (Blueprint $table) {
            $table->primary('userId');
        });

        Schema::table('patient', function (Blueprint $table) {
            $table->foreign('userId')
                ->references('userId')
                ->on('users');
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
