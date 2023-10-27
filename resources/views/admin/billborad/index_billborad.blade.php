@extends('admin.layout.master')
@section('content')
	<div class="row">
        <div class="col-md-12">

			<h2><strong>Bill Borad</strong></h2>   
		     @include('errors.message_error')  
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
		<a href="{{url('create_billborad')}}" class="btn btn-primary" style="margin-bottom: 15px;margin-left: 85%">
                Create Billborad</a>
			<div class="panel panel-default">
				<div class="panel-heading">
                     List Billborad
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
	                        @if(count($category)>0)
	                        @foreach($category as $key => $ca)
	                            <tr>
	                            	
	                                <td>{{ $ca->name }}</td>
	                                <td>{{ $ca->description }}</td>
	                                <td>
	                                	@if($ca->status == 1)
	                                		<span>Active</span>
	                                	@else
	                                		Not Active
	                                	@endif
	                                </td>
	                                <td width="30%">
	                                	<a href="{{ url('edit/'.$ca->id.'/billborad') }}" class="btn btn-primary"><i class="fa fa-edit "></i> Edit</a>
	                                	<a href="{{ url('create/'.$ca->display_province.'/district') }}" class="btn btn-info"><i class="fa fa-plus "></i> Create Districts</a>
	                                	<!-- <a href="{{ url('delete/'.$ca->id.'/billborad') }}" class="btn btn-danger"><i class="fa fa-ban"></i> Delete</a> -->
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