@extends('admin.layout.master')
@section('content')
  <div class="row">
        <div class="col-md-12">

      <h2><strong>Edit Post</strong></h2>
           @include('errors.message_error')
    </div>
  </div>
  <hr/>
  <div class="row">
    <div class="col-md-12">
      <form action="{{ url('edit/'.$post->id.'/post') }}" method="post" enctype="multipart/form-data">
        @csrf
         <div class="col-md-11">
              <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ $post->title }}">
              </div>
              <div class="form-group">
                <label>Position</label>
                <input type="text" name="position" class="form-control" value="{{ $post->position }}">
              </div>

              <div class="form-group" style="display: -webkit-inline-box;">
                <div class="btn-check">
                    <label for="">show title</label>
                    <label class="switch">
                      <input class="switch-input show_title" type="checkbox" id="switch_check" name="show_title" value="{{$post->action_title}}" 
                      @if($post->action_title==1)
                        checked
                      @else                            
                      @endif
                    >
                      <span class="switch-label" data-on="On" data-off="Off"></span>
                      <span class="switch-handle"></span>
                    </label>
                </div>
                <div class="btn-check">
                  <label for="">show Featured Image</label>
                  <label class="switch">
                    <input class="switch-input show_image_feature" type="checkbox" id="switch_show_image_feature"
                      name="show_image_feature" value="{{$post->show_image_feature}}" 
                      @if($post->show_image_feature==1)
                        checked
                      @else                            
                      @endif
                    >
                    <span class="switch-label" data-on="On" data-off="Off"></span>
                    <span class="switch-handle"></span>
                  </label>
                </div>
              </div>

              <div class="form-group">
                <label>Link</label>
                <input type="text" name="link" class="form-control" value="{{ $post->link }}">
              </div>
              <div class="form-group">
                <label>Categories</label><br>
                  <select class="form-control" name="categorie_id[]">
                  <option value="0">Select Category</option>
                  @if(count($category)>0)
                    @foreach($category as $c)
                      <option value="{{$c->id}}" <?php if(count($post->cate)>0){if($post->cate->first()->id == $c->id){echo "selected";}}?> >{{$c->name}}</option>
                    @endforeach
                  @endif
                </select>
              </div>
              <div class="form-group">
                <label>Post Format</label><br>
                  <select class="form-control" name="categorie_id[]">
                    <option value="0">Select Post Format</option>
                    <option value="standard" <?php  if($post->post_format == 'standard'){echo "selected";}  ?>>Standard</option>
                    <option value="file" <?php  if($post->post_format == 'file'){echo "selected";}  ?>>File</option>
                    <option value="image" <?php  if($post->post_format == 'image'){echo "selected";}  ?>>Image</option>
                    <option value="gallery" <?php  if($post->post_format == 'gallery'){echo "selected";}  ?>>Gallery</option>
                  </select>
              </div>
              <div class="form-group">
                  <label>Language</label>
                  <?php $lang = App\Models\Language::get(); ?>
                  <select class="form-control" name="language">
                    @if(count($lang) > 0)
                      @foreach($lang as $la)
                        <option value="{{ $la->id }}" <?php  if($la->id == $post->language){echo "selected";}  ?>> {{ $la->name }} </option>
                      @endforeach
                    @endif
                  </select>
              </div>
              <div class="form-group">
                <label>Translate</label>
                <select class="form-control" name="translate">
                    <option value="">Select Page</option>
                    @foreach($post_tr as $p)
                        <option value="{{$p->link}}">{{$p->title}}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Link Download</label>
                <textarea name="link_download" class="ckeditor" id="editor" >{{ $post->link_download }}</textarea>
              </div>
              <div class="form-group">
                <label>Facebook Link</label>
                <input type="text" name="location_job" class="form-control" value="{{$post->location_job}}">
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
                  <input type='text' name="publish_date" class="form-control" value="{{ date('d-m-Y h:i:s',strtotime($post->publish_date)) }}"/>
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
                    <img src="{{ url('images/'.$post->image) }}" class="img-close" style="width:100px;"/>
                    <a class="btn btn-danger closes"><i class="fa fa-ban"></i></a>
                    <input type="hidden" name="image_hidden" class="image-hidden" class="form-control" value="{{ $post->image }}">
                @endif
              </div>
              <div class="form-group">
                <label>Choose Image Multi Upload</label>
                <input type="file" id="multi" name="image_multi[]" class="form-control" multiple>
                @if($post->image_post)
                  @foreach ($post->image_post as $key => $value)
                    <img src="{{ url('Galleries/'.$value->image) }}" class="mult-img-close" style="width:100px;"/>
                  @endforeach
                  @if($post->image_post->sum('post_id') > 0)
                    <a class="btn btn-danger mult_closes"><i class="fa fa-ban"></i></a>
                    <input type="hidden" id="mult_image_hidden" name="mult_image_hidden" class="image-hidden" class="form-control" value="1">
                  @endif
               @endif
              </div>
              <button type="submit" class="btn btn-primary">Submit </button>
           </div>
      </form>
    </div>
  </div>
	<script>
	    $(".closes").click(function(){
	        $(this).remove();
	        $(".image-hidden").removeAttr("value");
	        $(".img-close").remove();
	    });
	    
	    $(".mult_closes").click(function(){
	        $(this).remove();
	        $("#mult_image_hidden").attr("value","0");
	        $(".mult-img-close").remove();
	    });
	</script>

  <script>
    $("#switch_check").on('change', function(){
      if($(this).is(':checked')){
         $(this).attr('value','1');
         $(this).attr("checked", "checked");
      }else if($(this).val('" "')){
         $(this).attr('value', '0');
         $(this).removeAttr("checked", "checked");
      }
    });
    $("#switch_show_image_feature").on('change', function () {
    if ($(this).is(':checked')) {
      $(this).attr('value', '1');
      $(this).attr("checked", "checked");
    } else if ($(this).val('" "')) {
      $(this).attr('value', '0');
      $(this).removeAttr("checked", "checked");
    }
  });


    $("#feature_check").on('change', function(){
        if($(this).is(':checked')){
          $(this).attr('value','1');
          $(this).attr("checked", "checked");
        }else if($(this).val('" "')){
          $(this).attr('value', '0');
          $(this).removeAttr("checked", "checked");
        }
    });
