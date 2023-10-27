@extends('admin.layout.master')
@section('content')
	<div class="row">
        <div class="col-md-12">

			<h2><strong>Category</strong></h2>
		     @include('errors.message_error')
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
		<a href="{{url('create_categorys')}}" class="btn btn-primary create">
                Create Category</a>
			<div class="panel panel-default">
				<div class="panel-heading">
                     List Category types
                </div>
				<div class="panel-body">
	                <div class="table-responsive">
	                 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                        <thead>
	                            <tr>
	                            	<th>Title</th>
	                            	<th>Style</th>
	                            	<th>Status</th>
	                                <th>Action</th>

	                            </tr>
	                        </thead>
	                        <tbody>
	                        @if(count($category)>0)
	                        @foreach($category as $key => $ca)
	                            <tr>

	                                <td>{{ $ca->name }}</td>
	                                <td>{{ $ca->block }}</td>
	                                <td>
	                                	@if($ca->status == 1)
	                                		<span>Active</span>
	                                	@else
	                                		Not Active
	                                	@endif
	                                </td>
	                                <td>
	                                	<a href="{{ url('edit/'.$ca->id.'/category') }}" class="btn btn-primary"><i class="fa fa-edit "></i> Edit</a>
										<a href="{{ url('delete/'.$ca->id.'/category') }}" class="btn btn-danger"><i class="fa fa-ban"></i> Delete</a>
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
