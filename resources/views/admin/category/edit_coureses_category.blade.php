@extends('admin.layout.master')
@section('content')
	<div class="row">
        <div class="col-md-12">

			<h2><strong>Edit Courses Category</strong></h2>
		       @include('errors.message_error')
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
			<form action="{{ url('edit/'.$cat->id.'/coureses_category') }}" method="post">
			@csrf
			   <div class="col-md-11">
              <div class="form-group">
                <label>Title</label>
                <input type="text" name="name" class="form-control" value="{{ $cat->name }}">
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="ckeditor" id="editor" placeholder="Enter Description">{{ $cat->description }}</textarea>
              </div>
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status">
                    <option value="1" <?php if($cat->status == 1){echo "selected";} ?> >Active</option>
                    <option value="0" <?php if($cat->status == 0){echo "selected";} ?> >Not Active</option>
                </select>
              </div>
							<div class="form-group">
								<label>Publish Date</label>
								<div class='input-group date' id='datetimepicker1'>
										<input type='text' name="publish_date" class="form-control" value="{{ date('d-m-Y',strtotime($cat->publish_date)) }}"/>
										<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
										</span>
								</div>
							</div>
							<div class="form-group">
								<label>Unpublish Date</label>
								<div class='input-group date' id='datetimepicker2'>
										<input type='text' name="unpublish_date" class="form-control"  value="{{ date('d-m-Y',strtotime($cat->unpublish_date)) }}"/>
										<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
										</span>
								</div>
							</div>
								<div class="col-md-12">
		              <button type="submit" class="btn btn-primary">Submit </button>
								</div>
					 </div>
			</form>
		</div>
	</div>

@endsection
