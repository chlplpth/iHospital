<head>

  <link href="{{ asset('/css/selectize.bootstrap3.css') }}" rel="stylesheet">
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  
  <script type="text/javascript" src='//code.jquery.com/jquery-1.10.2.min.js'></script>
  <script type="text/javascript" src='{{ asset("js/bootstrap.min.js") }}'></script>

  <script type="text/javascript" src='{{ asset("js/selectize.min.js") }}'></script>
	<script type="text/javascript" src='{{ asset("js/searchSelectize.js") }}'></script>

</head>

Test seaarch box selectize 

<select id="searchbox" name="q" placeholder="Search products or categories..." class="form-control"></select>

// Activate Selectize
<script>
	$(document).ready(function(){
	    $('#searchbox').selectize();
	});
</script>
<script type="text/javascript">
    var root = '{{url("/")}}';
</script>