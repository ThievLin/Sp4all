@extends('admin.layout.master')
@section('content')
	<div class="row">
        <div class="col-md-12">

			<h2><strong></strong></h2>   
		       @include('errors.message_error')
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
			<form action="{{ url('myprofile') }}" method="post">
			@csrf
			 <div class="col-md-8">
			 	<div class="form-group">
                    <label>Photo</label><br>
                    <img src="{{url('images/'.Auth::user()->image)}}" style="width:200px;"/>
                </div>
			 	<div class="form-group">
                    <label>Phone Number: &nbsp; {{ Auth::user()->phone }}</label>
                </div>
                <div class="form-group">
                    <label>User Name: &nbsp; {{ Auth::user()->username }}</label>
                </div>
                <div class="form-group">
                    <label>Email:  {{ Auth::user()->email }}</label>
                </div>
                <button type="submit" class="btn btn-primary">Go Back </button>
              </div>  
			</form>
		</div>
	</div>
	
@endsection