@extends('layouts.doctorLayout')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id = "content">
          <h1 class="page-header">Welcome Doctor</h1>
          <div>
          		<div class = "btn-group">
   <button type = "button" class = "btn btn-default">Default</button>
   
   <button type = "button" class = "btn btn-default dropdown-toggle" data-toggle = "dropdown">
      <span class = "caret"></span>
      <span class = "sr-only">Toggle Dropdown</span>
   </button>
   
   <ul class = "dropdown-menu" role = "menu">
      <li><a href = "#">Action</a></li>
      <li><a href = "#">Another action</a></li>
      <li><a href = "#">Something else here</a></li>
      
      <li class = "divider"></li>
      <li><a href = "#">Separated link</a></li>
   </ul>
</div>

<div class = "btn-group">
   <button type = "button" class = "btn btn-primary">Primary</button>
   
   <button type = "button" class = "btn btn-primary dropdown-toggle" data-toggle = "dropdown">
      <span class = "caret"></span>
      <span class = "sr-only">Toggle Dropdown</span>
   </button>
   
   <ul class = "dropdown-menu" role = "menu">
      <li><a href = "#">Action</a></li>
      <li><a href = "#">Another action</a></li>
      <li><a href = "#">Something else here</a></li>
      
      <li class = "divider"></li>
      <li><a href = "#">Separated link</a></li>
   </ul>
</div>
          <div> 
</div>

</div>
</div>
@endsection