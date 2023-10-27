	<!-- ===================== Welcome section ============= -->

	<section class="welcome_sec">
		<div class="container welcome_data_container">
			<div class="row">
				@foreach ( $cat->post  as $key=> $p )
				@if ($key==0)
				<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 welcome_title">
					<div class="title_holder">
						<h2><span>{{ $p->title}}</span></h2>
					</div> <!-- /title_holder -->
					<div class="text">
						<p>{!!$p->description!!}</p>
					</div> <!-- /text -->
				</div> <!-- /welcome_title -->
				@else
				<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 welcome_title">
					<div class="img_holder">
						<img class="img-responsive" src="{{url('images/'.$p->image)}}" alt="image">
						<div class="overlay transition3s">
							<div class="overlay_border"></div>
						</div>
					</div> <!-- /img_holder -->
					<div class="text">
						<h5>{{ $p->title}}</h5>
						<p>{!!$p->description!!}</p>
					</div>
				</div> <!-- /design_planting -->
				@endif

				@endforeach
			</div> <!-- /row -->
		</div> <!-- /welcome_data_container -->
	</section> <!-- /welcome_sec -->
	<!-- ===================== /Welcome section ============= -->
