@extends('admin.layout.master')
@section('content')
	<div class="row">
        <div class="col-md-12">

			<h2><strong>Create Slides</strong></h2>   
		       @include('errors.message_error')
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
			<form action="{{ url('create_slide') }}" method="post" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			   <div class="col-md-11">
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
              </div>
              @csrf
              <div class="form-group">
                <label>Language</label>
                <select class="form-control" name="language">
                  @foreach($lang as $langs)
                    <option value="{{ $langs->id }}">{{ $langs->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" placeholder="Enter Description"></textarea>
              </div>
              <!--
              <div class="form-group">
                <label>Choose Page</label><br>
                @if(count($page)>0)
                  @foreach($page as $key => $p)
                  <input type="checkbox" name="page_id[]" value="{{ $p->id }}" <?php //if($p->title == "Unknow" ){ echo "checked"; } ?> > {{ $p->title }} &nbsp;
                  @endforeach
                @endif
              </div>
              -->
              <div class="form-group">
                <label>Type Slide or Logo</label><br>
                <select name="slide_type" class="form-control">
                  <!--<option value="" >Please select slide or logo</option>-->
                @if(count($slide_type)>0)
                  @foreach($slide_type as $key => $st)
                  <option value="{{ $st->id }}">{{ $st->name }}</option>
                  @endforeach
                @endif
                </select>
              </div>
              <div class="form-group">
                <label>Upload File</label>
                 <input type="file" name="images[]" class="form-control" multiple>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

              </div>
              @csrf
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
                              '<td ><input type="text" name="link2[]" id="test'+x+'"class="form-control" ></td>'+
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
                          <th style="width: 60%;">Link Video Youtube</th>
                          <th>Action  <button class="add_field_button2 ">Add</button></th>
                      </tr>
                      <tr>
                        <td style="width: 60%;">
                            <input type="text" name="link2[]" id="input" class="form-control" >
                        </td>
                        <td></td>
                      </tr>
                    </tbody></table>
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
              <button type="submit" class="btn btn-primary">Submit </button>
           </div>
			</form>
		</div>
	</div>
	
@endsection