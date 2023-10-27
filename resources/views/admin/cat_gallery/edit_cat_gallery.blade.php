@extends('admin.layout.master')
@section('content')
	<div class="row">
        <div class="col-md-12">

			<h2><strong>Edit Category Gallery</strong></h2>   
		       @include('errors.message_error')
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
			<form action="{{ url('cat_gallery/'.$cat_gallery->id.'/edit') }}" method="post">
			@csrf
			   <div class="col-md-11">
              <div class="form-group">
                <label>Title</label>
                <input type="text" name="name" class="form-control" value="{{ $cat_gallery->name }}">
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea type="text" name="description" class="ckeditor" id="editor">{{ $cat_gallery->description }}
                </textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit </button>
           </div>
			</form>
		</div>
	</div>
	
@endsection