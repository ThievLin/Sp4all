@extends('admin.layout.master')
@section('content')
	<div class="row">
        <div class="col-md-12">

			<h2><strong>Slide</strong></h2>   
		     @include('errors.message_error')  
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
		<a href="{{url('create_slide')}}" class="btn btn-primary" style="margin-bottom: 15px;margin-left: 87%">
                Create Slide</a>
			<div class="panel panel-default">
				<div class="panel-heading">
                     List Slides
                </div>
				<div class="panel-body">
	                <div class="table-responsive">
	                 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                        <thead>
	                            <tr>
	                            	<th>Name</th>
	                                <th>Category Slide</th>
	                     			<th>Language</th>
	                     			<th>Action</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        	@if(count($slide)>0)
	                        		@foreach($slide as $sl)
	                        		<td>{{ $sl->name }}</td>
	                        		<td>
	                        			@if(!Empty($sl->slide_type))
	                        				{{ $sl->slide_type->name }}
	                        			@else
	                        				Unknow
	                        			@endif
	                        		</td>
                    				<td>
	                    				@foreach($lang as $langs)
	                    					@if($langs->id == $sl->language)
	                    						{{$langs->name}}
	                    					@endif
	                    				@endforeach
                    				</td>
	                                <td>
	                                	<a href="{{url('slide/'.$sl->id.'/edit')}}" class="btn btn-primary"><i class="fa fa-edit "></i> Edit</a>
										<a href="{{url('slide/'.$sl->id.'/delete')}}" class="btn btn-danger"><i class="fa fa-ban"></i> Delete</a>
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