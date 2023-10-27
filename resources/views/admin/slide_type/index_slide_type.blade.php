@extends('admin.layout.master')
@section('content')
	<div class="row">
        <div class="col-md-12">

			<h2><strong>Slide Type</strong></h2>   
		     @include('errors.message_error')  
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
		<a href="{{url('create_slide_type')}}" class="btn btn-primary" style="margin-bottom: 15px;margin-left: 85%">
                Create Slide type</a>
			<div class="panel panel-default">
				<div class="panel-heading">
                     List Slide types
                </div>
				<div class="panel-body">
	                <div class="table-responsive">
	                 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                        <thead>
	                            <tr>
	                            	<th>Title</th>
	                            	<th>Description</th>
	                                <th>Action</th>
	                      
	                            </tr>
	                        </thead>
	                        <tbody>
	                        @foreach($slide as $key => $d)
	                            <tr>
	                                <td>{{ $d->name }}</td>
	                                <td>{{ $d->description }}</td>
	                                <td>
	                                	<a href="{{ url('slide_type/'.$d->id.'/edit') }}" class="btn btn-primary"><i class="fa fa-edit "></i> Edit</a>
										<a href="{{ url('slide_type/'.$d->id.'/delete') }}" class="btn btn-danger"><i class="fa fa-ban"></i> Delete</a>
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