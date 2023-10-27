@extends('admin.layout.master')
@section('content')
  <div class="row">
        <div class="col-md-12">

      <h2><strong>Edit Product</strong></h2>
           @include('errors.message_error')
    </div>
  </div>
  <hr/>
  <div class="row">
    <div class="col-md-12">
      <form action="{{ url('products-product/'.$post->id.'/edit') }}" method="post" enctype="multipart/form-data">
      @csrf
         <div class="col-md-11">
              <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ $post->title }}">
              </div>
              <div class="form-group">
                <label>Link</label>
                <input type="text" name="link" class="form-control" value="{{ $post->link }}">
              </div>
              <div class="form-group">
                <label>Category</label><br>
                  <select class="form-control" name="categorie_id[]">
                  <option value="0">Select Category</option>
                  @if(count($category)>0)
                    @foreach($category as $c)
                        @if($c->category_type == 'product')
                          <option value="{{$c->id}}" <?php if(count($post->cate)>0){if($post->cate->first()->id == $c->id){echo "selected";}}?> >{{$c->name}}</option>
                        @endif
                    @endforeach
                  @endif
                </select>
              </div>
              <div class="form-group">
                <label>Brand</label><br>
                  <select class="form-control" name="brand_id[]">
                  <option value="0">Select Brand</option>
                  @if(count($category)>0)
                    @foreach($category as $c)
                    @if($c->category_type == 'product-brand')
                      <option value="{{$c->id}}" <?php if(count($post->brand)>0){if($post->brand->first()->id == $c->id){echo "selected";}}?> >{{$c->name}}</option>
                    @endif
                    @endforeach
                  @endif
                </select>
              </div>
              <div class="form-group">
                <label>Link Download</label>
                <input type="text" name="link_download" class="form-control" value="{{ $post->link_download }}">
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="ckeditor" id="editor" >{{ $post->description }}</textarea>
              </div>
              <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status">
                      <option value="1" <?php if($post->status == 1){echo "selected";} ?> >Active</option>
                      <option value="0" <?php if($post->status == 0){echo "selected";} ?> >Not Active</option>
                  </select>
              </div>
              <div class="form-group">
              <label>Publish Date</label>
              <div class='input-group date' id='datetimepicker1'>
                  <input type='text' name="publish_date" class="form-control" value="{{ date('d-m-Y',strtotime($post->publish_date)) }}"/>
                  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                  </span>
              </div>
            </div>
            <div class="form-group">
              <label>Unpublish Date</label>
              <div class='input-group date' id='datetimepicker2'>
                  <input type='text' name="unpublish_date" class="form-control"  value="{{ date('d-m-Y',strtotime($post->unpublish_date)) }}"/>
                  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                  </span>
              </div>
            </div>
              <div class="form-group">
                <label>Choose image</label>
                <input type="file" name="image" class="form-control">
                @if($post->image)
                <img src="{{ url('images/'.$post->image) }}" style="width:100px;"/>
                @endif
              </div>
              <div class="form-group">
                <label>Choose Image Multi Upload</label>
                <input type="file" name="image_multi[]" class="form-control" multiple>
                @if($post->image_post)
                  @foreach ($post->image_post as $key => $value)
                      <img src="{{ url('images/'.$value->image) }}" style="width:100px;"/>
                  @endforeach
               @endif
              </div>
              <button type="submit" class="btn btn-primary">Submit </button>
           </div>
      </form>
    </div>
  </div>

@endsection
