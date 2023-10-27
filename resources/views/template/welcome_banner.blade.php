<!-- ===================== Welcome Banner ============== -->

<section class="welcome_banner container ">
	<div class="welcome_banner_bg">
		<div class="overlay"><div class="overlay_border"></div></div>
		<div class="row">
			@foreach ( $cat->post  as $p )
			<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
				<h4>{{$p->title}}</h4>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<a href="about" class="transition3s">About Us</a>
			</div>
			@endforeach
		
		</div> <!-- /row -->
	</div> <!-- /welcome_banner_bg -->
</section> <!-- /welcome_banner -->

<!-- ===================== /Welcome Banner ============== -->