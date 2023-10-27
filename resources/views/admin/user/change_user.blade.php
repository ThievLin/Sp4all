@extends('admin.layout.master')
@section('content')
	<div class="row">
        <div class="col-md-12">

			<h2><strong>Change Password</strong></h2>   
		       @include('errors.message_error')
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
			<form action="{{ url('user_change/'.$data->id) }}" method="post" enctype="multipart/form-data">
			@csrf
			   <div class="col-md-8">
                <div class="form-group">
                    <label>Old Password</label>
                    <input class="form-control" name="old_password" type="password" />
                </div>
				<div class="form-group">
                    <label>New Password</label>
                    <input class="form-control" name="new_password" type="password" />
                </div>
                
                <button type="submit" class="btn btn-primary">Submit </button>
                <a href="{{url('edit_users/'.$data->id.'/edit')}}" class="btn btn-primary">Cancel</a>
             </div>
			</form>
		</div>
	</div>
@endsection