@extends('admin.layout.master')
@section('content')
  <div class="row">
        <div class="col-md-12">

      <h2><strong>Edit Galleries</strong></h2>   
           @include('errors.message_error')
    </div>
  </div>
  <hr/>
  <div class="row">
    <div class="col-md-12">
      <form action="{{ url('galleries/'.$gallery_id->id.'/edit') }}" method="post" enctype="multipart/form-data">
     @csrf
         <div class="col-md-11">
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ $gallery_id->name }}">
              </div>
              <div class="form-group">
                  <label>Language</label>
                  <?php $lang = App\Models\Language::get(); ?>
                  <select class="form-control" name="language">
                    @if(count($lang) > 0)
                      @foreach($lang as $la)
                        <option value="{{ $la->id }}" <?php  if($la->id == $gallery_id->language){echo "selected";}  ?>> {{ $la->name }} </option>
                      @endforeach
                    @endif
                  </select>
              </div>
              <div class="form-group">
                <label>Page</label>
                  <select name="post_id" class="form-control">
                  <option value="0">Please select page</option>
                    @if(count($page)>0)
                      @foreach($page as $p)
                        <option value="{{ $p->id }}" <?php if(count($gallery_id->posts_gallery) > 0 ){ if($gallery_id->posts_gallery->first()->id == $p->id){echo "selected";} } ?> >{{ $p->title }}</option>
                      @endforeach
                    @endif
                </select>
              </div>
              {{ csrf_field() }}
              <div class="form-group">
                <label>Categories Gallery</label><br>
                <select name="category_galleries" class="form-control">
                @if(count($cat_gallery)>0)
                  @foreach($cat_gallery as $cg)
                  <option value="{{ $cg->id }}" <?php if(count($gallery_id->cat_gallery) > 0 ){ if($gallery_id->cat_gallery->id == $cg->id){echo "selected";} } ?> >{{ $cg->name }}</option>
                  @endforeach
                @endif
                </select>
              </div>
              <div class="form-group">
                <label>Choose Image Feature</label>
                <input type="file" name="feature_image" class="form-control">
              </div>
              @if($gallery_id->feature_image)
                  <img src="{{ url('Galleries/'.$gallery_id->feature_image) }}" class="img-close" style="width:100px;"/>
                  <a class="btn btn-danger closes"><i class="fa fa-ban"></i></a>
                  <input type="hidden" name="image_hidden" class="image-hidden" class="form-control" value="{{ $gallery_id->feature_image }}">
              @endif
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
                            <input type="file" class="form-control" name="images[]" id="input" multiple>
                            @foreach($gallery_id->gallerie_image as $g)
                              <img src="{{ url('Galleries/'.$g->image) }}" class="mult-img-close" style="width:50px; height: 50px;"/>
                            @endforeach
                            @if($gallery_id->gallerie_image->sum('gallery_id') > 0)
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
                      <option value="1" <?php if($gallery_id->status == 1){echo "selected";} ?> >Active</option>
                      <option value="0" <?php if($gallery_id->status == 0){echo "selected";} ?> >Not Active</option>
                  </select>
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