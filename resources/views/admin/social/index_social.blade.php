@extends('admin.layout.master')
@section('content')
	<div class="row">
        <div class="col-md-12">

			<h2><strong>Social</strong></h2>
		     @include('errors.message_error')
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
		<a href="{{url('create_social')}}" class="btn btn-primary" style="margin-bottom: 15px;margin-left: 89%">
                Create Social</a>
			<div class="panel panel-default">
				<div class="panel-heading">
                     List social
                </div>
				<div class="panel-body">
	                <div class="table-responsive">
	                 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                        <thead>
	                            <tr>
	                            	<th>Name</th>
	                                <th>Class</th>
	                                <th>Link</th>
	                     			<th>Status</th>
	                     			<th>Action</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        	@if(count($social) > 0)
		                        	@foreach($social as $s)
			                        	<tr>
			                                <td>{{ $s->name }}</td>
			                                <td>{{ $s->class }}</td>
			                                <td>{{ $s->link }}</td>
			                                <td>
			                                	@if($s->status == 1)
	                                				<span>Active</span>
				                                @else
				                                	Not active
				                                @endif
			                                </td>
			                                <td>
			                                	<a href="{{ url('social/'.$s->id.'/edit') }}" class="btn btn-primary"><i class="fa fa-edit "></i> Edit</a>
												<a href="{{ url('social/'.$s->id.'/delete') }}" class="btn btn-danger"><i class="fa fa-ban"></i> Delete</a>
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
