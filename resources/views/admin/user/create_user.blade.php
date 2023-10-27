@extends('admin.layout.master')
@section('content')
	<div class="row">
        <div class="col-md-12">

			<h2><strong>User Create</strong></h2>   
		       @include('errors.message_error')
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
			<form action="{{ url('create_users') }}" method="post" enctype="multipart/form-data">
			@csrf
			   <div class="col-md-8">
				<div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="name"/>
                </div>
                <div class="form-group">
                    <label>User Name</label>
                    <input class="form-control" name="username"/>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" name="email"/>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input class="form-control" name="phone"/>
                </div>
                 <div class="form-group">
                    <label>Permission</label> <br/>
                  @foreach($roles as $ro)
                    <input type="checkbox" name="permission[]" value="{{ $ro->id }}" />&nbsp; {{ $ro->name }} &nbsp;&nbsp; 
                   @endforeach
                </div>
                <div class="form-group">
                    <label>Branch</label>
                    <select class="form-control" name="branch_id">
                        @foreach($branch as $br)
                    	<option value="{{ $br->id }}">{{ $br->name }}</option>
                    	@endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Stuatus</label>
                    <select class="form-control" name="status">
                    	<option value="1">Active</option>
                    	<option value="0">Not Active</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password"/>
                </div>
                <div class="form-group">
                    <label>Comfirm Password</label>
                    <input type="password" class="form-control" name="comfirm_password"/>
                </div>
                <div class="form-group">
                    <label>Photo</label>
                    <input type="file" name="image" class="form-control">
                </div>
                
                <button type="submit" class="btn btn-primary">Submit </button>

             </div>
			</form>
		</div>
	</div>
	
@endsection