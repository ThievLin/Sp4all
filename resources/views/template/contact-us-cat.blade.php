
@foreach ($cat->post as $p )
<div class="row heading">
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
      <div class="title_holder2">
        <h3>{{$p->title}}</h3>
      </div> <!-- /title_holder2 -->
    </div>
    <div class="col-lg-9 col-md-8 col-sm-6 col-xs-12">
    <p>{!!$p->description!!}</p>
    {{-- <h5>Mr. SINA YUN,<br><br> Program coordintor | climate Resilience Oxfam | Phnom Penh | Cambodia</h5><br><br>
      <p>
        &nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-right"></i>&nbsp;&nbsp;&nbsp; Provide contact information for project inquiries, partnerships, and collaborations. <br>
        &nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-right"></i>&nbsp;&nbsp;&nbsp; Include a contact form for easy communication.
      </p> --}}
    </div>
</div> <!-- /row -->
@endforeach