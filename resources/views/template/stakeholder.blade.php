


	<!-- ============================ /BreadCrumb ============================= -->


    <section class="page-content custom-background color-background" style="background-color: #ffffff; margin-bottom: 70px; margin-top: 0px; margin-top: 50px;">
        <section class="container" style="max-width: 1200px; ">
          <div class="row" style="
              margin-left: auto;
              margin-right: auto;
              box-shadow: -1px 3px 20px 9px rgba(212, 212, 212, 1);
              -webkit-box-shadow: -1px 3px 20px 9px rgba(212, 212, 212, 1);
              -moz-box-shadow: -1px 3px 20px 9px rgba(212, 212, 212, 1);
              padding: 25px;
              border-radius: 4px;
            ">
            
            @foreach ($cat->post as $p )
              <div class="custom-heading">
                
                 <p>
                  {!!$p->description!!}
                 </p>
                
              
            </div> 
          @endforeach
        </section>
     </section>

