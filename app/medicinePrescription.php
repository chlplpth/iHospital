<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\medicine;
use App\prescription;

class medicinePrescription extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'medicinePrescription';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'prescriptionId',
        'medicineId',
        'quantity',
        'instruction',
        'note'];

    //-------------  relationship

      public function medicines()
      {
      	return $this->hasMany('App/medicine','medicineId');
      }

    //=============== function ==========================

      public static function addMedicine($input)
      {
        $medicineName = $input['medicineName'];
        $medicine = medicine::where('medicineName',$medicineName)->first();
        $medicineId = $medicine->medicineId;

        $input['medicineId'] = $medicineId;
        $medicinePrescription = medicinePrescription::create($input);

        return $medicinePrescription;
      }

      public static function addMedicineToPrescription($input)
      {
        $diagnosisRecordId = $input['diagnosisRecord'];
        $diagnosisRecord = diagnosisRecord::where('diagRecordId',$diagnosisRecordId)->first();
        $prescription = prescription::where('appointmentId',$diagnosisRecord->appointmentId)->first(); 
       
        $input['prescriptionId'] = $prescription->prescriptionId;
        //medicinePrescription::create($input);
        $medicine = medicinePrescription::where('prescriptionId',$prescription->prescriptionId)
                                        ->join('medicine','medicinePrescription.medicineId','=','medicine.medicineId')
                                        ->get();
        return $medicine;
        
      }
}
