@extends('admin.layout.master')
@section('content')
	<div class="row">
        <div class="col-md-12">

			<h2><strong>Update Adverting</strong></h2>   
		       @include('errors.message_error')
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
			<form action="{{ url('ads_edit/'.$data->id.'/edit') }}" method="post" enctype="multipart/form-data">
			@csrf
			   <div class="col-md-12">
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
                              '<td ><input type="file" name="images[]" id="test'+x+'"></td>'+
                              '<td ><input type="text" name="links1[]" ></td>'+
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
                <table class="table table-bordered" border="1px;">
                      <tbody class="input_fields_wrap2">
                        <tr>
                            <th style="width: 60%;">Upload File</th>
                            <th>Link</th>
                            <th>Action  <button class="add_field_button2 ">Add</button></th>
                        </tr>
                        
                        <?php  if(count($data->ads_image)> 0){
                          foreach ($data->ads_image as $key => $ad) {?>
                          <tr>
                          <td style="width: 60%;">
                              <img src="{{ url('Ads/'.$ad->image) }}" width="60px" height="60px">
                              <input type="hidden" name="images1[]" id="input" value="{{ $ad->image }}">
                          </td>
                          <td><input type="text" name="links1[]" id="input" value="<?php if($ad->link !=NULL){echo $ad->link;}else{echo "#";}  ?>"></td>
                          <td><a href="{{ url('delete/'.$ad->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this image?')">Deleted</a></td>
                        </tr>

                        <?php  }}else{?>
                          <tr>
                           <td style="width: 60%;">
                              <input type="file" name="images[]" id="input" >
                          </td>
                          <td><input type="text" name="links1[]" id="input"></td>
                          <td></td>
                          <tr>
                         <?php } ?>
                      </tbody></table>


                </div>
                <div class="form-group">
                    <label>Ads</label>
                    <textarea class="ckeditor" name="text" id="editor">{{$data->text}}</textarea>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option value="1" <?php if($data->status == 1){echo "selected";} ?> >Active</option>
                        <option value="0" <?php if($data->status == 0){echo "selected";} ?> >Not Active</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Facebook Page</label>
                    <input type="text" name="link_fb" class="form-control" value="{{ $data->link_fb }}" />
                </div>
                <div class="form-group">
                    <label>Link Youtube</label>
                    <input type="text" name="link_yt" class="form-control" value="{{ $data->link_yt }}" />
                </div>
                <div class="form-group">
                    <label>Layout</label>
                    <select class="form-control" name="layout">
                        <option value="0" <?php if($data->layout == 0){echo "selected";} ?> >Select Layout </option>
                        <option value="1" <?php if($data->layout == 1){echo "selected";} ?> >Layout 1(Left)</option>
                        <option value="2" <?php if($data->layout == 2){echo "selected";} ?> >Layout 2(Right)</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit </button>
                <button type="reset" class="btn btn-danger">Submit </button>

             </div>
			</form>
		</div>
	</div>
	
@endsection