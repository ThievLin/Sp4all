<!-- ======================== Buy on Themeforest =======================  -->
<section class="buy_on_themeforest">
    @foreach ($cat->post as $p )
    <div class="container">
        <h4>{{$p->title}}</h4>
        <a href="contact" class="button_main mouse_hover2 transition3s">Get In Touch</a>
    </div>
    @endforeach
</section> <!-- /buy_on_themeforest -->

<!-- ======================== /Buy on Themeforest =======================  -->
