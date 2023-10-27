@extends('admin.layout.master')
@section('content')
	<div class="row">
        <div class="col-md-12">

			<h2><strong>User Edit</strong></h2>   
		       @include('errors.message_error')
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
            <a href="{{url('user_change/'.$data->id)}}" class="btn btn-primary" style="margin-bottom: 15px;margin-left: 87%">
                Change Password</a>

			<form action="{{ url('edit_users/'.$data->id.'/edit') }}" method="post" enctype="multipart/form-data">
			@csrf
			   <div class="col-md-8">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="name" value="{{$data->name}}" />
                </div>
				<div class="form-group">
                    <label>User Name</label>
                    <input class="form-control" name="username" value="{{$data->username}}" />
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" name="email" value="{{ $data->email }}" />
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input class="form-control" name="phone" value="{{$data->phone}}" />
                </div>
                <div class="form-group">
                    <label>Permission</label> <br/>
                  @foreach($roles as $ro)
                    <input type="checkbox" name="permission[]" value="{{ $ro->id }}" <?php foreach($data->roles as $dr){ if($ro->id == $dr->id){echo "checked";} }?>/>&nbsp; {{ $ro->name }} &nbsp; &nbsp; 
                   @endforeach
                </div>
                <div class="form-group">
                    <label>Branch</label>
                    <select class="form-control" name="branch_id">
                        @foreach($branch as $br)
                    	    <option value="{{ $br->id }}" <?php  if($data->branch->id == $br->id){echo "selected";} ?> >{{ $br->name }}</option>
                    	@endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Stuatus</label>
                    <select class="form-control" name="status">
                    	<option value="1" <?php if($data->status == 1){echo "selected";} ?> >Active</option>
                    	<option value="0" <?php if($data->status == 0){echo "selected";} ?> >Not Active</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Photo</label>
                    <input type="file" class="form-control" name="image" />
                    
                    <img src="{{url('images/'.$data->image)}}" style="width: 150px;" />
                </div>
                <button type="submit" class="btn btn-primary">Submit </button>
                <a href="{{url('users')}}" class="btn btn-primary">Cancel</a>

             </div>
			</form>
		</div>
	</div>
	
@endsection