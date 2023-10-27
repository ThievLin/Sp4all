@extends('admin.layout.master')
@section('content')
	<div class="row">
        <div class="col-md-12">

			<h2><strong>News and Event</strong></h2>
		       @include('errors.message_error')
		</div>
	</div>
	<hr/>
  @if(Request::is('news_events'))
  <div class="row">
		<div class="col-md-12">
		<a href="{{url('news_events/create')}}" class="btn btn-primary create" >
               Add New</a>
			<div class="panel panel-default">
				<div class="panel-heading">
                     List Courses
                </div>
				<div class="panel-body">  
	                <div class="table-responsive">
                  <form method="post"enctype='multipart/form-data'>
                  @csrf
                  <button formaction="{{url('multiple_delete_new_event')}}" type="submit" class="all_delete Delete" style="background:;color:red;margin-bottom:5px;">Delete all selected</button>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                               <tr>
                               <th style="width:40px;"><input type="checkbox" class="selectall check_me_all"> All</th>
                                 <th>Title</th>
                                 <th>Language</th>
                                 <th>Category</th>
                                 <th>Status</th>
                                 <th>Action</th>
                               </tr>
                           </thead>
                           <tbody class="item_list">
                             @if(count($post) > 0 )
                               @foreach($post as $p)
                               <tr>
                               <td><input type="checkbox" class="selectbox check_me" name="ids[]" value="{{$p->id}}"></td>
                                   <td>{{ $p->title }}</td>
                                   <?php $lang = App\Models\Language::get(); ?>
                                   <td>@foreach($lang as $language) @if($language->id == $p->language){{ $language->name }}@endif @endforeach</td>
                                   <td>@if(count($p->cate)>0)
                                         {{ $p->cate->first()->name }}
                                     @else
                                         NULL
                                     @endif

                                   </td>
                                   <td>
                                     @if($p->status == 0)
                                       Not Active
                                     @else
                                       <span>Active</span>
                                     @endif
                                   </td>
                                   <td>
                                     <a href="{{ url('news_events/'.$p->id.'/edit') }}" class="btn btn-primary"><i class="fa fa-edit "></i></a>
                                     <a href="{{ url('news_events/'.$p->id.'/deleted') }}" class="btn btn-danger"><i class="fa fa-ban"></i></a>
                                   </td>
                               </tr>
                             @endforeach
                           @endif
                           </tbody>
                       </table>
                      </form>
	                </div>
	            </div>
	        </div>
		</div>
	</div>
@elseif(Request::is('news_events/create'))
	<div class="row">
		<div class="col-md-12">
			<form action="{{ url('news_events/create') }}" method="post" enctype="multipart/form-data">
			@csrf
      <div class="col-md-6">
           <div class="form-group">
             <label>Title</label>
             <input type="text" name="title" class="form-control">
           </div>

           <div class="form-group" style="display: -webkit-inline-box;">
            <div class="btn-check">
                <label for="">show title</label>
                <label class="switch">
                  <input class="switch-input show_title" type="checkbox" id="switch_check" name="show_title" value="1"
                    checked>
                  <span class="switch-label" data-on="On" data-off="Off"></span>
                  <span class="switch-handle"></span>
                </label>
            </div>
            <div class="btn-check">
              <label for="">show Featured Image</label>
              <label class="switch">
                <input class="switch-input show_image_feature" type="checkbox" id="switch_show_image_feature"
                  name="show_image_feature" value="1" checked>
                <span class="switch-label" data-on="On" data-off="Off"></span>
                <span class="switch-handle"></span>
              </label>
            </div>
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
             <label>Categories</label><br>
               <select class="form-control" name="categorie_id[]">
                 <option value="0">Select Category</option>
                 @if(count($category)>0)
                   @foreach($category as $c)
                     <option value="{{$c->id}}">{{$c->name}}</option>
                   @endforeach
                 @endif
               </select>
           </div>
           <div class="form-group">
             <label>Description</label>
             <textarea name="description" class="ckeditor" id="editor" placeholder="Enter Description"></textarea>
           </div>


        </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Link Download</label>
                <input type="text" name="link_download" class="form-control">
              </div>

              <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status">
                      <option value="1">Active</option>
                      <option value="0">Not Active</option>
                  </select>
              </div>
              <div class="form-group">
                <label>Event Start Date</label>
                  <div class='input-group date' id='datetimepicker1'>
                      <input type='text' name="event_start_date" class="form-control" />
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div>
              </div>

              <div class="form-group">
                <label>Event End Date</label>
                <div class='input-group date' id='datetimepicker2'>
                    <input type='text' name="event_end_date" class="form-control" />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
              </div>
              <div class="form-group">
                <label>Publish Date</label>
                <div class='input-group date' id='datetimepicker3'>
                    <input type='text' name="publish_date" class="form-control" />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
              </div>
              <div class="form-group">
                <label>Unpublish Date</label>
                <div class='input-group date' id='datetimepicker4'>
                    <input type='text' name="unpublish_date" class="form-control" />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
              </div>
              <div class="form-group">
                <label>Choose Image Feature</label>
                <input type="file" name="image" class="form-control">
              </div>
              <div class="form-group">
                <label>Choose Image Multi Upload</label>
                <input type="file" name="image_multi[]" class="form-control" multiple>
              </div>
            </div>
            <div class="col-md-12">
                 <button type="submit" class="btn btn-primary">Submit </button>
            </div>

			</form>
		</div>
	</div>
@elseif(Request::is('news_events/'.$post->id.'/edit'))
<div class="row">
  <div class="col-md-12">
    <form action="{{ url('news_events/'.$post->id.'/edit') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="col-md-6">
         <div class="form-group">
           <label>Title</label>
           <input type="text" name="title" class="form-control" value="{{ $post->title }}">
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
           <label>Description</label>
           <textarea name="description" class="ckeditor" id="editor" >{{ $post->description }}</textarea>
         </div>

      </div>
      <div class="col-md-6">
        <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="status">
                <option value="1" <?php if($post->status == 1){echo "selected";} ?> >Active</option>
                <option value="0" <?php if($post->status == 0){echo "selected";} ?> >Not Active</option>
            </select>
        </div>
        <div class="form-group">
          <label>Link Download</label>
          <input type="text" name="link_download" class="form-control" value="{{ $post->link_download }}">
        </div>
         <div class="form-group">
          <label>Event Start Date</label>
          <div class='input-group date' id='datetimepicker1'>
              <input type='text' name="event_start_date" class="form-control" value="{{ date('d-m-Y H:i:s',strtotime($post->event_start_date)) }}"/>
              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
              </span>
          </div>
        </div>
        <div class="form-group">
          <label>Event End Date</label>
          <div class='input-group date' id='datetimepicker2'>
              <input type='text' name="event_end_date" class="form-control"  value="{{ date('d-m-Y H:i:s',strtotime($post->event_end_date)) }}"/>
              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
              </span>
          </div>
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
              <img src="{{ url('images/'.$post->image) }}" class="img-close" style="width:100px;"/>
              <a class="btn btn-danger closes"><i class="fa fa-ban"></i></a>
              <input type="hidden" name="image_hidden" class="image-hidden" class="form-control" value="{{ $post->image }}">
          @endif
        </div>
        <div class="form-group">
          <label>Choose Image Multi Upload</label>
          <input type="file" name="image_multi[]" class="form-control" multiple>
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
     </div>
      <div class="col-md-12">
           <button type="submit" class="btn btn-primary">Submit </button>
     </div>
    </form>
  </div>
</div>
@endif
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
<script src="{{url('js/multiple_checkbox.js')}}"></script>
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