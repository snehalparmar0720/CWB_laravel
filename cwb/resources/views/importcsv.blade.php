@extends('layouts.app')
@section('content')
	<div class="row">
		<section class="content">
			
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-body">
              <div class="pull-left"><h3>Excel</h3></div>
						  <form method="post" enctype="multipart/form-data" action="{{ url('postcust') }}">
                  {{ csrf_field() }}
                  <div class="form-group">
                   <table class="table">
                    <tr>
                      <td> <input type="file" name="csv_import" /></td>
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
			</div>
		</section>
@endsection