@extends('layout/patientLayout')
@section('css')
<link href="{{asset('css/patient.css')}}" rel="stylesheet">
@stop
@section('content')

{!! Form::open(array('url' => 'doctorList')) !!}

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">ข้อมูลแพทย์</h3>
	</div>
	<div class="panel-body">
		<div id="doctorList">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-4 form-inline">{!! Form::label('department', 'แผนก'); !!} &nbsp

					@if(isset($queryDepartment))
						{!! Form::select('department', $departments, $queryDepartment,["class" => "form-control"])!!}
					@else
						{!! Form::select('department', $departments,'0',["class" => "form-control"])!!}
					@endif
					
					@if( $errors->has('department') )<br><br>
					<p class="text-danger"> {{ $errors->first('department') }} </p>
					@endif
				</div>


				<div class="col-md-4">{!! Form::label('name', 'ชื่อแพทย์'); !!} &nbsp
					@if(isset($queryName))
						{!! Form::text('doctor', $queryName, ['class'=>'textbox', 'placeholder'=>'ณภัทร']);!!}
					@else
						{!! Form::text('doctor', '', ['class'=>'textbox', 'placeholder'=>'ณภัทร']);!!}
					@endif
					@if( $errors->has('name') )<br><br>
					<p class="text-danger"> {{ $errors->first('name') }} </p> 
					@endif
				</div>

				<div class="col-md-3">{!! Form::submit('ค้นหา', ["class" => "btn btn-info", "id" => "searchButton"]) !!}
				</div>
			</div>
			<br><br>
			<div id="doctorData">
				@if(isset($doctors))
					@if(count($doctors) > 0)
						@foreach ($doctors as $d) 
						<div class="row">
							<div class="col-md-3">
									{!! HTML::image('image/DoctorPicture/smurf.jpg', 'Profile', ['width' => '200px' , 'height' => '200px' ]) !!}
							</div>
							<div class="col-md-6"><br>
								<span class ="bold">ชื่อแพทย์ : </span> {{ $d->name }} {{ $d->surname }} <br><br>
								<span class ="bold">แผนก : </span>{{ $d->departmentName }} <br><br>
								<span class ="bold">ความเชี่ยวชาญและประสบการณ์ : </span>{{$d->proficiency}}<br><br>
							</div>
						</div>
						<br>
						@endforeach
					@else
						ไม่พบแพทย์ที่มีเงื่อนไขตามที่ค้นหา
					@endif
				@endif
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}

@stop