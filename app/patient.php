<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


use App\user;
use DB;

class patient extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'patient';
    protected $primaryKey = 'userId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userId',
        'hospitalNo',
        'telHome',
        'telMobile',
        'address',
        'citizenNo',
        'dateOfBirth',
        'sex',
        'bloodGroup'];


    // ============= store function ============= 
    public static function createNewPatient($userId, $input)
    {
        $input['userId'] = $userId;
        // hospital number
        $maxHN = Patient::max('hospitalNo');
        if($maxHN == null)
        {
            $newHN = 1;
        }
        else
        {
            $newHN = $maxHN + 1;
        }
        $input['hospitalNo'] = $newHN;

        // address
        $addressSet = array($input['addressNo'], $input['moo'], $input['street'], $input['subdistrict'], $input['district'], $input['province'], $input['zipcode']);
        $input['address'] = join(",,", $addressSet);
        patient::create($input);
    }    

    public static function getNewHospitalNo()
    {
        $maxHN = Patient::max('hospitalNo');
        if($maxHN == null)
        {
            $newHN = 1;
        }
        else
        {
            $newHN = $maxHN + 1;
        }
        return $newHN;
    }

    //-------------  accessor

    public function getHospitalNoAttribute($value)
    {
        return sprintf("%08d", $value);
    }

    public function getSexAttribute($value)
    {
        if($value == 'M')
        {
            return "ชาย";
        }
        else
        {
            return "หญิง";
        }
    }

    public function getDateOfBirthAttribute($value)
    {
        // $date = explode('/', $value);
        // $monthName = array('01'=>'มกราคม', '02'=>'กุมภาพันธ์', '03'=>'มีนาคม', '04'=>'เมษายน', '05'=>'พฤษภาคม', '06'=>'มิถุนายน', '07'=>'กรกฎาคม', '08'=>'สิงหาคม', '09'=>'กันยายน', '10'=>'ตุลาคม', '11'=>'พฤศจิกายน', '12'=>'ธันวาคม');
        // $month = $monthName[$value[1]];
        // if($value[2] > 60)

        return $value;
    }

    public function addressDetail(){

        // just province list, you should skip this to see the detail below...
        $province = array('0'=>'กรุงเทพมหานคร','1'=>'กระบี่','2'=>'กาญจนบุรี','3'=>'กาฬสินธุ์','4'=>'กำแพงเพชร','5'=>'ขอนแก่น','6'=>'จันทบุรี','7'=>'ฉะเชิงเทรา','8'=>'ชลบุรี','9'=>'ชัยนาท','10'=>'ชัยภูมิ','11'=>'ชุมพร','12'=>'เชียงราย','13'=>'เชียงใหม่','14'=>'ตรัง','15'=>'ตราด','16'=>'ตาก','17'=>'นครนายก','18'=>'นครปฐม','19'=>'นครพนม','20'=>'นครราชสีมา','21'=>'นครศรีธรรมราช','22'=>'นครสวรรค์','23'=>'นนทบุรี','24'=>'นราธิวาส','25'=>'น่าน','26'=>'บึงกาฬ','27'=>'บุรีรัมย์','28'=>'ปทุมธานี','29'=>'ประจวบคีรีขันธ์','30'=>'ปราจีนบุรี','31'=>'ปัตตานี','32'=>'พระนครศรีอยุธยา','33'=>'พังงา','34'=>'พัทลุง','35'=>'พิจิตร','36'=>'พิษณุโลก','37'=>'เพชรบุรี','38'=>'เพชรบูรณ์','39'=>'แพร่','40'=>'พะเยา','41'=>'ภูเก็ต','42'=>'มหาสารคาม','43'=>'มุกดาหาร','44'=>'แม่ฮ่องสอน','45'=>'ยะลา','46'=>'ยโสธร','47'=>'ร้อยเอ็ด','48'=>'ระนอง','49'=>'ระยอง','50'=>'ราชบุรี','51'=>'ลพบุรี','52'=>'ลำปาง','53'=>'ลำพูน','54'=>'เลย','55'=>'ศรีสะเกษ','56'=>'สกลนคร','57'=>'สงขลา','58'=>'สตูล','59'=>'สมุทรปราการ','60'=>'สมุทรสงคราม','61'=>'สมุทรสาคร','62'=>'สระแก้ว','63'=>'สระบุรี','64'=>'สิงห์บุรี','65'=>'สุโขทัย','66'=>'สุพรรณบุรี','67'=>'สุราษฎร์ธานี','68'=>'สุรินทร์','69'=>'หนองคาย','70'=>'หนองบัวลำภู','71'=>'อ่างทอง','72'=>'อุดรธานี','73'=>'อุทัยธานี','74'=>'อุตรดิตถ์','75'=>'อุบลราชธานี','76'=>'อำนาจเจริญ');

        $tmp = explode(",,", $this->address);
        $arr['addressNo'] = $tmp[0];
        $arr['moo'] = $tmp[1];
        $arr['street'] = $tmp[2];
        $arr['subdistrict'] = $tmp[3];
        $arr['district'] = $tmp[4];
        $arr['province'] = $province[$tmp[5]];
        $arr['zipcode'] = $tmp[6];
        $arr['provinceNo'] = $tmp[5];
        return $arr;
    }

    // -------------------------------  relationship -------------------------------
    
    public function user()
    {
        return $this->belongsTo('App\User', 'userId', 'userId');
    }

    public function appointments()
    {
        return $this->hasMany('App\appointment', 'patientId', 'userId');
    }

    public function name()
    {
        return $this->user->name;
    }

    public function surname()
    {
        return $this->user->surname;
    }

    public function fullname()
    {
        return $this->name() . ' ' . $this->surname();
    }

    // -----------------------------------------------------------------------------

    //----------------- function --------------------
    
    public function appointmentSorted()
    {
        return appointment::where('appointment.patientId', '=', $this->userId)
                   ->join('schedule', 'appointment.scheduleId', '=', 'schedule.scheduleId')
                   ->orderBy('schedule.diagDate', 'asc')
                   ->orderBy('schedule.diagTime', 'asc')
                   ->get();
    }

    public static function viewPatientProfile($userId)
    {
        $patient = DB::table('users')
                    ->where('users.userId',$userId)
                    ->join('patient','users.userId','=','patient.userId')
                    ->first();
        
        return $patient;
    }


    public static function editPatientProfile($request)
    {
        $userId = $request['userId'];
        $addressStr = "";

        if($request['addressNo']!=null)
        {
            $addressSet = array($request['addressNo'], $request['moo'], $request['street'], $request['subdistrict'], $request['district'], $request['province'], $request['zipcode']);
            $addressStr = join(",,", $addressSet);
        }


        User::where('userId',$userId)->update(array(
                'email'     => $request['email'],
                'name'      => $request['name'],
                'surname'  => $request['surname']
            ));

        patient::where('userId',$userId)->update(array(
                'telHome'     => $request['telHome'],
                'telMobile'   => $request['telMobile'],
                'address'     => $addressStr,
                'bloodGroup'  => $request['bloodGroup']
            ));

    }

    public static function searchPatient($keyword)
    {
        $users = DB::table('users')
                     ->join('patient','users.userId','=','patient.userId')
                     ->where(function ($query) use($keyword){
                             $query->where('name', 'like', '%'.$keyword.'%')
                                   ->orwhere('surname', 'like', '%'.$keyword.'%')
                                   ->orwhere('hospitalNo', 'like', '%'.$keyword.'%');
                            })
                     ->where('userType',"patient");
                     // ->get();   
        return $users;
    }
}