@extends('admin.layout.master')
@section('content')
	<div class="row">
        <div class="col-md-12">

			<h2><strong>User Management</strong></h2>   
		     @include('errors.message_error')  
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
		<a href="{{url('create_users')}}" class="btn btn-primary" style="margin-bottom: 15px;margin-left: 87%">
                Create User</a>
			<div class="panel panel-default">
				<div class="panel-heading">
                     List Users
                </div>
				<div class="panel-body">
	                <div class="table-responsive">
	                 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                        <thead>
	                            <tr>
	                            	<th>Name</th>
	                                <th>User Name</th>
	                                <th>Email</th>
	                                <th>Phone</th>
	                                <th>Status</th>
	                                <th>Permission</th>
	                                <th>Branch</th>
	                     			<th>Action</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                    	@if(count($data)> 0)
	                        	@foreach($data as $key => $d)
	                            <tr>
	                            	<td>{{ $d->name }}</td>
	                                <td>{{ $d->username }}</td>
	                                <td>{{ $d->email }}</td>
	                                <td>{{ $d->phone }}</td>
	                                <td>
	                                	@if($d->status == 1)
	                                		<span>Active</span>
	                                	@else
	                                		Not Active
	                                	@endif
	                                </td>
	                                 <td>
	                                    @if(count($d->roles) > 0 )
	                                    	@foreach($d->roles as $key => $ro)
	                                    	  @if($key == 0)
	                                    		  {{ $ro->name }}
	                                    		@else
	                                    			 /  {{ $ro->name }}
	                                    		@endif
	                                    	@endforeach
	                                    @endif

	                                    <input type="checkbox" {{  $d->hasRole('Administrator') ? 'checked' : '' }} >
	                                    <input type="checkbox" {{  $d->hasRole('User') ? 'checked' : '' }} >
	                                    <input type="checkbox" {{  $d->hasRole('Admin') ? 'checked' : '' }} >
	                                 </td>
	                                 <td></td>
	                                <td>
	                                	<a href="{{ url('edit_users/'.$d->id.'/edit') }}" class="btn btn-primary"><i class="fa fa-edit "></i> Edit</a>
										<a href="{{ url('deleted_users/'.$d->id.'/deleted')}}" class="btn btn-danger"><i class="fa fa-ban"></i> Delete</a>
	                                </td>
	                                
	                            </tr>
	                          @endforeach
	                    	@endif
	                        </tbody>
	                    </table>
	                </div>
	            </div>
	        </div> 
		</div>
	</div>
	
@endsection