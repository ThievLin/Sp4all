@extends('admin.layout.master')
@section('content')
  <div class="row">
        <div class="col-md-12">

      <h2><strong>Edit Slides</strong></h2>   
           @include('errors.message_error')
    </div>
  </div>
  <hr/>
  <div class="row">
    <div class="col-md-12">
      <form action="{{ url('slide/'.$slide_id->id.'/edit') }}" method="post" enctype="multipart/form-data">
      @csrf
         <div class="col-md-11">
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ $slide_id->name }}">
              </div>
              <div class="form-group">
                <label>Language</label>
                <select class="form-control" name="language">
                  @foreach($lang as $langs)
                    <option value="{{ $langs->id }}"<?php if($langs->id == $slide_id->language){echo "selected";} ?>>{{ $langs->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" placeholder="Enter Description">{{ $slide_id->description }}</textarea>
              </div>
              <!-- <div class="form-group">
                <label>Choose Page</label><br>
                @if(count($page)>0)
                  @foreach($page as $key => $p)
                  <input type="checkbox" name="page_id[]" value="{{ $p->id }}" <?php  //foreach($slide_post as $sp){if($sp->post_id == $p->id){ echo "checked";  }}  ?>  > {{ $p->title }} &nbsp;
                  @endforeach
                @endif
              </div>
               -->
              {{ csrf_field() }}
              <div class="form-group">
                <label>Slides Type</label><br>
                <select name="slide_type" class="form-control">
                  <option value="" >Please select logo or slide type</option>
                @if(count($slide_type)>0)
                  @foreach($slide_type as $st)
                  <option value="{{ $st->id }}" <?php if($slide_id->slide_type){ if($slide_id->slide_type->id == $st->id){echo "selected";} } ?> >{{ $st->name }}</option>
                  @endforeach
                @endif
                </select>
              </div>

              <div class="form-group">
                    
                    <script type="text/javascript">
                        // Get File Name from Input text
                    $(document).ready(function() {
                      var max_fields      = 100; //maximum input boxes allowed
                      var wrapper         = $(".input_fields_wrap2"); //Fields wrapper
                      var add_button      = $(".add_field_button2"); //Add button ID
                     
                      var x = 1; //initlal text box count
                      $(add_button).click(function(e){ //on add input button click
                          e.preventDefault();
                          if(x < max_fields){ //max input box allowed
                              x++; //text box increment
                              $(wrapper).append('<tr>'+
                              '<td ><input type="file" name="images[]" id="test'+x+'" multiple ></td>'+
                              '<td><button type="button" class="removebutton btn btn-danger" title="Remove this row">Deleted</button></td>'+
                              '</tr>'); //add input box
                            
                          }
                      if(x < max_fields){
                        $('#test'+x).change(function(e){
                        var filename = e.target.files[0].name;
                        document.getElementById('demo'+x).innerHTML = filename;
                      });
                    }
                      });
                  });
                  $(document).ready(function(){
                    $('#input').change(function(e){
                      var filename = e.target.files[0].name;
                      document.getElementById('demo').innerHTML= filename;
                    });
                  });
                  // Remove Row in table
                  $(document).on('click', 'button.removebutton', function(){
                    alert("You are delete Successfull!");
                    $(this).closest('tr').remove();
                    return false;
                  });
                </script>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <!--<table class="table table-bordered" border="1px;">-->
                <!--    <tbody class="input_fields_wrap2">-->
                <!--      <tr>-->
                <!--          <th style="width: 60%;">Upload File</th>-->
                <!--          <th>Link</th>-->
                <!--          <th>Action  <button class="add_field_button2 ">Add</button></th>-->
                <!--      </tr>-->
                <!--      <tr>-->
                <!--        <td style="width: 60%;">-->
                <label>Upload File</label>
                            <input class="form-control" type="file" name="images[]" id="input" multiple>
                            @foreach($slide_id->slide_image as $sg)
                              <img src="{{ url('Galleries/'.$sg->image) }}" class="mult-img-close" style="width:50px; height: 50px;"/>
                            @endforeach
                            @if($slide_id->slide_image->sum('slide_id') > 0)
                                <a class="btn btn-danger mult_closes"><i class="fa fa-ban"></i></a>
                                <input type="hidden" id="mult_image_hidden" name="mult_image_hidden" class="image-hidden" class="form-control" value="1">
                              @endif
                    <!--    </td>-->
                    <!--    <td></td>-->
                    <!--    <td></td>-->
                    <!--  </tr>-->
                    <!--</tbody></table>-->
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
                <input type="Date" value="{{ $slide_id->publish_date }}"name="publish_date" class="form-control">
              </div>
              <div class="form-group">
                <label>Unpublish Date</label>
                <input type="Date" value="{{ date('d-m-Y h:i:s',strtotime($slide_id->unpublish_date)) }}" name="unpublish_date" class="form-control">
              </div>
              <button type="submit" class="btn btn-primary">Submit </button>
           </div>
      </form>
    </div>
  </div>
<script>
    $(".mult_closes").click(function(){
        $(this).remove();
        $("#mult_image_hidden").attr("value","0");
        $(".mult-img-close").remove();
    });
</script>
@endsection