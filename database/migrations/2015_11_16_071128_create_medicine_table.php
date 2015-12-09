<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine', function (Blueprint $table) {
            $table->string('medicineId');
            $table->string('medicineName');
            $table->text('description');
            $table->string('medicineType');
            $table->timestamps();
        });

        Schema::table('medicine', function (Blueprint $table) {
            $table->primary('medicineId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('medicine');
    }
}
