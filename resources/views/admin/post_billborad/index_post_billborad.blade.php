@extends('admin.layout.master')
@section('content')
  <div class="row">
        <div class="col-md-12">

      <h2><strong>Post Billborad</strong></h2>   
         @include('errors.message_error')  
    </div>
  </div>
  <hr/>
  <div class="row">
    <div class="col-md-12">
    <a href="{{url('create_post_billborad')}}" class="btn btn-primary" style="margin-bottom: 15px;">
                Create Post Billborad</a>
      <div class="panel panel-default">
        <div class="panel-heading">
                     List Post Billborad
                </div>
        <div class="panel-body">
                  <div class="table-responsive">
                   <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                          <thead>
                              <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                            @if(count($category) > 0 )
                              @foreach($category as $c)
                                @if(count($c->post)>0)
                                  @foreach($c->post as $p)
                                    <tr>
                                      <td>{{ $p->title }}</td>
                                      <td>
                                        <a href="{{ url('edit/'.$p->id.'/post') }}" class="btn btn-primary"><i class="fa fa-edit "></i></a>
                                        <a href="{{ url('delete/'.$p->id.'/post') }}" class="btn btn-danger"><i class="fa fa-ban"></i></a>
                                
                                      </td>
                                    </tr>
                                  @endforeach
                                @endif
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