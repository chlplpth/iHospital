@extends('layout/doctorLayout')
@section('css')
<link href="{{asset('css/doctor.css')}}" rel="stylesheet">
@stop
@section('content')
{!! Form::open(array('url' => 'foo/bar')) !!}

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">
			สถิติการออกตรวจ - สิงหาคม พ.ศ. 2536
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
							<tr>
								<td>20/11/2558</td>
								<td>3</td>
								<td>9</td>
								<td>12</td>
							</tr>
							<tr>
								<td>21/11/2558</td>
								<td>8</td>
								<td>1</td>
								<td>9</td>
							</tr>
							<tr>
								<td>รวม</td>
								<td>11</td>
								<td>10</td>
								<td>21</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</form>
	</div>
</div>
<script>
$(document).ready(function(){
	$('[id="pdf"]').tooltip();
});
</script>
{!! Form::close() !!}
@stop