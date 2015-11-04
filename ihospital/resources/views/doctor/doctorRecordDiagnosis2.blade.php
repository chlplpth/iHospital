@extends('layouts.doctorLayout')

    @section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id = "content">
      <div class="panel panel-default">

        <div class="panel-heading" id ="diagPanelHeader">บันทึกการวินิจฉัย</div>
        <br>
        
        <div class="input-group" id="hn">
          <span class="input-group-addon" id="sizing-addon2">รหัสประจำตัวผู้ป่วย</span>
          <input type="text" class="form-control" aria-describedby="sizing-addon2" value = "00000001" disabled>
        </div>
        
        <div class="dropdown" id ="diseaseNo">
          <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
            รหัสโรค
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
          </ul>
        </div>
        <div id ="symptom">
          <button class="btn btn-default" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" id = "symptomButton" disabled>อาการ</button>
          <br><br>
          <textarea name="text" cols="50" rows="5" id = "symptomTextarea"></textarea>
        </div>
        <div id ="medicine">
          <button class="btn btn-default" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" id = "makePrescription">จ่ายยา</button>
          <br><br>
          <div class="panel panel-default" id="prescription">

            <div class="panel-heading" id = "prescriptionPanelHeader">ใบสั่งยา</div>

            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>ลำดับที่</th>
                    <th>รหัสยา</th>
                    <th>ชื่อยา</th>
                    <th>จำนวน</th>
                    <th>หน่วย</th>
                    <th>วิธีการใช้</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1 </td>
                    <td>00001</td>
                    <td>Tylenol paracetamol 500mg</td>
                    <td>
                      <input type="text" class="form-control" aria-describedby="sizing-addon2" id ="medicineQuantity">
                    </td>
                    <td>
                      <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" id ="medicineUnit">หน่วย
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                      </ul>
                    </td>
                    <td>
                      <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" id ="usage">
                        วิธีใช้
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                      </ul>
                    </td>
                    <td><button type="button" class="btn btn-default">เพิ่ม</button></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>    
        </div>  
        <div id = "nextAppointment">
          <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" id = "makeAppointment">นัดครั้งต่อไป</button>
          <br><br>
          <div class="container">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <div class="input-group date" id="appointmentDate">
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>    
  </div>
</div>
</div>
@endsection

@section('css')
<link href="css/doctorRecordDiagnosis2.css" rel="stylesheet">
@endsection