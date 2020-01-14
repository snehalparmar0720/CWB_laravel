@extends('layouts.app')
@section('content')
	<div class="row">
     <div class="col-sm-offset-1 col-sm-5">
              {{ link_to_route('personal.index', 'Back', null, array('class' => 'btn btn-danger cancel')) }}
              <button type="button" class="btn btn-success" value="Show Div" onclick="showDiv()">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search
              </button>
    </div>
		<section class="content">
  @include('messages')
			<div class="col-md-11 col-md-offset-1">
         <div id="searchdiv" style="display:none;" class="answer_list" >  
              @include('accounts.personal.search.addressreviewsearch')<br>
        </div>
        <div class="panel panel-default">
          <div class="panel-body">
              <div class="pull-left"><h3>Personal Account - Address Review</h3>
              </div>
            <div class="table-container">
              <table id="mytable" class="table table-bordred table-striped">
                    <tbody>
                      <?php $i = ($data->currentpage()-1)* $data->perpage() + 1;$j=0;?>
                          <?php {{ $head = "";$foot = 0;}} ?>
                      @if($data->count())  
                          @foreach($data as $d)
                          {{ Form::open(array('route' => 'addressreviewpersonal.store','class'=>'form-horizontal','role'=>"form")) }}  
                          {{ Form::hidden('review_id[]', $d->review_id, array('class' => 'form-control')) }}
                          {{ Form::hidden('account_type_id[]', $d->account_type_id, array('class' => 'form-control')) }}
                          {{ Form::hidden('cust_id[]', $d->cust_id, array('class' => 'form-control')) }}
                          {{ Form::hidden('residence_id[]', $d->residence_id, array('class' => 'form-control')) }}
                          @if ($head != $d->branch_name) 
                                @foreach($branch as $k => $br)
                                 @if($d->branch_id == $k)
                                 <?php {{$cnt = $br;}}?>
                                 @endif
                                @endforeach
                              <tr class="font_bold" style="background-color: #c6e7ee;">
                                  <td colspan="2"><label>Branch Name : </label> {{$d->branch_name}}</td>
                                  <td colspan="2"><label>Region Name : </label> {{$d->region_name}}</td>
                                  <td>{{$cnt}}</td>
                              </tr>
                          @endif
                          @if($cnt>0)
                            <tr>
                                <td rowspan="2">{{$i++}}</td>
                                <td><label>Customer Name :</label> {{$d->customer_name}}</td>
                                <td><label>CIF : </label> {{$d->cif}}</td>
                              </tr>
                              <tr>
                                <td colspan="4">
                                  <div class="col-sm-12">
                                  <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Address Review 
                                              @if($d->trk_address_review)
                                              <span class="label label-success">Completed</span>
                                              @else
                                              <span class="label label-danger">InComplete</span>
                                              @endif
                                            </h3>
                                        </div>
                                        <div class="panel-body">
                                          <div id="addressdiv">
                                            <div class="row">
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Address Line 1 :</strong>
                                                        {{ $d->line_1_address}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Address Line 2 : </strong>
                                                        {{ $d->line_2_address}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Address Line 3 : </strong>
                                                        {{ $d->line_3_address}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Customer City Name :</strong>
                                                        {{ $d->customer_city_name}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Postal Code : </strong>
                                                        {{ $d->postal_code}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Province State Code : </strong>
                                                        {{ $d->province_state_code}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Address Country Code :</strong>
                                                        {{ $d->address_country_code}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Legal Address Line 1 :</strong>
                                                        {{ $d->line_1_address_legal}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Legal Address Line 2 : </strong>
                                                        {{ $d->line_2_address_legal}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Legal Address Line 3 : </strong>
                                                        {{ $d->line_3_address_legal}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Legal Customer City Name :</strong>
                                                        {{ $d->customer_city_name_legal}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Legal Postal Code : </strong>
                                                        {{ $d->postal_code_legal}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Legal Province State Code : </strong>
                                                        {{ $d->province_state_code_legal}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Legal Address Country Code :</strong>
                                                        {{ $d->address_country_code_legal}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Canada Post Address :</strong>
                                                        {{ $d->cp_address}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Canada Post City : </strong>
                                                        {{ $d->cp_city}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Canada Post Postal Code : </strong>
                                                        {{ $d->cp_postal_code}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Canada Post Province :</strong>
                                                        {{ $d->cp_province}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Canada Post Country : </strong>
                                                        {{ $d->cp_country}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Non Resident Flag : </strong>
                                                        {{ $d->non_residential_flag}}
                                                </div>
                                            </div>
                                          </div>
                                            <hr>
                                            <div class="form-group {{ $errors->first('address_def_comm', 'has-error') }} "> 
                                                {{ Form::label('address_def_comm', 'Address Deficiency Comments',array('class'=>'col-sm-2 control-label')) }} 
                                                <div class="col-sm-4">
                                                {{ Form::textarea('address_def_comm[]', $d->address_def_comm, array('id'=>'cif','class' => 'form-control','rows'=>3)) }}
                                                {{ $errors->first('address_def_comm', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('address_review', 'has-error') }} "> 
                                                {{ Form::label('address_review', 'Address Review',array('class'=>'col-sm-2 control-label')) }} 
                                                <div class="col-sm-4">
                                                    {{ Form::select('address_review[]', array('1' => '1','2' => '2','3' => '3','No' => 'No'), $d->addressreview, array('class' => 'form-control','id'=>'reviewdp')) }}
                                                {{ $errors->first('address_review', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <input id="txtBox" type="text">
                                               <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="submit" name="action" value="{{$j}}" class="btn btn-primary">Review</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                </td>
                            </tr>
                            <?php $j++;
                                  {{
                                      $foot++;
                                      $head = $d->branch_name;
                                      $cnt--;
                                  }}
                                  ?>
                                @endif
                           @endforeach 
                       @else
                           <tr>
                              <td colspan="7">No Records found !!</td>
                            </tr>
                        @endif
                    {{ Form::close() }}
                    </tbody>
        
              </table>
              {{ $data->links() }}
            </div>
          </div>
			</div>
<script>
  function showDiv() {
    var x = document.getElementById("searchdiv");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }
  $('#reviewdp').change(function(){
    /*$.get('getEmpInfo.php',{empId:$(this).val()},function(data){
    $('#emp_id').val(data);*/
    var selectedValue = $(this).val();
    elem=document.getElementById("addressdiv")
    console.log(selectedValue);
    if(selectedValue=="1")
      elem.style.backgroundColor = 'blue';
 });
</script>
		</section>
@endsection