</script>

@endsection
<style>
   .switch {
      position: relative;
      display: block;
      vertical-align: top;
      width: 100px;
      height: 30px;
      padding: 3px;
      margin: 0 10px 10px 0;
      background: linear-gradient(to bottom, #eeeeee, #FFFFFF 25px);
      background-image: -webkit-linear-gradient(top, #eeeeee, #FFFFFF 25px);
      border-radius: 18px;
      box-shadow: inset 0 -1px white, inset 0 1px 1px rgba(0, 0, 0, 0.05);
      cursor: pointer;
      box-sizing:content-box;
   }
   .switch-input {
      position: absolute;
      top: 0;
      left: 0;
      opacity: 0;
      box-sizing:content-box;
   }
   .switch-label {
      position: relative;
      display: block;
      height: inherit;
      font-size: 10px;
      text-transform: uppercase;
      background: #eceeef;
      border-radius: inherit;
      box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.12), inset 0 0 2px rgba(0, 0, 0, 0.15);
      box-sizing:content-box;
   }
   .switch-label:before, .switch-label:after {
      position: absolute;
      top: 50%;
      margin-top: -.5em;
      line-height: 1;
      -webkit-transition: inherit;
      -moz-transition: inherit;
      -o-transition: inherit;
      transition: inherit;
      box-sizing:content-box;
   }
   .switch-label:before {
      content: attr(data-off);
      right: 11px;
      color: #aaaaaa;
      text-shadow: 0 1px rgba(255, 255, 255, 0.5);
   }
   .switch-label:after {
      content: attr(data-on);
      left: 11px;
      color: #FFFFFF;
      text-shadow: 0 1px rgba(0, 0, 0, 0.2);
      opacity: 0;
   }
   .switch-input:checked ~ .switch-label {
      background: #02C4FD;
      box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.15), inset 0 0 3px rgba(0, 0, 0, 0.2);
   }
   .switch-input:checked ~ .switch-label:before {
      opacity: 0;
   }
   .switch-input:checked ~ .switch-label:after {
      opacity: 1;
   }
   .switch-handle {
      position: absolute;
      top: 4px;
      left: 4px;
      width: 28px;
      height: 28px;
      background: linear-gradient(to bottom, #FFFFFF 40%, #f0f0f0);
      background-image: -webkit-linear-gradient(top, #FFFFFF 40%, #f0f0f0);
      border-radius: 100%;
      box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
   }
   .switch-handle:before {
      content: "";
      position: absolute;
      top: 50%;
      left: 50%;
      margin: -6px 0 0 -6px;
      width: 12px;
      height: 12px;
      background: linear-gradient(to bottom, #eeeeee, #FFFFFF);
      background-image: -webkit-linear-gradient(top, #eeeeee, #FFFFFF);
      border-radius: 6px;
      box-shadow: inset 0 1px rgba(0, 0, 0, 0.02);
   }
   .switch-input:checked ~ .switch-handle {
      left: 74px;
      box-shadow: -1px 1px 5px rgba(0, 0, 0, 0.2);
   }
   
   /* Transition
   ========================== */
   .switch-label, .switch-handle {
      transition: All 0.3s ease;
      -webkit-transition: All 0.3s ease;
      -moz-transition: All 0.3s ease;
      -o-transition: All 0.3s ease;
   }
</style>