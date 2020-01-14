@extends('layouts.app')
@section('content')
	<div class="row">
		<section class="content">
  @include('messages')
			<div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-body">
              <div class="pull-left"><h3>Region and Branch</h3></div>
              <form method="post" enctype="multipart/form-data" action="{{ url('postimportcsv') }}">
                  {{ csrf_field() }}
                  <div class="form-group">
                   <table class="table">
                    <tr>
                     <td width="30%" align="left">
                      <input type="submit" name="upload" class="btn btn-primary" value="Load the Data">
                     </td>
                    </tr>
                   </table>
                  </div>
              </form>
          </div>
        </div>
				<div class="panel panel-default">
					<div class="panel-body">
              <div class="pull-left"><h3>Load Customers information</h3></div>
						  <form method="post" enctype="multipart/form-data" action="{{ url('importExcel') }}" id="form_id">
                  {{ csrf_field() }}
                  <div class="form-group">
                   <table class="table">
                    <tr>
                     <td width="40%" align="right"><label>Select File for Upload</label></td>
                     <td width="30">
                      <input type="file" name="select_file" />
                     </td>
                     <td width="30%" align="left">
                      <input type="submit" name="upload" class="btn btn-primary" value="Upload">
                     </td>
                    </tr>
                    <tr>
                     <td width="40%" align="right"></td>
                     <td width="30"><span class="text-muted">.xls, .xslx</span></td>
                     <td width="30%" align="left"></td>
                    </tr>
                   </table>
                  </div>
              </form>
					</div>
				</div>
        <?php $i = ($data->currentpage()-1)* $data->perpage() + 1;?>

        <div class="panel panel-default">
          <div class="panel-body">
              <div class="pull-left"><h3>Customers</h3></div>
            <div class="table-container">
              <table id="mytable" class="table table-bordred table-striped">
                   <thead>
                       <th><input type="checkbox" id="checkall" /></th>
                       <th>Sr.no</th>
                       <th>Customer Name</th>
                       <th>Account Type</th>
                   </thead>
                    <tbody>
                      @if($data->count())  
                          @foreach($data as $d)  
                            <tr>
                                <td><input type="checkbox" class="checkthis" /></td>
                                 <td>{{$i++}}</td>
                                <td>{{$d->customer_name}}</td>
                                <td>{{$d->account_type}}</td>
                            </tr>
                           @endforeach 
                       @else
                           <tr>
                              <td colspan="7">No Records found !!</td>
                            </tr>
                        @endif
                    </tbody>
        
              </table>
              {{ $data->links() }}
            </div>
          </div>
			</div>
		</section>
@endsection