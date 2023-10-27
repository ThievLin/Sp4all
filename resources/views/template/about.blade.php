
	
	
	<section class="full_width_details_text container" style="padding-top: 50px;">
		<div class="row">
			@foreach ($cat->post as $p )
			<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 text pull-right">
				<div class="title_holder2">
					<h3 style="margin-top:0; line-height:50px;"><span>{{$p->title}}</span></h3>
				</div> <!-- /title_holder2 -->
				<p>{!!$p->description!!}</p>
			</div>

			<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 pull-left">
				<img src="{{url('images/'.$p->image)}}" alt="images" class="img-responsive">
			</div>
			@endforeach
		</div> <!-- /row -->
	</section> <!-- /award_achievement -->

	
