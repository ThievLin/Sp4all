@extends('admin.layout.master')
@section('content')
	<div class="row">
        <div class="col-md-12">

			<h2><strong>Create Page</strong></h2>
		       @include('errors.message_error')
		</div>
	</div>

	<hr/>
	<div class="row">
		<div class="col-md-12">
			<form action="{{ url('create_page') }}" method="post" enctype="multipart/form-data">
			@csrf
			   <div class="col-md-6">
              <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control">
              </div>
              <div class="form-group">
                <label>Link</label>
                <input type="text" name="link" class="form-control">
              </div>
			  <div class="form-group">
                  <label>Language</label>
                  <?php $lang = App\Models\Language::get(); ?>
                  <select class="form-control" name="language">
                     @if(count($lang) > 0)
								@foreach($lang as $la)
									<option value="{{ $la->id }}"> {{ $la->name }} </option>
								@endforeach
                     @endif
                  </select>
              </div>
              <div class="form-group">
                <label>Menu</label>
                 <select name="menu_id" class="form-control">
                 <option value="0">Please select menu</option>
                  @if(count($menu)>0)
							@foreach($menu as $m)
							   <option value="{{ $m->id }}">{{ $m->name }}</option>
							@endforeach
                  @endif
                </select>
              </div>
              <div class="form-group">
                 <label>Choose Template </label>
                  <select name="template" class="form-control" id="select">
                  <option value="0">Please select Template</option>
                      <option value="fullwidth">Fullwidth</option>
                      <!-- <option value="left_sidebar"> Left Sidebar</option>
                      <option value="right_sidebar">Right Sidebar</option> -->
                </select>
              </div>

              <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="ckeditor" id="editor"></textarea>
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
              <div class="form-group">
                <label>Choose image</label>
                <input type="file" name="image" class="form-control">
              </div>
						<button type="submit" class="btn btn-primary">Submit </button>
					</div>
					<div class="col-md-6"><br/>
						<table class="table table-striped table-bordered">
							<thead>
									<tr>
										<th>Select Category</th>
										<th>Select Postion</th>
										<th><a href="#" id="add_on_rows" class="btn btn-success">Add</a></th>
									</tr>
							</thead>
							<tbody id="body_add">
						
								<tr id="add_row">
									<td>
										<select class="form-control" name="category_id[]">
											@if(count($category)>0)
											<option value="">Select Catgory</option>
												@foreach($category as $key => $cat)
														<option value="{{ $cat->id }}">Select Catgory</option>
												@endforeach
											@endif
										</select>
									</td>

									<td>
										<select class="form-control" name="position[]">
												<option value="position_1">Position 1</option>
												<option value="position_2">Position 2</option>
												<option value="position_3">Position 3</option>
												<option value="position_4">Position 4</option>
												<option value="position_5">Position 5</option>
												<option value="position_6">Position 6</option>
												<option value="position_7">Position 7</option>
												<option value="position_8">Position 8</option>
												<option value="position_9">Position left (only for template left Sidebar)</option>
												<option value="position_10">Position right (only for template left Sidebar)</option>
										</select>
									</td>
									<td><a href="#" class="btn btn-danger remove_rows" >delete</a></td>
								</tr>
							</body>
						</table>
					</div>


			</form>
		</div>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	$('#add_on_rows').click(function(event){
				 event.preventDefault();
						var rows = '<tr id="add_row">' +
											 '<td>' +
											 '<select class="form-control" name="category_id[]">' +
	 											'@if(count($category)>0)' +
	 											'<option value="">Select Catgory</option>' +
	 												'@foreach($category as $key => $cat)' +
	 														'<option value="{{ $cat->id }}">Select Catgory</option>' +
	 												'@endforeach' +
	 											'@endif' +
	 										'</select>'  +
	 									'</td>'  +
											 '<td>'+
											 	'<select class="form-control" name="position[]">' +
	 											'<option value="position_1">Position 1</option>' +
	 											'<option value="position_2">Position 2</option>' +
	 											'<option value="position_3">Position 3</option>' +
	 											'<option value="position_4">Position 4</option>' +
	 											'<option value="position_5">Position 5</option>' +
	 											'<option value="position_6">Position 6</option>' +
	 											'<option value="position_7">Position 7</option>' +
	 											'<option value="position_8">Position 8</option>' +
												'<option value="position_9">Position left (only for template left Sidebar)</option>' +
												'<option value="position_10">Position right (only for template right Sidebar)</option>' +
	 										'</select>' +
											 '</td>' +
											 '<td><a href="#" class="btn btn-danger remove_rows" >delete</a></td>'
											 '</tr>';
					 $('#body_add').append(rows)
			 });
			 $('#body_add').on('click','.remove_rows',function(event){
						 event.preventDefault();
						$(this).parent().parent().remove();
				});
});
</script>
@endsection
