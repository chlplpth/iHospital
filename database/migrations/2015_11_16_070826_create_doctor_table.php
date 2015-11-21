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

        Schema::table('doctor', function (Blueprint $table) {
            $table->foreign('userId')
                  ->references('userId')
                  ->on('hospitalStaff');
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
