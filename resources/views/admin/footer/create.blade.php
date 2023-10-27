@extends('admin.layout.master')
@section('content')
	<div class="row">
        <div class="col-md-12">

			<h2><strong>Create Footer</strong></h2>   
		       @include('errors.message_error')
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
			<form action="{{ url('create_footer') }}" method="post" enctype="multipart/form-data">
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
                <label>Address</label>
                <textarea name="address" class="form-control" rows="3"></textarea>
              </div>
              <div class="form-group">
                <label>Choose Page</label><br>
                @if(count($post)>0)
                  @foreach($post as $key => $p)
                  <input type="checkbox" name="page_id[]" value="{{ $p->id }}" <?php if($p->title == "Unknown" ){ echo "checked"; } ?> > {{ $p->title }} &nbsp;
                  @endforeach
                @endif
              </div>
              <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status">
                      <option value="1">Active</option>
                      <option value="0">Not Active</option>
                  </select>
              </div>
              <div class="form-group">
                <label>Publish Date</label>
                <input type="Date" name="publish_date" class="form-control">
              </div>
              <div class="form-group">
                <label>Unpublish Date</label>
                <input type="Date" name="unpublish_date" class="form-control">
              </div>
        
              <button type="submit" class="btn btn-primary">Submit </button>
           </div>
			</form>
		</div>
	</div>
	
@endsection