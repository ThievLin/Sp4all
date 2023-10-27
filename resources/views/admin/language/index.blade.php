@extends('admin.layout.master')
@section('content')
<div class="row">
    <div class="col-md-12">

        <h2><strong>Language</strong></h2>
            @include('errors.message_error')
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-md-12">
    <a href="{{url('lang/create')}}" class="btn btn-primary create">
           Create Language</a>
        <div class="panel panel-default">
            <div class="panel-heading">
                    List Language
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Zip Code</th>
                                <th>Code</th>
                                <th>Image</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if(count($lang)>0)
                                @foreach($lang as $key => $langs)
                                    <tr>
                                        <td>{{ $langs->name }}</td>
                                        <td>{{ $langs->zipcode }}</td>
                                        <td>{{ $langs->code }}</td>
                                        <td>@if($langs->image)<img src="{{ url('images/'.$langs->image) }}" width="20px" height="20px" alt="logo">@endif</td>
                                        <td>
                                            <a href="{{ url('lang/'.$langs->id.'/edit') }}" class="btn btn-primary"><i class="fa fa-edit "></i> Edit</a>
                                            <a href="{{ url('deleted/'.$langs->id.'/language') }}" class="btn btn-danger"><i class="fa fa-ban"></i> Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
