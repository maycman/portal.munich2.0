@extends("layout")
@section("content")
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-offset-1 col-sm-10">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-example-generic" data-slide-to="1"></li>
						<li data-target="#carousel-example-generic" data-slide-to="2"></li>
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
    					<div class="item active">
    						<img src="assets/images/im2.jpg" alt="Responsive image" class="img-responsive">
      						<div class="carousel-caption">...</div>
    					</div>
    					<div class="item">
      						<img src="assets/images/im2.jpg" alt="Responsive image" class="img-responsive">
      						<div class="carousel-caption">...</div>
      					</div>
      					<div class="item">
      						<img src="assets/images/im2.jpg" alt="Responsive image" class="img-responsive">
      						<div class="carousel-caption">...</div>
      					</div>
      		</div>

      				<!-- Controls -->
      				<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
      					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    					<span class="sr-only">Previous</span>
  					</a>
  					<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    					<span class="sr-only">Next</span>
  					</a>
				</div>
			</div>
		</div>
	</div>
@endsection