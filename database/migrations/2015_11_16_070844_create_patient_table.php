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
            $table->integer('hospitalNo')->unique();
            $table->string('telMobile');
            $table->string('telHome');
            $table->string('address');
            $table->string('sex');
            $table->string('bloodGroup');
            $table->string('drugAllergy');
            $table->string('citizenNo');
            $table->timestamps();

            // $table->foreign('userId')
            //       ->references('userId')
            //       ->on('users');

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

    //-------------  relationship
    // public function user()
    // {
    //     return $this->belongsTo('App\User', 'userId');
    // }
    


    // //patient has appointments
    // public function appointments()
    // {

    //     return $this->hasMany('App\Appointment');
    // }
}
