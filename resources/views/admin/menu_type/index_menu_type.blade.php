@extends('admin.layout.master')
@section('content')
	<div class="row">
        <div class="col-md-12">

			<h2><strong>Menu Type</strong></h2>   
		     @include('errors.message_error')  
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
		<a href="{{url('create_menu_type')}}" class="btn btn-primary" style="margin-bottom: 15px;margin-left: 85%">
                Create Menu type</a>
			<div class="panel panel-default">
				<div class="panel-heading">
                     List Menu types
                </div>
				<div class="panel-body">
	                <div class="table-responsive">
	                 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                        <thead>
	                            <tr>
	                            	<th>Title</th>
	                                <th>Action</th>
	                      
	                            </tr>
	                        </thead>
	                        <tbody>
	                        @foreach($data as $key => $d)
	                            <tr>
	                                <td>{{ $d->name }}</td>
	                                <td>
	                                	<a href="{{ url('edit_menu_type/'.$d->id.'/edit') }}" class="btn btn-primary"><i class="fa fa-edit "></i> Edit</a>
										<a href="{{ url('delete_menu_type/'.$d->id.'/delete') }}" class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</a>
	                                </td> 
	                            </tr>
	                    	@endforeach
	                        </tbody>
	                    </table>
	                </div>
	            </div>
	        </div> 
		</div>
	</div>
@endsection