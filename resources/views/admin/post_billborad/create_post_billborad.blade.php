@extends('admin.layout.master')
@section('content')
	<div class="row">
        <div class="col-md-12">

			<h2><strong>Create Post Billborad</strong></h2>   
		       @include('errors.message_error')
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
			<form action="{{ url('create_post_billborad') }}" method="post" enctype="multipart/form-data">
			@csrf
			   <div class="col-md-11">
              <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control">
              </div>
              <div class="form-group">
                <label>Link</label>
                <input type="text" name="link" class="form-control">
              </div>
              
               <div class="form-group">
                <label>Categories</label><br>
                  <select class="form-control" name="categorie_id[]">
                    <option value="0">Select Category</option>
                    @if(count($category)>0)
                      @foreach($category as $c)
                        <option value="{{$c->id}}">{{$c->name}}</option>
                      @endforeach
                    @endif
                  </select>
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="ckeditor" id="editor" placeholder="Enter Description"></textarea>
              </div>
              <div class="form-group">
                <label>Link Download</label>
                <input type="text" name="link_download" class="form-control">
              </div>
              <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status">
                      <option value="1">Active</option>
                      <option value="0">Not Active</option>
                  </select>
              </div>
              <div class="form-group">
                <label>Choose image</label>
                <input type="file" name="image" class="form-control">
              </div>
              <button type="submit" class="btn btn-primary">Submit </button>
           </div>
			</form>
		</div>
	</div>
	
@endsection