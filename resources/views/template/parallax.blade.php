<!-- =============================== Parallax ======================== -->
<section class="parallax" style="background-image: url(images/home/bgslide.jpg);">
	<div class="overlay"></div>
	<div class="container parallex_text">
        @foreach ( $cat->post as $p )
        <h3>{{$p->title}}</h3>
		<p>{!! $p->description!!}</p>
		<h5>Lets Start Your Service Today  - <a href="contact">Contact Us</a></h5>
        @endforeach
	
	</div> <!-- /container -->
</section> <!-- /Parallax -->

<!-- =============================== /Parallax ======================== -->
