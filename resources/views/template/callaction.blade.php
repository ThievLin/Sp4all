<!-- ================================= News ============================== -->
<section class="news">
	<div class="container">
		<div class="row">
            @foreach ($cat->post as $p )
            <div class="col-lg-12 col-md-7 col-sm-9 col-xs-12">
				<div class="title_holder2">
					<h3>Call to <span>{{$p->title}}</span>&emsp;&emsp; <a href="contact" id="donate"> Donate <i class="fa fa-caret-right"></i></a></h3>
					<br>
					<h6>{!!$p->description!!}</h6>
				</div>
			</div> 
            @endforeach
			
		</div>
	</div>
</section>

<!-- =============================== /News ========================== -->