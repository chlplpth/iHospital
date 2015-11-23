<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->integer('userId')->unsigned();
            $table->boolean('grant')->default(false);
            $table->timestamps();
        });

        Schema::table('staff', function (Blueprint $table) {
            $table->primary('userId');
        });

        Schema::table('staff', function (Blueprint $table) {
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
        Schema::table('staff', function (Blueprint $table) {
            //
        });
    }
}
