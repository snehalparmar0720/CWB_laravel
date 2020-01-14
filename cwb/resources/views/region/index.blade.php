@extends('layouts.app')
@section('content')
	<div class="row">
		<section class="content">
  @include('messages')
			
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">
              <div class="pull-left"><h3>Regions</h3></div>
						  <div class="pull-right">
  							<div class="btn-group">
  								<a href="{{ route('region.create') }}" class="btn btn-info" >Add New Region</a>
  							</div>
						  </div>
						<div class="table-container">
              <table id="mytable" class="table table-bordred table-striped">
                   <thead>
                       <th><input type="checkbox" id="checkall" /></th>
                      <th>Sr.No</th>
                       <th>Region Name</th>
                       <th>Region Code</th>
                       <th>View</th>
                       <th>Edit</th>
                       <th>Delete</th>
                   </thead>
                    <tbody>
                      <?php $i = ($regions->currentpage()-1)* $regions->perpage() + 1;?>
                      @if($regions->count())  
                          @foreach($regions as $reg)  
                            <tr>
                                <td><input type="checkbox" class="checkthis" /></td>
                                <td>{{$i++}}</td>
                                <td>{{$reg->region_name}}</td>
                                <td>{{$reg->region_code}}</td>
                                <td><a class="btn btn-primary btn-xs" href="{{action('RegionController@show', $reg->id)}}" ><span class="glyphicon glyphicon-eye-open"></span></a></td>
                                <td><a class="btn btn-primary btn-xs" href="{{action('RegionController@edit', $reg->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                                <td>
                                    <form action="{{action('RegionController@destroy', $reg->id)}}" method="post">
                                      {{csrf_field()}}
                                      <input name="_method" type="hidden" value="DELETE">
                                 
                                      <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                    </form>
                                </td>
                            </tr>
                           @endforeach 
                       @else
                           <tr>
                              <td colspan="7">No Records found !!</td>
                            </tr>
                        @endif
                    </tbody>
        
              </table>
              {{ $regions->links() }}

						</div>
					</div>
				</div>
			</div>
		</section>
@endsection