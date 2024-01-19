@extends('admin.layout.master')
@section('content')
	<div class="row">
        <div class="col-md-12">

			<h2><strong>Edit Category</strong></h2>
		       @include('errors.message_error')
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
			<form action="{{ url('edit/'.$cat->id.'/category') }}" method="post">
			@csrf
			   <div class="col-md-11">
              <div class="form-group">
                <label>Title</label>
                <input type="text" name="name" class="form-control" value="{{ $cat->name }}">
              </div>
							<div class="form-group">
                  <label>Language</label>
                  <?php $lang = App\Models\Language::get(); ?>
                  <select class="form-control" name="language">
                    @if(count($lang) > 0)
                      @foreach($lang as $la)
                        <option value="{{ $la->id }}" <?php  if($la->id == $cat->language){echo "selected";}  ?>> {{ $la->name }} </option>
                      @endforeach
                    @endif
                  </select>
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="ckeditor" id="editor" class="form-control" rows="3">{{ $cat->description }}</textarea>
              </div>
              <div class="form-group">
                <label>Style</label>
				<select name="block" class="form-control">
				  <option value="non">None</option>
                  <option value="home" <?php if($cat->block == "home"){ echo "selected";}  ?> >Home</option>
                  <option value="aboutus" <?php if($cat->block == "about"){ echo "selected";}  ?> >About Us</option>
                  <option value="mission" <?php if($cat->block == "mission"){ echo "selected";}  ?> >Mission</option>
                  <option value="vision" <?php if($cat->block == "vision"){ echo "selected";}  ?> >Vision</option>
                  <option value="contact" <?php if($cat->block == "contact"){ echo "selected";}  ?> >Contact</option>
 				</select>
              </div>
              <div class="form-group">
                <label>Parent</label>
                <select class="form-control" name="parent_id">
								<?php $cate = App\Models\Category::where('category_type','=','category')->get(); ?>
										<<option value="">Select Parent Category</option>
                    @foreach($cate as $c)
                      <option value="{{$c->id}}" <?php if($c->id == $cat->parent_id){echo "selected";}?> >{{$c->name}}</option>
                    @endforeach
                </select>
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
										<input type='text' name="unpublish_date" class="form-control" value="{{ date('d-m-Y',strtotime($cat->unpublish_date)) }}"/>
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
