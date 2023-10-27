

	<!-- =========================== All services page ======================== -->
	<section class="service_page container" style="padding-top: 50px;">
		<div class="row">
			@foreach ($cat->post as $p )
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="service_item">
					<div class="img_holder">
						<a href="abounlue">
							<img src="{{url('images/'.$p->image)}}" alt="images" class="img-responsive">
							<div class="overlay transition3s">
								<div class="border"></div>
							</div> <!-- /overlay -->
						</a>
					</div> <!-- /img_holder -->
					<div class="text">
						<h5>{{$p->title}}</h5>
						<p> {!!$p->description!!}</p>
						<a href="abounlue" class="main_anchor transition-ease">Read More <i class="fa fa-caret-right"></i></a>
					</div> <!-- /text -->
				</div> <!-- /service_item -->
			</div>
			@endforeach
		</div>
	</section> <!-- /service_page -->



	<!-- =========================== /All services page ======================== -->


