@extends('admin.layout.master')
@section('content')
@if(Request()->has('index'))
<div class="row">
  <div class="col-md-12">
    <h2><strong>Post Type</strong></h2>
    @include('errors.message_error')
  </div>
</div>
<hr />
<div class="row">
		<div class="col-md-12">
		<a href="{{url('create_category_of_post')}}" class="btn btn-primary" style="margin-bottom: 15px;margin-left: 89%">
                Create Post Type</a>
			<div class="panel panel-default">
				<div class="panel-heading">
                     List Post Type
                </div>
				<div class="panel-body">
	                <div class="table-responsive">
						 <form method="post"enctype='multipart/form-data'>
                @csrf

	                 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                        <thead>
	                            <tr>
	                            	<th>Name</th>
	                            	<th>Language</th>
	                            	<th>Action</th>
	                            </tr>
	                        </thead>
	                        <tbody class="item_list">
	                        @if(count($post_type)> 0 )
	                        	@foreach($post_type as $m)
	                        	<?php $lang = App\Models\Language::where('id',$m->language)->first(); ?>
	                            <tr>
	                                <td>{{ $m->name }}</td>
	                                <td>{{ $lang->name }}</td>
	                                <td>
	                                	<a href="{{ url('create_category_of_post?id='.$m->id)}}" class="btn btn-primary"><i class="fa fa-edit "></i> Edit</a>
										<a href="{{ url('delete_post_type/'.$m->id) }}" class="btn btn-danger"><i class="fa fa-ban"></i> Delete</a>
	                                </td>
	                            </tr>
	                            @endforeach
	                    	@endif
	                        </tbody>
	                    </table>
							  </form>
	                </div>
	            </div>
	        </div> 
		</div>
	</div>
</div>
@else
<div class="row">
  <div class="col-md-12">
    <h2><strong>Edit Post Type</strong></h2>
    @include('errors.message_error')
  </div>
</div>
<hr />
<?php $language = App\Language::get(); ?>
<div class="row">
  <div class="col-md-12">
         <form action="{{ url('create_category_of_post') }}" method="post" enctype="multipart/form-data">
          {!! csrf_field() !!}
          <div class="col-md-11">
            <div class="form-group">
              <label> Title</label>
              @if(Request()->id > 0)
              <?php $cat_of_post = DB::table('category_of_post')->where('id',Request()->id)->first(); ?>
              <input type="hidden" name="id" value="{{ $cat_of_post->id }}">
              <input type="text" name="name" class="form-control" value="{{ $cat_of_post->name }}">
              <br>
              <select class="form-control" name="language">
                  @foreach($language as $l)
                  <option value="{{ $l->id }}" <?php if($l->id==$cat_of_post->language)echo "selected"; ?>>{{ $l->name }}</option>
                  @endforeach
              </select>
              @else
              <input type="hidden" name="id" value="0">
              <input type="text" name="name" class="form-control">
              <br>
              <select class="form-control" name="language">
                  @foreach($language as $l)
                  <option value="{{ $l->id }}">{{ $l->name }}</option>
                  @endforeach
              </select>
              @endif
            </div>
            <div class="form-group col-lg-12">
              <button type="submit" class="btn btn-primary">Submit </button>
            </div>
          </div>
        </form>
  </div>
</div>
</div>
@endif
@endsection