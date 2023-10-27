@extends('admin.layout.master')
    @section('content')

<!-- /. NAV SIDE  -->
                <div class="row">
                    <div class="col-md-12">
                     <h2>Dashboard</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
            <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-6">           
			 <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-envelope-o"></i>
                </span>
                <?php $post = DB::table('posts')->where('post_type','=','post')->get(); ?>
                <div class="text-box" >
                    <p class="main-text">{{ count($post) }} &nbsp;Post</p>
                    
                </div>
             </div>
		     </div>
                    <div class="col-md-4 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-yellow set-icon">
                    <i class="fa fa-bars"></i>
                </span>
                <?php $menu = DB::table('menus')->get(); ?>
                <div class="text-box" >
                    <p class="main-text">{{ count($menu)}} &nbsp; Menu</p>
                   
                </div>
             </div>
		     </div>
            <div class="col-md-4 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-bell-o"></i>
                </span>
                <?php $page = DB::table('posts')->where('post_type','=','page')->get(); ?>
                <div class="text-box" >
                    <p class="main-text">{{ count($page) }}&nbsp; Page</p>
                    
                </div>
             </div>
		     </div>
            
			</div>
        <hr />                
                 <!-- /. ROW  -->           
    </div>
             <!-- /. PAGE INNER  -->

@endsection