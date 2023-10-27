@extends('admin.layout.master')
@section('content')
	<div class="row">
        <div class="col-md-12">

			<h2><strong>News & Event Category</strong></h2>
		       @include('errors.message_error')
		</div>
	</div>
	<hr/>
  @if(Request::is('category_news_events'))
  <div class="row">
		<div class="col-md-12">
		<a href="{{url('category_news_events/create')}}" class="btn btn-primary" style="margin-bottom: 15px;margin-left: 85%">
                Add New</a>
			<div class="panel panel-default">
				<div class="panel-heading">
                     List News & Event  Category
                </div>
				<div class="panel-body">
	                <div class="table-responsive">
	                 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                        <thead>
	                            <tr>
	                            	<th>Title</th>
                                <th>Language</th>
	                            	<th>Style</th>
	                            	<th>Status</th>
	                                <th>Action</th>

	                            </tr>
	                        </thead>
	                        <tbody>
	                        @if(count($category)>0)
	                        @foreach($category as $key => $ca)
	                            <tr>

                                  <td>{{ $ca->name }}</td>
                                  <?php $lang = App\Models\Language::get(); ?>
                                  <td>@foreach($lang as $langs) @if($langs->id == $ca->language){{ $langs->name }}@endif @endforeach</td>
	                                <td>{{ $ca->block }}</td>
	                                <td>
	                                	@if($ca->status == 1)
	                                		<span>Active</span>
	                                	@else
	                                		Not Active
	                                	@endif
	                                </td>
	                                <td>
	                                	<a href="{{ url('category_news_events/'.$ca->id.'/edit') }}" class="btn btn-primary"><i class="fa fa-edit "></i> Edit</a>
										                <a href="{{ url('category_news_events/'.$ca->id.'/deleted') }}" class="btn btn-danger"><i class="fa fa-ban"></i> Delete</a>
	                                </td>
	                            </tr>
	                    	@endforeach
	                    	@endif
	                        </tbody>
	                    </table>
	                </div>
	            </div>
	        </div>
		</div>
	</div>
@elseif(Request::is('category_news_events/create'))
	<div class="row">
		<div class="col-md-12">
			<form action="{{ url('category_news_events/create') }}" method="post">
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
                <label>Close Date</label>
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
@elseif(Request::is('category_news_events/'.$cat->id.'/edit'))
<div class="row">
  <div class="col-md-12">
    <form action="{{ url('category_news_events/'.$cat->id.'/edit') }}" method="post">
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
            <button type="submit" class="btn btn-primary">Submit </button>
         </div>
    </form>
  </div>
</div>
@endif
@endsection