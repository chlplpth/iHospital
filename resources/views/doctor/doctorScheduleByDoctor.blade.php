@extends('layout/doctorLayout')
@section('css')
<link href="{{asset('css/doctor.css')}}" rel="stylesheet">
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
          <div class="col-xs-8" style="">
            <div class="btn-group btn-group-lg" style="margin-bottom: 10px; width:100%; height:54px;">
              <div style="width:20%; height:100%;" class="btn btn-primary btn-lg skyColor glyphicon glyphicon-chevron-left" data-calendar-nav="prev"></div>
              <div style="width:60%; height:100%;" class="btn btn-primary btn-lg skyColor glyphicon" id="dateLabel">date</div>
              <div style="width:20%; height:100%;" class="btn btn-primary btn-lg skyColor glyphicon glyphicon-chevron-right" data-calendar-nav="next"></div>
            </div>
            <div class="row">
            <div id="calendar" class="col-xs-12 cal-context" style="height: 100%;">
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
                  <div class="col-xs-4">
                    {!! Form::label('dateEdited', 'ช่วงเวลาออกตรวจ') !!}
                  </div>
                  <div class="col-xs-3">
                    <fieldset id="checkboxField" disabled>
                    <div class="checkbox-inline checkboxEditTime">{!! Form::checkbox('m[]', 0, false, ['id'=>'ckb1']) !!}  เช้า</div>
                    <div class="checkbox-inline checkboxEditTime">{!! Form::checkbox('m[]', 1, false, ['id'=>'ckb2']) !!}  บ่าย</div>
                    </fieldset>
                  </div>
                  <div class="col-xs-5">
                    <div id="editBtn" class="btn btn-info" style="float: right;">แก้ไข</div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <div type="button" class="btn btn-default" data-dismiss="modal">ปิด</div>
              {!! Form::hidden('hiddenMr', '-1', ['id'=>'hiddenMr']); !!}
              {!! Form::hidden('hiddenAf', '-1', ['id'=>'hiddenAf']); !!}
              {!! Form::hidden('hiddenDate', '-1', ['id'=>'date']); !!}
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

        //================ Javascript - Check for Label ================//
        // Example array of Doctor Schedule
        var arrDoctorSchedule = {!! $calendar2 !!};

        // Array for edit, send to Database
        var arrEdited = arrDoctorSchedule;

        // Function to make Label
        var checkForLabel = function() {
          $('.cal-cell').each(function() {
            var date = $('[data-cal-date]', this).data('cal-date');
            var morning = date + '-morning';
            var afternoon = date + '-afternoon';
            var id_m = arrEdited.indexOf(morning);
            var id_a = arrEdited.indexOf(afternoon);
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

        //============ Javascript - Click next/prev month ============//
        $('.btn-group div[data-calendar-nav]').each(function() {
          var $this = $(this);
          if($this.prop('id') === 'dateLabel') return;
          $this.click(function() {
            calendar.navigate($this.data('calendar-nav'));
            checkForLabel();
          });
        });

        //============ Javascript - Make modal ============//
        var dateOfModal = '';
        $(document).on('click', '.cal-cell', function() {

          // make title date
          var date = $('[data-cal-date]', this).data('cal-date');
          dateOfModal = date;
          var day = date.substring(8,10);
          var month = date.substring(5,7);
          var year = parseInt(date.substring(0,4)) + 543;
          $('.modal-title').text('วันออกตรวจ  ' + day + '-' + month + '-' + year);
          console.log(date);
          console.log(day);
          console.log(month);
          console.log(year);

          // make tick in checkboxes
          var morning = date + '-morning';
          var afternoon = date + '-afternoon';
          var id_m = arrEdited.indexOf(morning);
          var id_a = arrEdited.indexOf(afternoon);
          morning = '#' + morning;
          afternoon = '#' + afternoon;
          if(id_m != -1) {
            $('#ckb1').prop('checked', true);
          }
          if(id_a != -1) {
            $('#ckb2').prop('checked', true);
          }

          // Code Area for Kamkam
          // ...

        });

        //============ Javascript - Edit mode in modal ============//
        var editMode = false;
        var edited = false;
        $('#editBtn').click(function() {
          console.log(editMode);
          edited = true;
          $('#checkboxField').attr('disabled', editMode);
          editMode = (editMode) ? false : true;
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

        // ('.scheduleSight1').click(function() {
        //   self.options.day = $('[data-cal-date]', this).data('cal-date');
        // }

        // $('.btn-group div[data-calendar-view]').each(function() {
        //   var $this = $(this);
        //   $this.click(function() {
        //     calendar.view($this.data('calendar-view'));
        //   });
        // });

        // pass value using hidden
        $(':checkbox').click(function() {
          $('#hiddenMr').prop('value', $('#ckb1').checked);
          $('#hiddenAf').prop('value', $('#ckb2').checked);
          $('#hiddenDate').prop('value', dateOfModal);
          console.log('AAAAAA');
        });

        // set default when Modal is cloesed
        $('#myModal').on('hidden.bs.modal', function () {
          console.log('setDeafault');
          $('#ckb1').prop('checked', false);
          $('#ckb2').prop('checked', false);
          $('#checkboxField').attr('disabled', true);
        })
      });
      </script>
    </div>
  </div>

  {!! Form::close() !!}
@stop