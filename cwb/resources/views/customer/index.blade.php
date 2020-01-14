@extends('layouts.app')
@section('content')
	<div class="row">
		<section class="content">
  @include('messages')

			<div class="col-md-10 col-md-offset-1">
  @include('customer.search')<br>
        <div class="panel panel-default">
          <div class="panel-body">
              <div class="pull-left"><h3>Customers</h3></div>
            <div class="table-container">
              <table id="mytable" class="table table-bordred table-striped">
                   <thead>
                       <th><input type="checkbox" id="checkall" /></th>
                       <th>Sr.No</th>
                       <th>Customer Name</th>
                       <th>CIF</th>
                       <th>Branch Name</th>
                       <th>Region Name</th>
                       <th>Calender Date</th>
                       <th>Account Type</th>
                       <th>Account</th>
                   </thead>
                    <tbody>
                     <?php $i = ($data->currentpage()-1)* $data->perpage() + 1;?>
                      @if($data->count())  
                          @foreach($data as $d)  
                            <tr>
                                <td><input type="checkbox" class="checkthis" /></td>
                                <td>{{$i++}}</td>
                                <td>{{$d->customer_name}}</td>
                                <td>{{$d->cif}}</td>
                                <td>{{$d->branch_name}}</td>
                                <td>{{$d->region_name}}</td>
                                <td>{{$d->calendar_date}}</td>
                                <td>{{$d->account_type}}</td>
                                <td> {!! Html::decode(link_to_route('customer.edit', 'Details', array($d->id), array('class' => 'btn btn-info'))) !!}</td>
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
   <script>
$(document).ready(function()
    {
        $('#from_date').Zebra_DatePicker({
        format: 'Y-m-d'
        });
        $('#to_date').Zebra_DatePicker({
        format: 'Y-m-d'
        });
    });

 </script>
@endsection