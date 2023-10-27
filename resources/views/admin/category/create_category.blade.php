@extends('admin.layout.master')
@section('content')
	<div class="row">
        <div class="col-md-12">

			<h2><strong>Create Category</strong></h2>
		       @include('errors.message_error')
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
			<form action="{{ url('create_categorys') }}" method="post">
			@csrf
			   <div class="col-md-11">
              <div class="form-group">
                <label>Title</label>
                <input type="text" name="name" class="form-control">
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
                <label>Description</label>
                <textarea name="description" class="ckeditor" id="editor" class="form-control" rows="3"></textarea>
              </div>
              <div class="form-group">
                <label>Styles:</label>
                <select name="block" class="form-control">
                  <option value="non">None</option>
                  <option value="slide">Slide</option>
                </select>
              </div>
              <div class="form-group">
                <label>Parent</label>
                <select name="parent_id" class="form-control">
                  <?php $cate = App\Models\Category::where('category_type','=','category')->get(); ?>
									<option value="">Select Parent Category</option>
                  @foreach($cate as $c)
                    <option value="{{$c->id}}">{{$c->name}}</option>
                  @endforeach
                </select>
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
