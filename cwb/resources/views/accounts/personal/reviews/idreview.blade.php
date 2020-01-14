@extends('layouts.app')
@section('content')
	<div class="row">
     <div class="col-sm-offset-1 col-sm-5">
              {{ link_to_route('personal.index', 'Back', null, array('class' => 'btn btn-danger')) }}
              <button type="button" class="btn btn-success" value="Show Div" onclick="showDiv()">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search
              </button>
    </div>
		<section class="content">
  @include('messages')
			<div class="col-md-11 col-md-offset-1">
        <div id="searchdiv" style="display:none;" class="answer_list" >  
              @include('accounts.personal.search.idreviewsearch')<br>
        </div>
        <div class="panel panel-default">
          <div class="panel-body">
              <div class="pull-left"><h3>Personal Account - ID Review</h3>
              </div>
            <div class="table-container">
              <table id="mytable" class="table table-bordred table-striped">
                    <tbody>
                      <?php $i = ($data->currentpage()-1)* $data->perpage() + 1;$j=0;?>
                          <?php {{ $head="";$foot = 0;}} ?>
                      @if($data->count())  
                          @foreach($data as $d)
                          {{ Form::open(array('route' => 'idreviewpersonal.store','class'=>'form-horizontal','role'=>"form")) }}  
                          {{ Form::hidden('account_type_id[]', $d->account_type_id, array('class' => 'form-control')) }}
                          {{ Form::hidden('cust_id[]', $d->cust_id, array('class' => 'form-control')) }}
                          {{ Form::hidden('personal_review_id[]', $d->personal_review_id, array('class' => 'form-control')) }}
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
                                            <h3 class="panel-title">ID Review 
                                              @if($d->trk_id_review)
                                              <span class="label label-success">Completed</span>
                                              @else
                                              <span class="label label-danger">InComplete</span>
                                              @endif
                                            </h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Agent/Affiliate Entity1 :</strong>
                                                        {{ $d->agent_affiliate_entity}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Agent/Affiliate Entity2 : </strong>
                                                        {{ $d->agent_affiliate_entity2}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Agent/Affiliate Name1 : </strong>
                                                        {{ $d->agent_affiliate_name}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Agent/Affiliate Name2 : </strong>
                                                        {{ $d->agent_affiliate_name2}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Agent/Affiliate Validation1 :</strong>
                                                        {{ $d->agent_affiliate_validation}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Agent/Affiliate Validation2 : </strong>
                                                        {{ $d->agent_affiliate_validation2}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Agent/Affiliate Verification Date1 : </strong>
                                                        {{ $d->agent_affiliate_verification_date}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Agent/Affiliate Verification Date2 : </strong>
                                                        {{ $d->agent_affiliate_verification_date2}}
                                                </div>
                                            </div>
                                             <div class="row">
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>CountID1 Digits :</strong>
                                                        {{ $d->count_id_digit}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>CountID2 Digits : </strong>
                                                        {{ $d->count_id_digit2}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Customer Identification Number1 : </strong>
                                                        {{ $d->customer_id_number}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Customer Identification Number2 : </strong>
                                                        {{ $d->customer_id_number2}}
                                                </div>
                                            </div>
                                             <div class="row">
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Customer Identification Type Desc1 :</strong>
                                                        {{ $d->customer_id_number_type_desc}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Customer Identification Type Desc2 : </strong>
                                                        {{ $d->customer_id_number_type_desc2}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Customer Identification Country Of Issue Desc1 : </strong>
                                                        {{ $d->customer_identification_country_of_issue_desc}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Customer Identification Country Of Issue Desc2 : </strong>
                                                        {{ $d->customer_identification_country_of_issue_desc2}}
                                                </div>
                                            </div>
                                             <div class="row">
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Customer Identification Place Of Issue Desc1 :</strong>
                                                        {{ $d->customer_identification_place_of_issue_desc}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Customer Identification Place Of Issue Desc2 : </strong>
                                                        {{ $d->customer_identification_place_of_issue_desc2}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>CWBIdentify1 : </strong>
                                                        {{ $d->cwb_identify}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>CWB Identify2 : </strong>
                                                        {{ $d->cwb_identify2}}
                                                </div>
                                            </div>
                                             <div class="row">
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Employee Verification Date1 :</strong>
                                                        {{ $d->employee_verification_date}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Employee Verification Date2 : </strong>
                                                        {{ $d->employee_verification_date2}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Expiry Date1 : </strong>
                                                        {{ $d->expiry_date}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Expiry Date2 : </strong>
                                                        {{ $d->expiry_date2}}
                                                </div>
                                            </div>
                                             <div class="row">
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>FACE TO FACE1 :</strong>
                                                        {{ $d->face_2_face}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>FACE TO FACE2 : </strong>
                                                        {{ $d->face_2_face2}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Matching Criteria 1 : </strong>
                                                        {{ $d->matching_criteria}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Matching Criteria 2 : </strong>
                                                        {{ $d->matching_criteria2}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Source Of Information 1 :</strong>
                                                        {{ $d->source_of_information}}
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Source Of Information 2 :</strong>
                                                        {{ $d->source_of_information2}}
                                                </div>
                                            </div> 
                                            <hr>     
                                            <div class="form-group {{ $errors->first('id_review', 'has-error') }} "> 
                                                {{ Form::label('id_review', 'ID Review',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::select('id_review[]', array('1' => '1','2' => '2','3' => '3','No' => 'No'),  $d->id_review, array('class' => 'form-control')) }}
                                                {{ $errors->first('id_review', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="submit" name="action" value="{{$j}}" class="btn btn-primary">Review</button>
                                                    </div>
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
</script>
		</section>
@endsection