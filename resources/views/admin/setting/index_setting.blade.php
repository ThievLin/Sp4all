@extends('admin.layout.master')
@section('content')
	<div class="row">
        <div class="col-md-12">

			<h2><strong>Setting</strong></h2>   
		     @include('errors.message_error')  
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
		<a href="{{url('create_setting')}}" class="btn btn-primary" style="margin-bottom: 15px;margin-left: 89%">
                Create Setting</a>
			<div class="panel panel-default">
				<div class="panel-heading">
                     List Setting
                </div>
				<div class="panel-body">
	                <div class="table-responsive">
	                 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                        <thead>
	                            <tr>
	                            	<th>Website Name</th>
	                            	<th>Logo Image</th>
	                                <th>Logo Text</th>
	                                <th>Language</th>
	                                <th>User Name</th>
	                     			<th>Action</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        @if(count($setting) > 0 )
	                        	@foreach($setting as $set)
	                        	<tr>
	                                <td>{{ $set->website_name }}</td>
	                                <td><img src="{{ url('images/'.$set->logo_image) }}" style="width:100px;"/></td>
	                                <td>{{ $set->logo_text }}</td>
	                                <td>
	                                	@foreach($lang as $langs)
	                                		@if($set->language == $langs->id){{ $langs->name }}@endif
	                                	@endforeach
	                                </td>
	                                <td>
	                                	@if($set->user_id !== NULL)
                                            {{$set->user->username}}
                                        @else
                                            Unknown
                                        @endif
	                                </td>
	                                <td>
	                                	<a href="{{ url('setting/'.$set->id.'/edit') }}" class="btn btn-primary"><i class="fa fa-edit "></i> Edit</a>
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