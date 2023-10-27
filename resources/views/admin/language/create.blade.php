@extends('admin.layout.master')
@section('content')
<div class="row">
    <div class="col-md-12">

        <h2><strong>Create Language</strong></h2>
            @include('errors.message_error')
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-md-12">
        <form action="{{ url('lang/create') }}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="col-md-11">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>ZipCode</label>
                    <input type="text" name="zipcode" class="form-control">
                </div>
                <div class="form-group">
                    <label>Code</label>
                    <input type="text" name="code" class="form-control">
                </div>
                <div class="form-group">
                    <label>Choose image</label>
                    <input type="file" name="image" class="form-control">
                </div>
            
            <button type="submit" class="btn btn-primary">Submit </button>
        </div>
        </form>
    </div>
</div>

@endsection
