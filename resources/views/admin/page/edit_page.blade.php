@extends('admin.layout.master')
@section('content')
  <div class="row">
        <div class="col-md-12">

      <h2><strong>Edit Page</strong></h2>
           @include('errors.message_error')
    </div>
  </div>
  <hr/>
  <div class="row">
    <div class="col-md-12">
      <form action="{{ url('page_edit/'.$page->id.'/edit') }}" method="post" enctype="multipart/form-data">
      @csrf
         <div class="col-md-6">
              <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ $page->title }}">
              </div>
              <div class="form-group">
                <label>Link</label>
                <input type="text" name="link" class="form-control" value="{{ $page->link }}">
              </div>
              <div class="form-group">
                  <label>Language</label>
                  <?php $lang = App\Models\Language::get(); ?>
                  <select class="form-control" name="language">
                    @if(count($lang) > 0)
                      @foreach($lang as $la)
                        <option value="{{ $la->id }}" <?php  if($la->id == $page->language){echo "selected";}  ?>> {{ $la->name }} </option>
                      @endforeach
                    @endif
                  </select>
              </div>
              <div class="form-group">
                  <label>Menu Type</label>
                    <select name="menu_id" class="form-control">
                      <option value="">Please select menu</option>
                      @if(count($menu)>0)
                      @foreach($menu as $p)
                        <option value="{{ $p->id }}" <?php if(count($page->menus)>0){if($page->menus->first()->id == $p->id){echo "selected";}}?> >{{  $p->name }}</option>
                      @endforeach
                      @endif
                    </select>
              </div>
              <div class="form-group">
                 <label>Choose Template </label>
                  <select name="template" class="form-control" id="select">
                  <option value="">Please select Template</option>
                      <option value="fullwidth" <?php if($page->template == "fullwidth"){echo "selected";}  ?> >Fullwidth</option>
                      <!-- <option value="left_sidebar"  <?php if($page->template == "left_sidebar"){echo "selected";}  ?>> Left Sidebar</option>
                      <option value="right_sidebar"  <?php if($page->template == "right_sidebar"){echo "selected";}  ?>>Right Sidebar</option> -->
                </select>
              </div>

              <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="ckeditor" id="editor" >{{ $page->description }}</textarea>
              </div>
              <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status">
                      <option value="1" <?php if($page->status == 1){echo "selected";} ?> >Active</option>
                      <option value="0" <?php if($page->status == 0){echo "selected";} ?> >Not Active</option>
                  </select>
              </div>
              <div class="form-group">
              <label>Publish Date</label>
              <div class='input-group date' id='datetimepicker1'>
                  <input type='text' name="publish_date" class="form-control" value="{{ date('d-m-Y',strtotime($page->publish_date)) }}"/>
                  <span class="input-group-addon"><span class="glyphicon    glyphicon-calendar"></span>
                  </span>
              </div>
            </div>
            <div class="form-group">
              <label>Unpublish Date</label>
              <div class='input-group date' id='datetimepicker2'>
                  <input type='text' name="unpublish_date" class="form-control"  value="{{ date('d-m-Y',strtotime($page->unpublish_date)) }}"/>
                  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                  </span>
              </div>
            </div>
              <div class="form-group">
                <label>Choose image</label>
                <input type="file" name="image" class="form-control">
               @if($page->image)
                  <img src="{{ url('images/'.$page->image) }}" style="width:70px;"/>
               @endif
              </div>

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
          @if(count($page->page_cat_posi) > 0)
            	@foreach($page->page_cat_posi as $key => $pc)
                 <tr id="add_row">
                   <td>
                     <select class="form-control" name="categorie_id[]">
                       @if(count($category)>0)
                       <option value="">Select Catgory</option>
                         @foreach($category as $key => $cat)
                            @if($cat->category_type != "branch")
                              <option value="{{ $cat->id }}" <?php if($pc->categorie_id == $cat->id){ echo "selected";} ?> >{{ $cat->name }}</option>
                            @endif
                          @endforeach
                       @endif
                     </select>
                   </td>

                   <td>
                     <select class="form-control" name="position[]">
                         <option value="position_1" <?php if($pc->position == "position_1"){echo "selected";} ?> >Position 1</option>
                         <option value="position_2" <?php if($pc->position == "position_2"){echo "selected";} ?> >Position 2</option>
                         <option value="position_3" <?php if($pc->position == "position_3"){echo "selected";} ?> >Position 3</option>
                         <option value="position_4" <?php if($pc->position == "position_4"){echo "selected";} ?> >Position 4</option>
                         <option value="position_5" <?php if($pc->position == "position_5"){echo "selected";} ?> >Position 5</option>
                         <option value="position_6" <?php if($pc->position == "position_6"){echo "selected";} ?> >Position 6</option>
                         <option value="position_7" <?php if($pc->position == "position_7"){echo "selected";} ?> >Position 7</option>
                         <option value="position_8" <?php if($pc->position == "position_8"){echo "selected";} ?> >Position 8</option>
                         <option value="position_9" <?php if($pc->position == "position_9"){echo "selected";} ?> >Position left (only for template left Sidebar)</option>
                         <option value="position_10" <?php if($pc->position == "position_10"){echo "selected";} ?> >Position right (only for template left Sidebar)</option>
                     </select>
                   </td>
                   <td><a href="#" class="btn btn-danger remove_rows" >delete</a></td>
                 </tr>
              @endforeach
            @endif
               </body>
             </table>
           </div>
             <div class="col-md-12">
                  <button type="submit" class="btn btn-primary">Submit </button>
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
                         '<td>'+
                         '<select class="form-control" name="categorie_id[]">' +
                           '@if(count($category)>0)' +
                           '<option value="">Select Catgory</option>' +
                             '@foreach($category as $key => $cat)' +
                              '@if($cat->category_type != "branch")' +
                                 '<option value="{{ $cat->id }}">{{ $cat->name }}</option>' +
                              '@endif' +
                             '@endforeach' +
                           '@endif' +
                         '</select>'  +
                         '</td>'  +
                        '<td>'+
                           '<select class = "form-control"name="position[]">' +
                           '<option value = "position_1">Position 1</option>' +
                           '<option value = "position_2">Position 2</option>' +
                           '<option value = "position_3">Position 3</option>' +
                           '<option value = "position_4">Position 4</option>' +
                           '<option value = "position_5">Position 5</option>' +
                           '<option value = "position_6">Position 6</option>' +
                           '<option value = "position_7">Position 7</option>' +
                           '<option value = "position_8">Position 8</option>' +
                          '<option value = "position_9">Position left (only for template left Sidebar)</option>' +
                          '<option value="position_10">Position right (only for template right Sidebar)</option>' +
                         '</select>'+
                         '</td>'+
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
