{{--<?php $seting = App\Setting::first(); 
        if(count($seting)>0){
            $seting_name = $seting->website_name;
        }else{
            $seting_name ="TITB ADMIN";
        }
?>--}}
<?php  $seting_name ="TITB ADMIN"; ?>
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">MY WEB TITB</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/admin')}}">{{$seting_name}}   </a>
            </div>
        <div style="color: white; padding: 15px 50px 5px 50px;float: right;font-size: 16px;"><a href="{{ url('/') }}" target="_blank" style="color:#fff;text-transform: uppercase;">{{Auth::user()->username}} </a> &nbsp; &nbsp; |&nbsp; &nbsp;  <a href="{{ url('/') }}" target="_blank" style="color:#fff;">View Site</a> &nbsp; <?php  echo date('l')."&nbsp; ". date('d-M-Y'); ?> &nbsp; <a href="{{ url('logout') }}" class="btn btn-danger square-btn-adjust">Logout</a> </div>
    </nav>
