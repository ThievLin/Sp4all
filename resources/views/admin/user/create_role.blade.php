@extends('admin.layout.master')
@section('content')
	<div class="row">
        <div class="col-md-12">

			<h2><strong>Role Create</strong></h2>   
		       @include('errors.message_error')
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
			<form action="{{ url('create_roles') }}" method="post">
			@csrf
			   <div class="col-md-8">
				<div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="name"/>
        
                </div>
                <div class="form-group">
                    <label>Display Name</label>
                    <input class="form-control" name="display_name"/>
                </div>
                <div class="form-group">
                    <label>Discription</label>
                    <textarea class="form-control" name="description" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit </button>

             </div>
			</form>
		</div>
	</div>
	
@endsection