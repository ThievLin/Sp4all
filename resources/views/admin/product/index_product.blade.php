@extends('admin.layout.master')
@section('content')
  <div class="row">
        <div class="col-md-12">

      <h2><strong>Products </strong></h2>
         @include('errors.message_error')
    </div>
  </div>
  <hr/>
  <div class="row">
    <div class="col-md-12">
    <a href="{{url('products-product/create')}}" class="btn btn-primary create" >
                Create Products</a>
      <div class="panel panel-default">
        <div class="panel-heading">
                     List Products
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
                            @if(count($post) > 0 )
                              @foreach($post as $p)
                              <tr>
                                  <td>{{ $p->title }}</td>
                                  <td>@if(count($p->cate)>0)
                                        {{ $p->cate->first()->name }}
                                    @else
                                        NULL
                                    @endif

                                  </td>
                                  <td>
                                    @if($p->status == 0)
                                      Not Active
                                    @else
                                      <span>Active</span>
                                    @endif
                                  </td>
                                  <td>
                                    <a href="{{ url('products-product/'.$p->id.'/edit') }}" class="btn btn-primary"><i class="fa fa-edit "></i></a>
                                    <a href="{{ url('products-product/'.$p->id.'/deleted') }}" class="btn btn-danger"><i class="fa fa-ban"></i></a>
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
