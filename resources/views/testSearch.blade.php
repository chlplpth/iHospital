<head>
  <link href="{{ asset('selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet">

  <script type="text/javascript" src='//code.jquery.com/jquery-1.10.2.min.js'></script>
  <script type="text/javascript" src='{{ asset("selectize/js/standalone/selectize.js") }}'></script>

</head>

<body>
<select id="searchbox" name="q" placeholder="Search patients..." class="form-control"></select>
<br><br>

test test

</body>
<script>
	 var root = '{{url("/")}}';
</script>

<script type="text/javascript" src='{{ asset("js/searchSelectize.js") }}'></script>
