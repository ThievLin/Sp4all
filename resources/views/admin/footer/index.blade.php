@extends('admin.layout.master')
@section('content')
  <div class="row">
        <div class="col-md-12">

      <h2><strong>Footer</strong></h2>   
         @include('errors.message_error')  
    </div>
  </div>
  <hr/>
  <div class="row">
    <div class="col-md-12">
    <a href="{{url('create_footer')}}" class="btn btn-primary" style="margin-bottom: 15px;margin-left: 89%">
                Create Footer</a>
      <div class="panel panel-default">
        <div class="panel-heading">
          List Footer
        </div>
        <div class="panel-body">
                <div class="table-responsive">
                   <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                          <thead>
                              <tr>
                                <th>Title</th>
                              
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                          @if(count($foo)> 0 )
                            @foreach($foo as $f)
                              <tr>
                                  <td>{{ $f->title }}</td>
                                 
                                  <td>
                                  @if($f->status == 0)
                                    Not Active
                                  @else
                                    Active
                                  @endif
                                  </td>
                                  <td>
                                    <a href="{{ url('edit/'.$f->id.'/footer')}}" class="btn btn-primary"><i class="fa fa-edit "></i> Edit</a>
                    <a href="{{ url('deleted/'.$f->id.'/footer') }}" class="btn btn-danger"><i class="fa fa-ban"></i> Delete</a>
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