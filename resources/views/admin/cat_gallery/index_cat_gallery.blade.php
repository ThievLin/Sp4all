@extends('admin.layout.master')
@section('content')
	<div class="row">
        <div class="col-md-12">

			<h2><strong>Category Galleries</strong></h2>   
		     @include('errors.message_error')  
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
		<a href="{{url('create_cat_galleries')}}" class="btn btn-primary" style="margin-bottom: 15px;margin-left: 81%">
                Create Category Galleries</a>
			<div class="panel panel-default">
				<div class="panel-heading">
                     List Category Galleries
                </div>
				<div class="panel-body">
	                <div class="table-responsive">
	                 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                        <thead>
	                            <tr>
	                            	<th>Title</th>
	                            	<th style="width: 50%;">Description</th>
	                                <th>Action</th>
	                      
	                            </tr>
	                        </thead>
	                        <tbody>
	                        @foreach($cat_gallery as $key => $cg)
	                            <tr>
	                                <td>{{ $cg->name }}</td>
	                                <td><?php echo $cg->description; ?> </td>
	                                <td>
	                                	<a href="{{ url('cat_gallery/'.$cg->id.'/edit') }}" class="btn btn-primary"><i class="fa fa-edit "></i> Edit</a>
										<a href="{{ url('cat_gallery/'.$cg->id.'/delete') }}" class="btn btn-danger"><i class="fa fa-ban"></i> Delete</a>
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