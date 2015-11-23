@extends('layout/staffLayout')
@section('css')
<link href="css/staff.css" rel="stylesheet">
@stop
@section('content')
	{!! Form::open(array('url' => 'foo/bar')) !!}

	<div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">ตารางการออกตรวจ</h3>
    </div>
    <div class="panel-body" style="margin-top: 2%; margin-left: 40px;">
      <form role="form">

        <div class="form-group row">
          <div class="col-xs-8">
            <div class="btn-group form-inline" style="margin-bottom: 10px; width:100%;">
              <!-- <div style="width:33.3333%" class="btn btn-primary btn-lg skyColor" data-calendar-nav="prev"><span class="glyphicon glyphicon-chevron-left"></span> เดือนที่แล้ว</div>
              <div style="width:33.3333%" class="btn btn-primary btn-lg skyColor" id="dateLabel"></div>
              <div style="width:33.3333%" class="btn btn-primary btn-lg skyColor" data-calendar-nav="next">เดือนถัดไป <span class="glyphicon glyphicon-chevron-right"></span></div> -->
              <div style="width:20%" class="btn btn-primary btn-lg skyColor" data-calendar-nav="prev"><span class="glyphicon glyphicon-chevron-left"></span> เดือนที่แล้ว</div>
              <div style="width:60%" class="btn btn-primary btn-lg skyColor" id="dateLabel"></div>
              <div style="width:20%" class="btn btn-primary btn-lg skyColor" data-calendar-nav="next">เดือนถัดไป <span class="glyphicon glyphicon-chevron-right"></span></div>
            </div><div id="calendar" class="cal-context"></div>
          </div>
          <div class="col-xs-4">
            <div class="panel panel-default">
              <div class="panel-heading smallPanel">
                <h3 class="panel-title smallPanel">แพทย์</h3>
              </div>
              <div class="panel-body" style="margin-left:5%;">
                <div class="form-group row">
                  <div class="col-xs-5" id="staffLabel">{!! Form::label('id', 'รหัสแพทย์'); !!}</div>
                  <div class="col-xs-7" id="staffLabel">{!! Form::label('id', '12345678'); !!}</div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-5" id="staffLabel">{!! Form::label('name', 'ชื่อ'); !!}</div>
                  <div class="col-xs-7" id="staffLabel">{!! Form::label('name', 'ชลัมพล'); !!}</div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-5" id="staffLabel">{!! Form::label('lastname', 'นามสกุล'); !!}</div>
                  <div class="col-xs-7" id="staffLabel">{!! Form::label('lastname', 'ไก๊ไก่ไก๊ไก่'); !!}</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal -->
      <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
              <form  style="margin-top:2%; margin-left: 2%; margin-right: 2%; border:0px;">
                <div class="form-group row">
                  <br>
                  <div class="col-xs-3">
                    {!! Form::label('dateEdited', 'ช่วงเวลาออกตรวจ') !!}
                  </div>
                  <div class="col-xs-3">
                    <fieldset id="checkboxField" disabled>
                    <div class="checkbox-inline checkboxEditTime">{!! Form::checkbox('m[]', 1, true) !!}  เช้า</div>
                    <div class="checkbox-inline checkboxEditTime">{!! Form::checkbox('m[]', 2, false) !!}  บ่าย</div>
                    </fieldset>
                  </div>
                  <div class="col-xs-4">
                    <div id="editBtn" class="btn btn-info" style="float: right;">แก้ไข</div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <table class="table table-bordered centerBtn" id="appointmentTable" style = "text-align:center;">
                      <thead >
                        <br>
                        <tr>
                          <th style="width: 5%; text-align:center;">ลำดับ</th>
                          <th style="width: 15%;text-align:center;">ช่วงเวลา</th>
                          <th style="width: 25%; text-align:center;">รหัสผู้ป่วย</th>
                          <th style="width: 25%; text-align:center;">ชื่อผู้ป่วย</th>
                          <th style="width: 25%; text-align:center;">นามสกุลผู้ป่วย</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>บ่าย</td>
                          <td>123456789</td>
                          <td>ชลัมพวย</td>
                          <td >กวยเอ้ย</td>
                        </tr>

                        <tr>
                          <td>2</td>
                          <td>เช้า</td>
                          <td>987654321</td>
                          <td>แคมแคม</td>
                          <td >นู้บบี้</td>
                        </tr>

                      </tbody>
                    </table>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <div type="button" class="btn btn-default" data-dismiss="modal">ปิด</div>
              {!! Form::submit('ยืนยัน', ["class" => "btn btn-primary"]) !!}
            </div>
          </div>
        </div>
      </div>
    </form>


      <script type="text/javascript">
      // When the document is ready
      $(document).ready(function () {
        var calendar = $("#calendar").calendar(
          {
            language: 'th-TH',
            tmpl_path: "./tmplsStaff/",
            events_source: function () { return []; }
                  // events_source: 'events.json.php'
          }
        );

        //Javascript - Check for Label
        var arrDoctorSchedule = ['2015-11-01-afternoon', '2015-11-05-morning']; // Example array of Doctor Schedule
        var arrEdited = arrDoctorSchedule;
        var checkForLabel = function() {
          $('.cal-cell').each(function() {
            var date = $('[data-cal-date]', this).data('cal-date');
            var morning = date + '-morning';
            var afternoon = date + '-afternoon';
            var id_m = arr.indexOf(morning);
            var id_a = arr.indexOf(afternoon);
            console.log(id_a);
            morning = '#' + morning;
            afternoon = '#' + afternoon;
            if(id_m != -1) {              
              $(morning).attr('style', 'visibility:visible !important;');
            }
            else {
              $(morning).attr('style', 'visibility:hidden !important;');
            }
            if(id_a != -1) {
              $(afternoon).attr('style', 'visibility:visible !important;');
            }
            else {
              $(afternoon).attr('style', 'visibility:hidden !important;');
            }
          });
        };
        checkForLabel();

        $('.btn-group div[data-calendar-nav]').each(function() {
          var $this = $(this);
          if($this.prop('id') === 'dateLabel') return;
          $this.click(function() {
            calendar.navigate($this.data('calendar-nav'));
            checkForLabel();
          });
        });



        // Javascript - Modal
        $('.cal-cell').click(function() {
          var date = $('[data-cal-date]', this).data('cal-date');
          var day = date.substring(8,10);
          var month = date.substring(5,7);
          var year = parseInt(date.substring(0,4)) + 543;
          $('.modal-title').text(day + '-' + month + '-' + year);
          console.log(date);
          console.log(day);
          console.log(month);
          console.log(year);

          // Code Area for Kamkam
          // ...
        });

        // $('.cal-cell').dblclick(function() {
        //   var day = $('[data-cal-date]', this).data('cal-date');
        //   var sign = $('#'+day+'-afternoon').prop('class');
        //   if(sign === 'glyphicon glyphicon-star scheduleSign1') {
        //     $('#'+day+'-afternoon').prop('class', 'glyphicon glyphicon-heart scheduleSign2');
        //   }
        //   else {
        //     $('#'+day+'-afternoon').prop('class', 'glyphicon glyphicon-star scheduleSign1'); 
        //   }
        // });

        // Javascript - Edit mode
        var editMode = false;
        var edited = false;
        $('#editBtn').click(function() {
          console.log(editMode);
          edited = true;
          $('#checkboxField').attr('disabled', editMode);
          editMode = (editMode) ? false : true;
        });

        // ('.scheduleSight1').click(function() {
        //   self.options.day = $('[data-cal-date]', this).data('cal-date');
        // }

        // $('.btn-group div[data-calendar-view]').each(function() {
        //   var $this = $(this);
        //   $this.click(function() {
        //     calendar.view($this.data('calendar-view'));
        //   });
        // });
      });
      </script>
    </div>
  </div>

	{!! Form::close() !!}
@stop