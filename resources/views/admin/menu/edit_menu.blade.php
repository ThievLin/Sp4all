@extends('admin.layout.master')
@section('content')
	<div class="row">
        <div class="col-md-12">

			<h2><strong>Edit Menu</strong></h2>   
		       @include('errors.message_error')
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
			<form action="" method="post" enctype="multipart/form-data">
			@csrf
			   <div class="col-md-11">
              <div class="form-group">
                <label>Title</label>
                <input type="text" name="name" class="form-control" value="{{ $menu->name }}">
              </div>
              <div class="form-group">
                <label>Parent</label>
                 <select name="parent_id" class="form-control">
                 <option value="0">Please select parent</option>
                  @foreach($menus as $m)
                  <option value="{{ $m->id }}" <?php if($m->id == $menu->parent_id){ echo 'selected'; } ?> >{{ $m->name }}</option>
                   @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Link</label>
                <input type="text" name="link" class="form-control" value="{{ $menu->link }}">
              </div>
              <div class="form-group">
                  <label>Language</label>
                  <?php $lang = App\Models\Language::get(); ?>
                  <select class="form-control" name="language">
                    @if(count($lang) > 0)
                      @foreach($lang as $la)
                        <option value="{{ $la->id }}" <?php  if($la->id == $menu->language){echo "selected";}  ?>> {{ $la->name }} </option>
                      @endforeach
                    @endif
                  </select>
              </div>
              <div class="form-group">
                  <label>Menu Type</label>
                    <select name="menu_type" class="form-control">
                      <option value="">Please select menu type</option>
                    @foreach($menu_type as $me)
                      <option value="{{ $me->id }}" <?php if(($menu->menu_type)!==NULL){ if($menu->menu_type->id == $me->id){echo "selected";} }?>  >{{  $me->name }}</option>
                    @endforeach
                    </select>
              </div>
              <div class="form-group">
                <label>Ordering</label>
                 <select name="ordering" class="form-control">
                 <option value="0">Please select menu order</option>
                  @foreach($menus as $m)
                  <option value="{{ $m->id }}" <?php if($m->id == $menu->id){ echo 'selected'; } ?> >{{ $m->name }}</option>
                   @endforeach
                </select>
              </div>
              <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option value="1" <?php if($menu->status == 1){echo "selected";} ?> >Active</option>
                        <option value="0" <?php if($menu->status == 0){echo "selected";} ?> >Not Active</option>
                    </select>
                </div>
              <div class="form-group">
                <label>Choose image</label>
                <input type="file" name="image" class="form-control">
                @if($menu->image !== " ")
                    <img src="{{ url('images/'.$menu->image) }}" width="50px" height="50px"> 
                @else 
                    <p></p>
                @endif
              </div>
             
              <button type="submit" class="btn btn-primary">Submit </button>
           </div>
			</form>
		</div>
	</div>
	
@endsection