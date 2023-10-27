@extends('admin.layout.master')
@section('content')
	<div class="row">
        <div class="col-md-12">

			<h2><strong>Create Galleries</strong></h2>   
		       @include('errors.message_error')
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
			<form action="{{ url('create_galleries') }}" method="post" enctype="multipart/form-data">
        @csrf
			   <div class="col-md-11">
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
              </div>
              {{ csrf_field() }}
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
                <label>Page</label>
                  <select name="post_id" class="form-control">
                  <option value="0">Please select page</option>
                    @if(count($page)>0)
                      @foreach($page as $p)
                        <option value="{{ $p->id }}">{{ $p->title }}</option>
                      @endforeach
                    @endif
                </select>
              </div>
              <div class="form-group">
                <label>Categories Gallery</label><br>
                <select name="category_galleries" class="form-control">
                @if(count($cat_gallery)>0)
                  @foreach($cat_gallery as $key => $cg)
                  <option value="{{ $cg->id }}">{{ $cg->name }}</option>
                  @endforeach
                @endif
                </select>
              </div>
              <div class="form-group">
                <label>Choose Image Feature</label>
                <input type="file" name="feature_image" class="form-control">
              </div>
              <div class="form-group">
                <label>Upload File</label>
                 <input type="file" name="images[]" class="form-control" multiple>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
              </div>
              {{ csrf_field() }}
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
              <button type="submit" class="btn btn-primary">Submit </button>
           </div>
			</form>
		</div>
	</div>
	
@endsection