@extends('layouts.app')
@section('content')
	<div class="row">
		<section class="content">
  @include('messages')
			
			<div class="col-md-11 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-body">
              <div class="pull-left"><h3>Joint Account - Customers</h3></div>
            <div class="table-container">
              <div class="col-md-12 col-md-offset-0">
              <div class="panel panel-primary">
                    <div class="panel-heading" style="background-color: lightslategray">
                        <h3 class="panel-title">
                        <span class="glyphicon glyphicon-king"></span>  Joint Account Review</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-3 col-md-3">
                                <a href="{{ URL::to('third_party_review_personal') }}" class="btn btn-danger btn-lg btn-block" role="button"><span class="glyphicon glyphicon-list-alt"></span> <br/>Address Review</a>
                                <a href="{{URL::to('occupation_review_personal')}}" class="btn btn-primary btn-lg btn-block" role="button" style="margin-top:20px;"><span class="glyphicon glyphicon-list-alt"></span> <br/>Occupation Review</a>
                                <a href="{{URL::to('third_party_review_personal')}}" class="btn btn-warning btn-lg btn-block" role="button"  style="margin-top:20px;"><span class="glyphicon glyphicon-list-alt"></span> <br/>DOB Review</a>
                            </div>                                                                                
                            <div class="col-xs-3 col-md-3">
                                <a href="{{URL::to('third_party_review_personal')}}" class="btn btn-info btn-lg btn-block" role="button"><span class="glyphicon glyphicon-list-alt"></span> <br/>Identification Review</a>
                                <a href="{{URL::to('employer_review_personal')}}" class="btn btn-success btn-lg btn-block" role="button" style="margin-top:20px;"><span class="glyphicon glyphicon-list-alt"></span> <br/>Employer Review</a>
                            </div>
                            <div class="col-xs-3 col-md-3">
                               <a href="{{URL::to('third_party_review_personal')}}" class="btn btn-success btn-lg btn-block" role="button" style= "background-color: navy;"><span class="glyphicon glyphicon-list-alt"></span> <br/>NOC Review</a>
                                <a href="{{URL::to('pefp_pep_review_personal')}}" class="btn btn-warning btn-lg btn-block" role="button" style="margin-top:20px;background-color: plum;"><span class="glyphicon glyphicon-list-alt"></span> <br/>PEFP/PEP Review</a>
                            </div>
                            <div class="col-xs-3 col-md-3">
                                <a href="{{URL::to('average_money_review_personal')}}" class="btn btn-info btn-lg btn-block" role="button" style="background-color: chocolate ;"><span class="glyphicon glyphicon-list-alt"></span> <br/>Role Review</a>
                                <a href="{{URL::to('cwb_review_personal')}}" class="btn btn-success btn-lg btn-block" role="button" style="margin-top:20px;background-color: cadetblue;"><span class="glyphicon glyphicon-list-alt"></span> <br/>CWB Review</a>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <table id="mytable" class="table table-bordred table-striped">
                   <thead>
                       <th><input type="checkbox" id="checkall" /></th>
                        <th>Sr.No</th>
                       <th>Customer Name</th>
                       <th>CIF</th>
                       <th>Account</th>
                       <th class="text-center">Review Status</th>
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
                                <td> {!! Html::decode(link_to_route('joint.edit', 'Review', array($d->cid), array('class' => 'btn btn-info'))) !!}</td>
                                  <td>
                                    <table class="table">
                                      <tr>
                                        <td>Address Review</td>
                                        <td>Identification Review</td>
                                        <td>NOC Review</td>
                                        <td>Occupation Review</td>
                                        <td>Employer Review</td>
                                        <td>PEFP/PEP Review</td>
                                        <td>DOB Review</td>
                                        <td>Role Review</td>
                                        <td>CWB Review</td>
                                      </tr>
                                      <tr>
                                        <td>
                                          @if($d->address_review_track)
                                            <button type="button" class="btn btn-sm btn-success" aria-label="Left Align">
                                               <span class="glyphicon glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>
                                          @else
                                            <button type="button" class="btn btn-sm btn-danger" aria-label="Left Align">
                                               <span class="glyphicon glyphicon glyphicon-eye-close" aria-hidden="true"></span></button>
                                          @endif
                                        </td>
                                        <td>
                                          @if($d->id_review_track)
                                            <button type="button" class="btn btn-sm btn-success" aria-label="Left Align">
                                               <span class="glyphicon glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>
                                          @else
                                            <button type="button" class="btn btn-sm btn-danger" aria-label="Left Align">
                                               <span class="glyphicon glyphicon glyphicon-eye-close" aria-hidden="true"></span></button>
                                          @endif
                                        </td>
                                        <td>
                                          @if($d->noc_review_track)
                                            <button type="button" class="btn btn-sm btn-success" aria-label="Left Align">
                                               <span class="glyphicon glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>
                                          @else
                                            <button type="button" class="btn btn-sm btn-danger" aria-label="Left Align">
                                               <span class="glyphicon glyphicon glyphicon-eye-close" aria-hidden="true"></span></button>
                                          @endif
                                        </td>
                                        <td>
                                          @if($d->occupation_review_track)
                                            <button type="button" class="btn btn-sm btn-success" aria-label="Left Align">
                                               <span class="glyphicon glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>
                                          @else
                                            <button type="button" class="btn btn-sm btn-danger" aria-label="Left Align">
                                               <span class="glyphicon glyphicon glyphicon-eye-close" aria-hidden="true"></span></button>
                                          @endif
                                        </td>
                                        <td>
                                          @if($d->employer_review_track)
                                            <button type="button" class="btn btn-sm btn-success" aria-label="Left Align">
                                               <span class="glyphicon glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>
                                          @else
                                            <button type="button" class="btn btn-sm btn-danger" aria-label="Left Align">
                                               <span class="glyphicon glyphicon glyphicon-eye-close" aria-hidden="true"></span></button>
                                          @endif
                                        </td>
                                        <td>
                                          @if($d->pefp_pep_review_track)
                                            <button type="button" class="btn btn-sm btn-success" aria-label="Left Align">
                                               <span class="glyphicon glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>
                                          @else
                                            <button type="button" class="btn btn-sm btn-danger" aria-label="Left Align">
                                               <span class="glyphicon glyphicon glyphicon-eye-close" aria-hidden="true"></span></button>
                                          @endif
                                        </td>
                                        <td>
                                          @if($d->dob_review_track)
                                            <button type="button" class="btn btn-sm btn-success" aria-label="Left Align">
                                               <span class="glyphicon glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>
                                          @else
                                            <button type="button" class="btn btn-sm btn-danger" aria-label="Left Align">
                                               <span class="glyphicon glyphicon glyphicon-eye-close" aria-hidden="true"></span></button>
                                          @endif
                                        </td>
                                        <td>
                                          @if($d->role_review_track)
                                            <button type="button" class="btn btn-sm btn-success" aria-label="Left Align">
                                               <span class="glyphicon glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>
                                          @else
                                            <button type="button" class="btn btn-sm btn-danger" aria-label="Left Align">
                                               <span class="glyphicon glyphicon glyphicon-eye-close" aria-hidden="true"></span></button>
                                          @endif
                                        </td>
                                        <td>
                                          @if($d->cwb_review_track)
                                            <button type="button" class="btn btn-sm btn-success" aria-label="Left Align">
                                               <span class="glyphicon glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>
                                          @else
                                            <button type="button" class="btn btn-sm btn-danger" aria-label="Left Align">
                                               <span class="glyphicon glyphicon glyphicon-eye-close" aria-hidden="true"></span></button>
                                          @endif
                                        </td>
                                      </tr>
                                    </table>
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
              {{ $data->links() }}
            </div>
          </div>
			</div>
		</section>
@endsection