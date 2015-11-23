<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicinePrescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicinePrescription', function (Blueprint $table) {
            $table->integer('prescriptionId')->unsigned();
            $table->string('medicineId');
            $table->integer('quantity');
            $table->string('instruction');
            $table->string('note');
            $table->timestamps();
        });

        Schema::table('medicinePrescription', function(Blueprint $table) {
            $table->primary(['prescriptionId', 'medicineId']);
        });

        Schema::table('medicinePrescription', function(Blueprint $table) {
            $table->foreign('prescriptionId')
                  ->references('prescriptionId')
                  ->on('prescription');

            $table->foreign('medicineId')
                  ->references('medicineId')
                  ->on('medicine');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('medicinePrescription');
    }
}
