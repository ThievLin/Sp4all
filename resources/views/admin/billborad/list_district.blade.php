@extends('admin.layout.master')
@section('content')
	<div class="row">
        <div class="col-md-12">

			<h2><strong>List District</strong></h2>   
		     @include('errors.message_error')  
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
		<a href="{{url('create/district')}}" class="btn btn-primary" style="margin-bottom: 15px;margin-left: 85%">
                Create District</a>
			<div class="panel panel-default">
				<div class="panel-heading">
                     List District
                </div>
				<div class="panel-body">
	                <div class="table-responsive">
	                 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                        <thead>
	                            <tr>
	                            	<th>Title</th>
	                            	<th>Description</th>
	                            	<th>Status</th>
	                                <th>Action</th>
	                      
	                            </tr>
	                        </thead>
	                        <tbody>
	                        @if(count($data)>0)
	                        @foreach($data as $key => $d)
	                            <tr>
	                            	
	                                <td>{{ $d->name }}</td>
	                                <td>{{ $d->description }}</td>
	                                <td>
	                                	@if($d->status == 1)
	                                		<span>Active</span>
	                                	@else
	                                		Not Active
	                                	@endif
	                                </td>
	                                <td width="30%">
	                                	<a href="{{ url('edit/'.$d->id.'/billborad') }}" class="btn btn-primary"><i class="fa fa-edit "></i> Edit</a>
	                                	<a href="{{ url('list/'.$d->display_province.'/district') }}" class="btn btn-info"><i class="fa fa-plus "></i> List Districts</a>
	                                	<!-- <a href="{{ url('delete/'.$d->id.'/billborad') }}" class="btn btn-danger"><i class="fa fa-ban"></i> Delete</a> -->
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