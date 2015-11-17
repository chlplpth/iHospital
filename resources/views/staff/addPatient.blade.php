@extends('layout/staffLayout')

@section('content')

{!! Form::open(array('url' => 'foo/bar')) !!}
    {!! Form::label('name', 'Name'); !!}
    {!! Form::text('name') !!} <br>
    {!! Form::select('bloodGroup', array('A' => 'A', 'AB' => 'AB', 'B' => 'B', 'O' => 'O')) !!} <br><br>
    {!! Form::submit('Click Me!', ["class" => "btn btn-success"]) !!}
{!! Form::close() !!}

@stop