@extends('admin.layout.master')
@section('content')
	<div class="row">
        <div class="col-md-12">

			<h2><strong>Create Courses Category</strong></h2>
		       @include('errors.message_error')
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
			<form action="{{ url('create_coureses_categorys') }}" method="post">
			@csrf
			   <div class="col-md-11">
              <div class="form-group">
                <label>Title</label>
                <input type="text" name="name" class="form-control">
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="ckeditor" id="editor" placeholder="Enter Description"></textarea>
              </div>
              <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                	<option value="1">Active</option>
                	<option value="0">Not Active</option>
                </select>
              </div>

							<div class="form-group">
								<label>Publish Date</label>
								<div class='input-group date' id='datetimepicker1'>
										<input type='text' name="publish_date" class="form-control" />
										<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
										</span>
								</div>
							</div>
							<div class="form-group">
								<label>Unpublish Date</label>
								<div class='input-group date' id='datetimepicker2'>
										<input type='text' name="unpublish_date" class="form-control" />
										<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
										</span>
								</div>
							</div>
              <button type="submit" class="btn btn-primary">Submit </button>
           </div>
			</form>
		</div>
	</div>

@endsection
