@extends('admin.layout.master')
@section('content')
	<div class="row">
        <div class="col-md-12">

			<h2><strong>Create Social</strong></h2>
		       @include('errors.message_error')
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
			<form action="{{ url('social/'.$social_id->id.'/edit') }}" method="post" enctype="multipart/form-data">
			@csrf
			   <div class="col-md-11">
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ $social_id->name }}">
              </div>
               <div class="form-group">
                <label>Choose image</label>
                <input type="file" name="image" class="form-control" id="file">
								@if($social_id->image_icon)
							  	<img src="{{ url('images/'.$social_id->image_icon) }}" style="width:70px;"/>
								@endif
							</div>
              <div class="form-group">
                <label>Class</label>
                <input type="text" name="class" class="form-control" value="{{ $social_id->class }}">
              </div>

              <div class="form-group">
                <label>Link</label>
                <input type="text" name="link" class="form-control" value="{{ $social_id->link }}">
              </div>
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status">
                    <option value="1" <?php if ($social_id->status == 1){echo "selected";}?>>Active</option>
                    <option value="0" <?php if ($social_id->status == 0){echo "selected";}?>>Not Active</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Submit </button>
           </div>
			</form>
		</div>
	</div>

@endsection
