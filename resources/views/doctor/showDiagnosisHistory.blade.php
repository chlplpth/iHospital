@extends('layout/doctorLayout')
@section('css')
<link href="{{asset('css/doctor.css')}}" rel="stylesheet">
@stop
@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">
			สถิติการออกตรวจ - {{ $month }} {{ $year }}
		</h3>
	</div>

	<div class="panel-body" style="margin:2%;">
		<a href = "{{ url('/showDiagnosisHistoryPdf') }}" class="btn btn-warning" style = "float:right;" >ส่งออก<span class="glyphicon glyphicon-print"></span>&nbspPDF</a>
		<form role="form">
			<div class="form-group row">
				<div class="col-xs-9" style="float: top;">
					<table class="table table-bordered" style = "text-align:center;">
						<thead >
							<tr>
								<th style="width: 20%; text-align:center;">วัน/เดือน/ปี</th>
								<th style="width: 20%; text-align:center;">เช้า</th>
								<th style="width: 20%; text-align:center;">บ่าย</th>
								<th style="width: 20%; text-align:center;">รวม</th>
							</tr>
						</thead>
						<tbody>
							@foreach($stats as $date)
							<tr>
								<td>{{ $date['date'] }}</td>
								<td>{{ $date['morning'] }}</td>
								<td>{{ $date['afternoon'] }}</td>
								<td>{{ $date['sum'] }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</form>
	</div>
</div>
{!! Form::open(array('url' => 'foo/bar')) !!}
<script>
$(document).ready(function(){
	$('[id="pdf"]').tooltip();
});
</script>
{!! Form::close() !!}
@stop