@extends('layouts.app')
@section('content')
	<div class="row">
		<section class="content">
  @include('messages')
			
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">
              <div class="pull-left"><h3>Branches</h3></div>
						  <div class="pull-right">
  							<div class="btn-group">
  								<a href="{{ route('branch.create') }}" class="btn btn-info" >Add New Branch</a>
  							</div>
						  </div>
						<div class="table-container">
              <table id="mytable" class="table table-bordred table-striped">
                   <thead>
                       <th><input type="checkbox" id="checkall" /></th>
                      <th>Sr.No</th>
                       <th>Region Name</th>
                       <th>Branch Name</th>
                       <!-- <th>Branch Code</th> -->
                       <th>View</th>
                       <th>Edit</th>
                       <th>Delete</th>
                   </thead>
                    <tbody>
                      <?php $i = ($branches->currentpage()-1)* $branches->perpage() + 1;?>
                      @if($branches->count())  
                          @foreach($branches as $br)  
                            <tr>
                                <td><input type="checkbox" class="checkthis" /></td>
                                <td>{{$i++}}</td>
                                <td>{{$br->region->region_name}}</td>
                                <td>{{$br->branch_name}}</td>
                                <!-- <td>{{$br->branch_code}}</td> -->
                                <td><a class="btn btn-primary btn-xs" href="{{action('BranchController@show', $br->id)}}" ><span class="glyphicon glyphicon-eye-open"></span></a></td>
                                <td><a class="btn btn-primary btn-xs" href="{{action('BranchController@edit', $br->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                                <td>
                                    <form action="{{action('BranchController@destroy', $br->id)}}" method="post">
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
              {{ $branches->links() }}
						</div>
					</div>
				</div>
			</div>
		</section>
@endsection