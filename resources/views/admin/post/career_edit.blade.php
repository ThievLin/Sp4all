@extends('admin.layout.master')
@section('content')
  <div class="row">
        <div class="col-md-12">

      <h2><strong>Edit Career</strong></h2>
           @include('errors.message_error')
    </div>
  </div>
  <hr/>
  <div class="row">
    <div class="col-md-12">
      <form action="{{ url('careers/'.$post->id.'/edit') }}" method="post" enctype="multipart/form-data">
      @csrf
         <div class="col-md-11">
              <div class="form-group">
                <label>Position Title</label>
                <input type="text" name="title" class="form-control" value="{{ $post->title }}">
              </div>
              <div class="form-group">
                  <label>Companey Name</label>
                  <select class="form-control" name="company_id">
                      <option value="">Select Company</option>
											@foreach($company as $co)
                      		<option value="{{ $co->id }}"  <?php if(count($post->company)>0){if($post->company->first()->id == $co->id){echo "selected";}}?> >{{ $co->name }}</option>
											@endforeach
                  </select>
              </div>
							<div class="form-group">
                  <label>Job Category</label>
                  <select class="form-control" name="category_id">
                      <option value="">Select Job Category</option>
											@foreach($category as $co)
                      		<option value="{{ $co->id }}"  <?php if(count($post->cate)>0){if($post->cate->first()->id == $co->id){echo "selected";}}?> >{{ $co->name }}</option>
											@endforeach
                  </select>
              </div>
              <div class="form-group">
									<div class="col-md-6" style="padding-left:0px">
										<label>Salary Rang From ($)</label>
                			<input type="number" name="s_from_rang" class="form-control" value="{{ $post->s_from_rang }}">
									</div>
									<div class="col-md-6" style="padding-right:0px">
										<label>Salary Rang To ($)</label>
                			<input type="number" name="s_to_rang" class="form-control" value="{{ $post->s_to_rang }}">
									</div>
							</div>
              <div class="form-group">
                <label>&nbsp;</label>
                <input type="checkbox" name="is_againt" <?php if($post->is_againt){ echo " checked "; } ?> value="1" > Is Urgent
              </div>
              <div class="form-group">
                <label class="control-label">Location</label>
                <div class="controls">
                  <select class="form-control " name="location_job" >
                      <option value="Phnom Penh" <?php if($post->location_job == "Phnom Penh"){echo "selected";} ?> >Phnom Penh</option>
                      <option value="Kandal" <?php if($post->location_job == "Kandal"){echo "selected";} ?> >Kandal</option>
                      <option value="Takéo" <?php if($post->location_job == "Takéo"){echo "selected";} ?> >Takéo</option>
                      <option value="Kampot" <?php if($post->location_job == "Preah Sihanouk"){echo "selected";} ?> >Kampot</option>
                      <option value="Preah Sihanouk" <?php if($post->location_job == "Kandal"){echo "selected";} ?> >Preah Sihanouk</option>
                      <option value="Koh Kong" <?php if($post->location_job == "Koh Kong"){echo "selected";} ?> >Koh Kong</option>
                      <option value="Kampong Speu" <?php if($post->location_job == "Kampong Speu"){echo "selected";} ?> >Kampong Speu</option>
                      <option value="Kampong Chhnang" <?php if($post->location_job == "Kampong Chhnang"){echo "selected";} ?> >Kampong Chhnang</option>
                      <option value="Pursat" <?php if($post->location_job == "Pursat"){echo "selected";} ?> >Pursat </option>
                      <option value="Pailin" <?php if($post->location_job == "Pailin"){echo "selected";} ?> >Pailin</option>
                      <option value="Battambang" <?php if($post->location_job == "Battambang"){echo "selected";} ?> >Battambang</option>
                      <option value="Banteay Meanchey" <?php if($post->location_job == "Banteay Meanchey"){echo "selected";} ?> >Banteay Meanchey</option>
                      <option value="Oddar Meanchey" <?php if($post->location_job == "Oddar Meanchey"){echo "selected";} ?> >Oddar Meanchey</option>
                      <option value="Siem Reap" <?php if($post->location_job == "Siem Reap"){echo "selected";} ?> >Siem Reap</option>
                      <option value="Preah Vihear" <?php if($post->location_job == "Preah Vihear"){echo "selected";} ?> >Preah Vihear</option>
                      <option value="Kampong Thom" <?php if($post->location_job == "Kampong Thom"){echo "selected";} ?> >Kampong Thom</option>
                      <option value="Kampong Cham" <?php if($post->location_job == "Kampong Cham"){echo "selected";} ?> >Kampong Cham</option>
                      <option value="Svay Rieng" <?php if($post->location_job == "Svay Rieng"){echo "selected";} ?> >Svay Rieng</option>
                      <option value="Prey Veng" <?php if($post->location_job == "Prey Veng"){echo "selected";} ?> >Prey Veng</option>
                      <option value="Tboung Khmum" <?php if($post->location_job == "Tboung Khmum"){echo "selected";} ?> >Tboung Khmum</option>
                      <option value="Kratié" <?php if($post->location_job == "Kratié"){echo "selected";} ?> >Kratié</option>
                      <option value="Mondulkiri" <?php if($post->location_job == "Mondulkiri"){echo "selected";} ?> >Mondulkiri</option>
                      <option value="Ratanakiri"  <?php if($post->location_job == "Ratanakiri"){echo "selected";} ?> >Ratanakiri </option>
                      <option value="Stung Treng"  <?php if($post->location_job == "Stung Treng"){echo "selected";} ?> >Stung Treng</option>
                      <option value="Kep"  <?php if($post->location_job == "Kep"){echo "selected";} ?> >Kep</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status">
                      <option value="1" <?php if($post->status == 1){echo "selected";} ?> >Active</option>
                      <option value="0" <?php if($post->status == 0){echo "selected";} ?> >Not Active</option>
                  </select>
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
                <label>Close Date</label>
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
                <img src="{{ url('images/'.$post->image) }}" style="width:100px;"/>
                @endif
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="ckeditor" id="editor" >{{ $post->description }}</textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit </button>
           </div>
      </form>
    </div>
  </div>

@endsection
