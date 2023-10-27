@extends('admin.layout.master')
@section('content')
	<div class="row">
        <div class="col-md-12">

			<h2><strong>Edit Category</strong></h2>   
		       @include('errors.message_error')
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
			<form action="{{ url('edit/'.$cat->id.'/billborad') }}" method="post" enctype="multipart/form-data">
			@csrf
			   <div class="col-md-11">
              <div class="form-group">
                <label>Title</label>
                <input type="text" name="name" class="form-control" value="{{ $cat->name }}">
              </div>
              <!-- <div class="form-group">
                <label>Block</label>
                <select name="block" class="form-control">
                  <option value="0" <?php if($cat->block == 0){echo "selected";} ?> >None</option>
                  <option value="1" <?php if($cat->block == 1){echo "selected";} ?> >Block 1</option>
                  <option value="2" <?php if($cat->block == 2){echo "selected";} ?> >Block 2</option>
                  <option value="3" <?php if($cat->block == 3){echo "selected";} ?> >Block 3</option>
                  <option value="4" <?php if($cat->block == 4){echo "selected";} ?> >Block right</option>
                </select>
              </div>
              <div class="form-group">
                <label>Parent</label>
                <select class="form-control" name="parent_id">
                    <?php $cate = App\Category::where('category_type','=','billborad')->get(); ?>
                    <option value="">-- Select Parent --</option>
                      @foreach($cate as $c)
                        <option value="{{$c->id}}" <?php if($c->id == $cat->parent_id){echo "selected";}?> >{{$c->name}}</option>
                      @endforeach
                </select>
              </div> -->
              <fieldset disabled="disabled">
                <div class="form-group">
                  <label for="disabledSelect">ខេត្តក្រុង</label>
                    <select id="disabledSelect" name="display_province" class="form-control">
                      <option value="24" <?php if($cat->display_province == 24){echo "selected";} ?> >រាជធានីភ្នំពេញ</option>
                      <option value="23" <?php if($cat->display_province == 23){echo "selected";} ?> >កណ្ដាល</option>
                      <option value="22" <?php if($cat->display_province == 22){echo "selected";} ?> >តាកែវ</option>
                      <option value="21" <?php if($cat->display_province == 21){echo "selected";} ?> >កំពត</option>
                      <option value="20" <?php if($cat->display_province == 20){echo "selected";} ?> >ព្រះសីហនុ</option>
                      <option value="19" <?php if($cat->display_province == 19){echo "selected";} ?> >កោះកុង</option>
                      <option value="18" <?php if($cat->display_province == 18){echo "selected";} ?> >កំពង់ស្ពឺ</option>
                      <option value="17" <?php if($cat->display_province == 17){echo "selected";} ?> >កំពង់ឆ្នាំង</option>
                      <option value="16" <?php if($cat->display_province == 16){echo "selected";} ?> >ពោធិ៍សាត់</option>
                      <option value="15" <?php if($cat->display_province == 15){echo "selected";} ?> >ប៉ៃលិន</option>
                      <option value="14" <?php if($cat->display_province == 14){echo "selected";} ?> >បាត់ដំបង</option>
                      <option value="13" <?php if($cat->display_province == 13){echo "selected";} ?> >បន្ទាយមានជ័យ</option>
                      <option value="12" <?php if($cat->display_province == 12){echo "selected";} ?> >ឧត្ដរមានជ័យ</option>
                      <option value="11" <?php if($cat->display_province == 11){echo "selected";} ?> >សៀមរាប</option>
                      <option value="10" <?php if($cat->display_province == 10){echo "selected";} ?> >ព្រះវិហារ</option>
                      <option value="9" <?php if($cat->display_province == 9){echo "selected";} ?> >កំពង់ធំ</option>
                      <option value="8" <?php if($cat->display_province == 8){echo "selected";} ?> >កំពង់ចាម</option>
                      <option value="7" <?php if($cat->display_province == 7){echo "selected";} ?> >ស្វាយរៀង</option> 
                      <option value="6" <?php if($cat->display_province == 6){echo "selected";} ?> >ព្រៃវែង</option>
                      <option value="5" <?php if($cat->display_province == 5){echo "selected";} ?> >ត្បូងឃ្មុំ</option>
                      <option value="4" <?php if($cat->display_province == 4){echo "selected";} ?> >ក្រចេះ</option>
                      <option value="3" <?php if($cat->display_province == 3){echo "selected";} ?> >មណ្ឌលគិរី</option>
                      <option value="2" <?php if($cat->display_province == 2){echo "selected";} ?> >រតនគិរី</option>
                      <option value="1" <?php if($cat->display_province == 1){echo "selected";} ?> >ស្ទឹងត្រែង</option>
                      <!-- <option value="ខេត្តកែប">កែប</option> -->
                    </select>
                </div>
              </fieldset>
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status">
                    <option value="1" <?php if($cat->status == 1){echo "selected";} ?> >Active</option>
                    <option value="0" <?php if($cat->status == 0){echo "selected";} ?> >Not Active</option>
                </select>
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="3">{{ $cat->description }}</textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit </button>
              <a href="{{url('billborad')}}" class="btn btn-danger">Back</a>
           </div>
			</form>
		</div>
	</div>
	
@endsection