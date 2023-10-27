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
			<form action="{{ url('create/'.$data->display_province.'/district') }}" method="post" enctype="multipart/form-data">
			@csrf
      <input type="hidden" name="parent_id" value="{{$data->display_province}}">
			   <div class="col-md-11">
              <div class="form-group">
                <label>Title</label>
                <input type="text" name="name" class="form-control">
              </div>
              <fieldset disabled="disabled">
                <div class="form-group">
                  <label for="">ខេត្តក្រុង</label>
                    <select id="client_province" name="display_province" class="form-control">
                      <option value="24" <?php if($data->display_province == 24){echo "selected";} ?> >រាជធានីភ្នំពេញ</option>
                      <option value="23" <?php if($data->display_province == 23){echo "selected";} ?> >កណ្ដាល</option>
                      <option value="22" <?php if($data->display_province == 22){echo "selected";} ?> >តាកែវ</option>
                      <option value="21" <?php if($data->display_province == 21){echo "selected";} ?> >កំពត</option>
                      <option value="20" <?php if($data->display_province == 20){echo "selected";} ?> >ព្រះសីហនុ</option>
                      <option value="19" <?php if($data->display_province == 19){echo "selected";} ?> >កោះកុង</option>
                      <option value="18" <?php if($data->display_province == 18){echo "selected";} ?> >កំពង់ស្ពឺ</option>
                      <option value="17" <?php if($data->display_province == 17){echo "selected";} ?> >កំពង់ឆ្នាំង</option>
                      <option value="16" <?php if($data->display_province == 16){echo "selected";} ?> >ពោធិ៍សាត់</option>
                      <option value="15" <?php if($data->display_province == 15){echo "selected";} ?> >ប៉ៃលិន</option>
                      <option value="14" <?php if($data->display_province == 14){echo "selected";} ?> >បាត់ដំបង</option>
                      <option value="13" <?php if($data->display_province == 13){echo "selected";} ?> >បន្ទាយមានជ័យ</option>
                      <option value="12" <?php if($data->display_province == 12){echo "selected";} ?> >ឧត្ដរមានជ័យ</option>
                      <option value="11" <?php if($data->display_province == 11){echo "selected";} ?> >សៀមរាប</option>
                      <option value="10" <?php if($data->display_province == 10){echo "selected";} ?> >ព្រះវិហារ</option>
                      <option value="9" <?php if($data->display_province == 9){echo "selected";} ?> >កំពង់ធំ</option>
                      <option value="8" <?php if($data->display_province == 8){echo "selected";} ?> >កំពង់ចាម</option>
                      <option value="7" <?php if($data->display_province == 7){echo "selected";} ?> >ស្វាយរៀង</option> 
                      <option value="6" <?php if($data->display_province == 6){echo "selected";} ?> >ព្រៃវែង</option>
                      <option value="5" <?php if($data->display_province == 5){echo "selected";} ?> >ត្បូងឃ្មុំ</option>
                      <option value="4" <?php if($data->display_province == 4){echo "selected";} ?> >ក្រចេះ</option>
                      <option value="3" <?php if($data->display_province == 3){echo "selected";} ?> >មណ្ឌលគិរី</option>
                      <option value="2" <?php if($data->display_province == 2){echo "selected";} ?> >រតនគិរី</option>
                      <option value="1" <?php if($data->display_province == 1){echo "selected";} ?> >ស្ទឹងត្រែង</option>
                      <!-- <option value="ខេត្តកែប">កែប</option> -->
                    </select>
                </div>
              </fieldset>
              <label class="control-label">ស្រុក/ខណ្ឌ</label>
                <div class="controls">
                  <select class="form-control" name="display_district" id="client_district" onchange="myclient_district()" >
                  <!--Phnom Penh-->
                          <option>ជ្រើសរើស​ ស្រុក/ខណ្ឌ</option>
                          @if($data->display_province == 24)
                            <option value="ចំការមន">ចំការមន</option>
                            <option value="ដូនពេញ">ដូនពេញ</option>
                            <option value="៧មករា">៧មករា</option>
                            <option value="ទួលគោក">ទួលគោក</option>
                            <option value="ដង្កោ">ដង្កោ</option>
                            <option value="មានជ័យ">មានជ័យ</option>
                            <option value="ឫស្សីកែវ">ឫស្សីកែវ</option>
                            <option value="សែនសុខ">សែនសុខ</option>
                            <option value="ពោធិ៍សែនជ័យ">ពោធិ៍សែនជ័យ</option>
                            <option value="ជ្រោយចង្វារ">ជ្រោយចង្វារ</option>
                            <option value="ព្រែកព្នៅ">ព្រែកព្នៅ</option>
                            <option value="ច្បារអំពៅ">ច្បារអំពៅ</option>
                          @endif
                  <!--Kandal-->
                          @if($data->display_province == 23)
                          <option value="កណ្ដាលស្ទឹង">កណ្ដាលស្ទឹង</option>
                          <option value="កៀនស្វាយ">កៀនស្វាយ</option>
                          <option value="ខ្សាច់កណ្ដាល">ខ្សាច់កណ្ដាល</option>
                          <option value="កោះធំ">កោះធំ</option>
                          <option value="លើកដែក">លើកដែក</option>
                          <option value="ល្វាឯម">ល្វាឯម</option>
                          <option value="មុខកំពូល">មុខកំពូល</option>
                          <option value="អង្គស្នួល">អង្គស្នួល</option>
                          <option value="ពញាឮ">ពញាឮ</option>
                          <option value="ស្អាង">ស្អាង</option>
                          <option value="ក្រុងតាខ្មៅ">ក្រុងតាខ្មៅ</option>
                          @endif
                  </select>  
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
              <button type="submit" class="btn btn-primary">Submit </button>
              <a href="{{url('billborad')}}" class="btn btn-danger">Back</a>
           </div>
			</form>
		</div>
	</div>
@endsection