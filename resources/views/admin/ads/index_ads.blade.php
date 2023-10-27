@extends('admin.layout.master')
@section('content')
	<div class="row">
        <div class="col-md-12">

			<h2><strong>Adverting</strong></h2>   
		       @include('errors.message_error')
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
        <a href="{{url('create_ads')}}" class="btn btn-primary" style="margin-bottom: 15px;margin-left: 85%">
                Create Adverting</a>
            <div class="panel panel-default">
                <div class="panel-heading">
                     List Adverting
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Layout</th>
                                    <th>Facebook Page</th>
                                    <th>Link Youtube</th>
                                    <th>Status</th>
                                    <th style="width:170px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $d)
                                <tr>
                                    <td>
                                        @if($d->layout == 1)
                                            Layout 1(Left)
                                        @elseif($d->layout == 2)
                                            Layout 2(Right)
                                        @else
                                            Not Layout
                                        @endif
                                    </td>
                                    <td>{{ $d->link_fb }}</td>
                                    <td>
                                    
                                        <?php echo $d->link_yt; ?>
                                    <td>
                                        @if($d->status == 1)
                                            <span>Active</span>
                                        @else
                                            Not Active
                                        @endif
                                        
                                    </td>
                                
                                    <td style="width: 170px;">
                                        <a href="{{ url('ads_edit/'.$d->id.'/edit') }}" class="btn btn-primary"><i class="fa fa-edit "></i> Edit</a>
                                        <a href="{{ url('delete/'.$d->id.'/ads') }}" class="btn btn-danger"><i class="fa fa-ban"></i> Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> 
			
		</div>
	</div>
	
@endsection