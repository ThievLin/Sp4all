	<!-- =========================== Full Width details page ================== -->
   <?php $p= $cat->post->first() ?>
	<div class="full_width_details_text container" style="padding-bottom: 40px;">
		<h4>{{$p->title}}</h4>
		<p> 
            {!!$p->description!!}
		</p>
	</div>


	<section class="about-page-section" style="padding-bottom: 50px;" >
		<div class="container">
			<div class="row">
				
				<div class="col-lg-12">
		
					<div class="client-wrap client-slider text-center">
						<div class="client-item ">
											
							@if($p->image_post)
							
								@foreach($p->image_post as $k=>$ip)
								
								<img src="{{ url('Galleries/'.$ip->image) }}" alt="">

								@endforeach
								
							@endif

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
  