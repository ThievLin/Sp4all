@extends('admin.layout.master')
@section('content')
	<div class="row">
        <div class="col-md-12">

			<h2><strong>Create Menu</strong></h2>   
		       @include('errors.message_error')
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
			<form action="{{ url('menu_create') }}" method="post" enctype="multipart/form-data">
			@csrf
			   <div class="col-md-11">
              <div class="form-group">
                <label>Title</label>
                <input type="text" name="name" class="form-control">
              </div>
               <div class="form-group">
                  <label>Parent</label>
                   <select name="parent_id" class="form-control">
                   <option value="0">Please select parent</option>
                   @if(count($menus)>0)
                    @foreach($menus as $m)
                    <option value="{{ $m->id }}">{{ $m->name }}</option>
                     @endforeach
                    @endif
                  </select>
              </div>
              <div class="form-group">
                <label>Link</label>
                <input type="text" name="link" class="form-control">
              </div>
              <div class="form-group">
                  <label>Menu Type</label>
                    <select name="menu_type" class="form-control">
                      <option value="">Please select menu type</option>
                    @if(count($menu_type)>= 0)
                    @foreach($menu_type as $menu)
                        <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                    @endforeach
                    @endif
                    </select>
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
                  <label>Order Menu</label>
                    <select name="ordering" class="form-control">
                      <option value="">Please select menu order</option>
                        @if(count($menus)>0)
                        @foreach($menus as $m)
                          <option value="{{ $m->id }}">{{ $m->name }}</option>
                         @endforeach
                        @endif
                    </select>
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