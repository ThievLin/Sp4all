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
			<form action="{{ url('edit/'.$cat->id.'/category') }}" method="post">
			@csrf
			   <div class="col-md-11">
              <div class="form-group">
                <label>Title</label>
                <input type="text" name="name" class="form-control" value="{{ $cat->name }}">
              </div>
							<div class="form-group">
                  <label>Language</label>
                  <?php $lang = App\Models\Language::get(); ?>
                  <select class="form-control" name="language">
                    @if(count($lang) > 0)
                      @foreach($lang as $la)
                        <option value="{{ $la->id }}" <?php  if($la->id == $cat->language){echo "selected";}  ?>> {{ $la->name }} </option>
                      @endforeach
                    @endif
                  </select>
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="ckeditor" id="editor" class="form-control" rows="3">{{ $cat->description }}</textarea>
              </div>
              <div class="form-group">
                <label>Style</label>
								<select name="block" class="form-control">
									<option value="non">None</option>
                  <option value="home" <?php if($cat->block == "home"){ echo "selected";}  ?> >Home</option>
                  <option value="slidebanner" <?php if($cat->block == "slidebanner"){ echo "selected";}  ?> >slidebanner</option>
                  <option value="welcome_sec" <?php if($cat->block == "welcome_sec"){ echo "selected";}  ?> >welcome_sec</option>
                  <option value="welcome_intro" <?php if($cat->block == "welcome_intro"){ echo "selected";}  ?> >welcome_intro</option>
                  <option value="welcome_banner" <?php if($cat->block == "welcome_banner"){ echo "selected";}  ?> >welcome_banner</option>
                  <option value="cpaplanning" <?php if($cat->block == "cpaplanning"){ echo "selected";}  ?> >cpaplanning</option>
                  <option value="parallax" <?php if($cat->block == "parallax"){ echo "selected";}  ?> >parallax</option>
                  <option value="callaction" <?php if($cat->block == "callaction"){ echo "selected";}  ?> >callaction</option>
                  <option value="about-oxfam" <?php if($cat->block == "about-oxfam"){ echo "selected";}  ?> >about-oxfam</option>
                  <option value="about-container" <?php if($cat->block == "about-container"){ echo "selected";}  ?> >about-container</option>
                  <option value="getintouch" <?php if($cat->block == "getintouch"){ echo "selected";}  ?> >getintouch</option>
                  <option value="contact-us-cat" <?php if($cat->block == "contact-us-cat"){ echo "selected";}  ?> >contact-us-cat</option>
                  <option value="about-addition" <?php if($cat->block == "about-addition"){ echo "selected";}  ?> >about-addition</option>

                  <option value="about" <?php if($cat->block == "about"){ echo "selected";}  ?> >About</option>
                  <option value="inner_banner" <?php if($cat->block == "inner_banner"){ echo "selected";}  ?> >inner_banner</option>

                  <option value="mission" <?php if($cat->block == "mission"){ echo "selected";}  ?> >Our Mission & Vision</option>
                  <option value="overview" <?php if($cat->block == "overview"){ echo "selected";}  ?> >Overview</option>
                  <option value="getinvolved" <?php if($cat->block == "getinvolved"){ echo "selected";}  ?> >Get Involved</option>

                  <option value="ourcpa" <?php if($cat->block == "ourcpa"){ echo "selected";}  ?> >Our CPA</option>
                  <option value="abounlue" <?php if($cat->block == "abounlue"){ echo "selected";}  ?> >Aboun Lue</option>
                  <option value="nglav" <?php if($cat->block == "nglav"){ echo "selected";}  ?> >O'nglav</option>
                  <option value="yuoknamram" <?php if($cat->block == "yuoknamram"){ echo "selected";}  ?> >Youknamram</option>
                  <option value="chammarek" <?php if($cat->block == "chammarek"){ echo "selected";}  ?> >Cham marek</option>

                  <option value="ourcf" <?php if($cat->block == "ourcf"){ echo "selected";}  ?> >Our CF</option>                 
                  <option value="yaynheb" <?php if($cat->block == "yaynheb"){ echo "selected";}  ?> >yaynheb</option>
                  <option value="seangveal" <?php if($cat->block == "seangveal"){ echo "selected";}  ?> >seangveal</option>
                  <option value="angkobthom" <?php if($cat->block == "angkobthom"){ echo "selected";}  ?> >angkobthom</option>
                  <option value="kladaek" <?php if($cat->block == "kladaek"){ echo "selected";}  ?> >kladaek</option>
                  <option value="pongrong" <?php if($cat->block == "pongrong"){ echo "selected";}  ?> >pongrong</option>
                  <option value="ousom" <?php if($cat->block == "ousom"){ echo "selected";}  ?> >ousom</option>
                  <option value="kbalkmoch" <?php if($cat->block == "kbalkmoch"){ echo "selected";}  ?> >kbalkmoch</option>

                  <option value="action" <?php if($cat->block == "action"){ echo "selected";}  ?> >Action</option>
                  <option value="stakeholder" <?php if($cat->block == "stakeholder"){ echo "selected";}  ?> >Stakeholder</option>
                  <option value="contact" <?php if($cat->block == "contact"){ echo "selected";}  ?> >Contact</option>
 								</select>
              </div>
              <div class="form-group">
                <label>Parent</label>
                <select class="form-control" name="parent_id">
								<?php $cate = App\Models\Category::where('category_type','=','category')->get(); ?>
										<<option value="">Select Parent Category</option>
                    @foreach($cate as $c)
                      <option value="{{$c->id}}" <?php if($c->id == $cat->parent_id){echo "selected";}?> >{{$c->name}}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status">
                    <option value="1" <?php if($cat->status == 1){echo "selected";} ?> >Active</option>
                    <option value="0" <?php if($cat->status == 0){echo "selected";} ?> >Not Active</option>
                </select>
              </div>

              <div class="form-group">
								<label>Publish Date</label>
								<div class='input-group date' id='datetimepicker1'>
										<input type='text' name="publish_date" class="form-control" value="{{ date('d-m-Y',strtotime($cat->publish_date)) }}"/>
										<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
										</span>
								</div>
							</div>
							<div class="form-group">
								<label>Unpublish Date</label>
								<div class='input-group date' id='datetimepicker2'>
										<input type='text' name="unpublish_date" class="form-control" value="{{ date('d-m-Y',strtotime($cat->unpublish_date)) }}"/>
										<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
										</span>
								</div>
							</div>
              <button type="submit" class="btn btn-primary">Submit </button>
           </div>
			</form>
		</div>
	</div>

@endsection
