@extends('layout/pharmacistLayout')

@section('content')
	<h1>ยินดีต้อนรับเภสัชกร {{Auth::user()->name}} {{Auth::user()->surname}}</h1>
<div class="container">
	<br>
	<div id="myCarousel" class="carousel slide" data-ride="carousel" style ="width : 1150px; height : 500px;">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
			<li data-target="#myCarousel" data-slide-to="3"></li>
			<li data-target="#myCarousel" data-slide-to="4"></li>
			<li data-target="#myCarousel" data-slide-to="5"></li>
		</ol>


		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">

			<div class="item active">
				<img src="image/1.png" alt="Chania" style ="width : 1150px; height : 500px;">
				<div class="carousel-caption">
				</div>
			</div>

			<div class="item">
				<img src="image/2.jpg" alt="Chania" style ="width : 1150px; height : 500px;">
				<div class="carousel-caption">
				</div>
			</div>

			<div class="item">
				<img src="image/3.jpg" alt="Flower" style ="width : 1150px; height : 500px;">
				<div class="carousel-caption">
				</div>
			</div>

			<div class="item">
				<img src="image/4.jpg" alt="Flower" style ="width : 1150px; height : 500px;">
				<div class="carousel-caption">
					
				</div>
			</div>

			<div class="item">
				<img src="image/5.jpg" alt="Flower" style ="width : 1150px; height : 500px;">
				<div class="carousel-caption">
					
				</div>
			</div>
			<div class="item">
				<img src="image/6.png" alt="Flower" style ="width : 1150px; height : 500px;">
				<div class="carousel-caption">
					
				</div>
			</div>
		</div>

		<!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>
@stop