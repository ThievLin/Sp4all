@extends('admin.layout.master')
@section('content')
	<div class="row">
        <div class="col-md-12">

			<h2><strong>Create Career</strong></h2>
		       @include('errors.message_error')
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
			<form action="{{ url('careers/create') }}" method="post" enctype="multipart/form-data">
			@csrf
			   <div class="col-md-11">
              <div class="form-group">
                <label>Position Title</label>
                <input type="text" name="title" class="form-control">
              </div>
							<div class="form-group">
                  <label>Companey Name</label>
                  <select class="form-control" name="company_id">
                      <option value="">Select Company</option>
											@foreach($company as $co)
                      		<option value="{{ $co->id }}">{{ $co->name }}</option>
											@endforeach
                  </select>
              </div>
							<div class="form-group">
                  <label>Job Category</label>
                  <select class="form-control" name="category_id">
                      <option value="">Select Job Category</option>
											@foreach($category as $co)
                      		<option value="{{ $co->id }}">{{ $co->name }}</option>
											@endforeach
                  </select>
              </div>
              <div class="form-group">
									<div class="col-md-6" style="padding-left:0px">
										<label>Salary Rang From ($)</label>
                			<input type="number" name="s_from_rang" class="form-control">
									</div>
									<div class="col-md-6" style="padding-right:0px">
										<label>Salary Rang To ($)</label>
                			<input type="number" name="s_to_rang" class="form-control">
									</div>
							</div>
              <div class="form-group">
                <label><br\><br\>&nbsp;</label>
                <input type="checkbox" name="is_againt" value="1" > Is Urgent
              </div>
							<div class="form-group">
								<label class="control-label">Location</label>
								<div class="controls">
									<select class="form-control " name="location_job" id="client_province" onchange="myclient_province()">
											<option>Select Province</option>
											<option value="Phnom Penh">Phnom Penh</option>
											<option value="Kandal">Kandal</option>
											<option value="Takéo">Takéo</option>
											<option value="Kampot">Kampot</option>
											<option value="Preah Sihanouk">Preah Sihanouk</option>
											<option value="Koh Kong">Koh Kong</option>
											<option value="Kampong Speu">Kampong Speu</option>
											<option value="Kampong Chhnang">Kampong Chhnang</option>
											<option value="Pursat">Pursat </option>
											<option value="Pailin">Pailin</option>
											<option value="Battambang">Battambang</option>
											<option value="Banteay Meanchey">Banteay Meanchey</option>
											<option value="Oddar Meanchey">Oddar Meanchey</option>
											<option value="Siem Reap">Siem Reap</option>
											<option value="Preah Vihear">Preah Vihear</option>
											<option value="Kampong Thom">Kampong Thom</option>
											<option value="Kampong Cham">Kampong Cham</option>
											<option value="Svay Rieng">Svay Rieng</option>
											<option value="Prey Veng">Prey Veng</option>
											<option value="Tboung Khmum">Tboung Khmum</option>
											<option value="Kratié">Kratié</option>
											<option value="Mondulkiri">Mondulkiri</option>
											<option value="Ratanakiri">Ratanakiri </option>
											<option value="Stung Treng">Stung Treng</option>
											<option value="Kep">Kep</option>
									</select>
								</div>
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
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' name="publish_date" class="form-control" />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
              </div>
              <div class="form-group">
                <label>Close Date</label>
                <div class='input-group date' id='datetimepicker2'>
                    <input type='text' name="unpublish_date" class="form-control" />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
              </div>
              <div class="form-group">
                <label>Choose Image Feature</label>
                <input type="file" name="image" class="form-control">
              </div>
							<div class="form-group">
								<label>Description</label>
								<textarea name="description" class="ckeditor" id="editor" placeholder="Enter Description"></textarea>
							</div>
              <button type="submit" class="btn btn-primary">Submit </button>
           </div>
			</form>
		</div>
	</div>

@endsection
