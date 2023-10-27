@extends('admin.layout.master')
@section('content')
<div class="row">
	<div class="col-md-12">

		<h2><strong>Widget</strong></h2>
		@include('errors.message_error')
	</div>
</div>
<hr />
<div class="row">
	<div class="col-md-11">
		<form action="{{ url('widgets') }}" method="post" enctype="multipart/form-data">
		@csrf
			<div class="col-md-12">

				<div class="panel-body">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Title <span style="color:red;">*</span></th>
								<th>Language</th>
								<th>Select Category</th>
								<th>Select Postion</th>
								<!--<th><a href="#" id="add_on_rows" class="btn btn-success">Add</a></th>-->
							</tr>
						</thead>
						<tbody id="body_add">
							@foreach($widget as $key => $wi)
							<tr id="add_row">
								<td><input type="text" name="title[]" class="form-control" value="{{ $wi->title }}"></td>
								<td>
									<select class="form-control" name="language[]">
										@foreach($lang as $langs)
											<option value="{{ $langs->id }}"<?php if($langs->id == $wi->language){echo "selected";} ?>>{{ $langs->name }}</option>
										@endforeach
									</select>
								</td>
								<td>
									<select class="form-control" name="page_side[]">
										<option value="non">Select Template</option>
										<option value="search_course" <?php if($wi->page_side == 'search_course'){echo "selected";} ?> >Search</option>
										<option value="recent_post" <?php if($wi->page_side == 'recent_post'){echo "selected";} ?> >Recent Post</option>
										<option value="our_course" <?php if($wi->page_side == 'our_course'){echo "selected";} ?> >Our Course</option>
										<option value="side_news_event" <?php if($wi->page_side == 'side_news_event'){echo "selected";} ?> >Event</option>
										<option value="contact" <?php if($wi->page_side == 'contact'){echo "selected";} ?> >Contact</option>
										<option value="list_category" <?php if($wi->page_side == 'list_category'){echo "selected";} ?> >Cateogory</option>
										<option value="post_category" <?php if($wi->page_side == 'post_category'){echo "selected";} ?> >Post
											Cateogory</option>
										<option value="facebook_like" <?php if($wi->page_side == 'facebook_like'){echo "selected";} ?> >Facebook Like</option>
										<option value="counter_website" <?php if($wi->page_side == 'counter_website'){echo "selected";} ?> >Counter
											Website</option>
										<option value="text" <?php if($wi->page_side == 'text'){echo "selected";} ?> >Custom Text</option>
										<option value="menu_module" <?php if($wi->page_side == 'menu_module'){echo "selected";} ?> >Menu Module</option>
										<option value="newsletter" <?php if($wi->page_side == 'newsletter'){echo "selected";} ?> >Newsletter</option>
									</select>
								</td>
								<td>
									<select class="form-control" name="position[]">
										<!-- <option value="sidebar_1" <?php //if($wi->position == 'sidebar_1'){echo "selected";} ?> >Sidebar 1</option>
										<option value="sidebar_2" <?php //if($wi->position == 'sidebar_2'){echo "selected";} ?> >Sidebar 2</option>
										<option value="sidebar_3" <?php //if($wi->position == 'sidebar_3'){echo "selected";} ?> >Sidebar 3</option> -->
										<option value="footer_1" <?php if($wi->position == 'footer_1'){echo "selected";} ?> >Footer 1</option>
										<option value="footer_2" <?php if($wi->position == 'footer_2'){echo "selected";} ?> >Footer 2</option>
										<option value="footer_3" <?php if($wi->position == 'footer_3'){echo "selected";} ?> >Footer 3</option>
										<option value="footer_4" <?php if($wi->position == 'footer_4'){echo "selected";} ?> >Footer 4</option>
									</select>
								</td>
								<!--<td><a href="#" class="btn btn-danger remove_rows">delete</a></td>-->
							</tr>
							@endforeach
							</body>
					</table>
					<button type="submit" class="btn btn-primary">Submit </button>
					<!--<button type="reset" class="btn btn-danger">Reset</button>-->
				</div>
			</div>
		</form>
	</div>

</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
	$(document).ready(function () {
		$('#add_on_rows').click(function (event) {
			event.preventDefault();
			var rows = '<tr id="add_row">' +
				'<td><input type="text" name="title[]" class="form-control" ></td>' +
				'<td>' +
				'<select id="language" class="form-control" name="language[]">'+
				'@foreach($lang as $la)' +
				'<option value="{{ $la->id }}">{{ $la->name }}</option>' +
				'@endforeach' +
				'</select>' +
				'</td>' +
				'<td>' +
				'<select class="form-control" name="page_side[]">' +
				'<option value="none">Select Template</option>' +
				'<option value="search_course">Search</option>' +
				'<option value="recent_post">Recent Post</option>' +
				'<option value="our_course">Our Course</option>' +
				'<option value="side_news_event">Event</option>' +
				'<option value="contact">Contact</option>' +
				'<option value="list_category">Cateogory</option>' +
				'<option value="post_category">Post Cateogory</option>' +
				'<option value="facebook_like">Facebook Like</option>' +
				'<option value="counter_website">Counter Website</option>' +
				'<option value="text">Custom Text</option>' +
				'<option value="menu_module">Menu Module</option>' +
				'<option value="newsletter">Newsletter</option>' +
				'</select>' +
				'</td>' +
				'<td>' +
				'<select class="form-control" name="position[]">' +
				// '<option value="sidebar_1">Sidebar 1</option>' +
				// '<option value="sidebar_2">Sidebar 2</option>' +
				// '<option value="sidebar_3">Sidebar 3</option>' +
				'<option value="footer_1">Footer 1</option>' +
				'<option value="footer_2">Footer 2</option>' +
				'<option value="footer_3">Footer 3</option>' +
				'<option value="footer_4">Footer 4</option>' +
				'</select>' +
				'</td>' +
				'<td><a href="#" class="btn btn-danger remove_rows" >delete</a></td>'
			'</tr>';
			$('#body_add').append(rows);
		});
		$('#body_add').on('click', '.remove_rows', function (event) {
			event.preventDefault();
			$(this).parent().parent().remove();
		});
	});
</script>
@endsection
<script>
	CKEDITOR.replace('ckeditor1');
</script>
<script>
	CKEDITOR.replace('ckeditor2');
</script>
<script>
	CKEDITOR.replace('ckeditor3');
</script>