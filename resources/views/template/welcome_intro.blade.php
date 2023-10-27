	<!-- ===================== Welcome intro ============= -->
	<section class="welocme_intro">
		<div class="container">
			<div class="row">
				@foreach ( $cat->post  as $p )
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 irrigation">
					<div class="img_holder">
						<img src="{{url('images/'.$p->image)}}" alt="images" width="200">
					</div>
					<div class="info">
						<h5><span>{{ $p->title }}<br></span></h5>
						<p>{!! $p->description!!}</p>
						<a class="read_more main_anchor transition-ease" href="ourcpa.html">Read More <i class="fa fa-caret-right"></i></a>
					</div>
				</div>
				@endforeach
			</div> <!-- /row -->
		</div> <!-- /container -->
	</section> <!-- /welocme_intro -->

	<!-- ===================== /Welcome intro ============= -->