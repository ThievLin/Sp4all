@extends('admin.layout.master')
@section('content')
	<div class="row">
        <div class="col-md-12">

			<h2><strong>Create Billborad</strong></h2>   
		       @include('errors.message_error')
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
			<form action="{{ url('create_billborad') }}" method="post" enctype="multipart/form-data">
			@csrf
			   <div class="col-md-11">
              <div class="form-group">
                <label>Title</label>
                <input type="text" name="name" class="form-control">
              </div>
              <!-- <div class="form-group">
                <label>Block</label>
                <select name="block" class="form-control">
                  <option value="0">None</option>
                  <option value="1">Block 1</option>
                  <option value="2">Block 2</option>
                  <option value="3">Block 3</option>
                  <option value="4">Block right</option>
                </select>
              </div> 
              <div class="form-group">
                <label>Parent</label>
                <select name="parent_id" class="form-control">
                  <?php $cate = App\Models\Category::where('category_type','=','billborad')->get(); ?>
                  <option value="">-- Select Parent --</option>
                  @foreach($cate as $c)
                    <option value="{{$c->id}}">{{$c->name}}</option>
                  @endforeach
                </select>
              </div> -->
              <div class="form-group">
                <label class="control-label">ខេត្តក្រុង</label>
                <div class="controls">
                  <select class="form-control " name="display_province" id="client_province" onchange="myclient_province()">
                      <option>ជ្រើសរើស​ ខេត្តក្រុង</option>
                      <option value="24">រាជធានីភ្នំពេញ</option>
                      <option value="23">កណ្ដាល</option>
                      <option value="22">តាកែវ</option>
                      <option value="21">កំពត</option>
                      <option value="20">ព្រះសីហនុ</option>
                      <option value="19">កោះកុង</option>
                      <option value="18">កំពង់ស្ពឺ</option>
                      <option value="17">កំពង់ឆ្នាំង</option>
                      <option value="16">ពោធិ៍សាត់</option>
                      <option value="15">ប៉ៃលិន</option>
                      <option value="14">បាត់ដំបង</option>
                      <option value="13">បន្ទាយមានជ័យ</option>
                      <option value="12">ឧត្ដរមានជ័យ</option>
                      <option value="11">សៀមរាប</option>
                      <option value="10">ព្រះវិហារ</option>
                      <option value="9">កំពង់ធំ</option>
                      <option value="8">កំពង់ចាម</option>
                      <option value="7">ស្វាយរៀង</option> 
                      <option value="6">ព្រៃវែង</option>
                      <option value="5">ត្បូងឃ្មុំ</option>
                      <option value="4">ក្រចេះ</option>
                      <option value="3">មណ្ឌលគិរី</option>
                      <option value="2">រតនគិរី</option>
                      <option value="1">ស្ទឹងត្រែង</option>
                      <!-- <option value="ខេត្តកែប">កែប</option> -->
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                	<option value="1">Active</option>
                	<option value="0">Not Active</option>
                </select>
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
              </div>
              <div class="form-group">
                <label>Image</label>
                <input type="file" name="img" value="" class="form-control">
              </div>
              <!-- <div class="form-group">
                <label>Publish Date</label>
                <input type="date" name="publish_date" class="form-control"></textarea>
              </div>
              <div class="form-group">
                <label>Unpublish Date</label>
                <input type="date" name="unpublish_date" class="form-control"></textarea>
              </div> -->
              <button type="submit" class="btn btn-primary">Submit </button>
              <a href="{{url('billborad')}}" class="btn btn-danger">Back</a>
           </div>
			</form>
		</div>
	</div>
	
@endsection