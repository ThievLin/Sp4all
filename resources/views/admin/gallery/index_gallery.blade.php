@extends('admin.layout.master')
@section('content')
	<div class="row">
        <div class="col-md-12">

			<h2><strong>Galleries</strong></h2>   
		     @include('errors.message_error')  
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
		<a href="{{url('create_galleries')}}" class="btn btn-primary" style="margin-bottom: 15px;margin-left: 87%">
                Create Galleries</a>
			<div class="panel panel-default">
				<div class="panel-heading">
                     List Galleries
                </div>
				<div class="panel-body">
	                <div class="table-responsive">
	                 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                        <thead>
	                            <tr>
	                            	<th>Name</th>
	                                <th>Category Gallery</th>
	                     			<th>User name</th>
	                     			<th>Status</th>
	                     			<th>Action</th>
	                            </tr>
	                        </thead>
	                        <tbody>
                    		@if(count($gallery) > 0)
                    			@foreach($gallery as $g)
	                        	<tr>
	                                <td>{{ $g->name }}</td>
	                                <td>{{ $g->cat_gallery?$g->cat_gallery->name:'' }}</td>
	                                
	                                <td>
	                                	@if($g->user_id)
                                            {{$g->user->username}}
                                        @else
                                            Unknown
                                        @endif
	                                </td>

	                                <td>
	                                	@if($g->status == 1)
	                                		<span>Active</span>
	                                	@else
	                                		Not Active
	                                	@endif
	                                </td>
	                                <td>
	                                	<a href="{{ url('galleries/'.$g->id.'/edit')}}" class="btn btn-primary"><i class="fa fa-edit "></i> Edit</a>
										<a href="{{ url('galleries/'.$g->id.'/delete') }}" class="btn btn-danger"><i class="fa fa-ban"></i> Delete</a>
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