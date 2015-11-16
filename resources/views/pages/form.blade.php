@section('content')
	<h1> New Article </h1>

	<!-- if this form is for article this address is article/create then url = article-->
	{!! Form::open(['url'=> 'article']) !!}
		<div class ="form-group">
			<!-- create form send parameter 'name' and class name 'form-control'-->
			{!! Form::label('name'),'Name') !!}
			{!! Form::text('name',null,['class' => 'form-control']) !!}

		</div>

		<div class ="form-group">
			<!-- create form send parameter 'name' and class name 'btn' and 'form-control'-->
			{!! Form::submit('Submit',['class' => 'btn btn-primary form-control']) !!}

		</div>

	{!! Form::close() !!}

	<!-- and go to add it to Route::post('article','controller@function') -->
@stop