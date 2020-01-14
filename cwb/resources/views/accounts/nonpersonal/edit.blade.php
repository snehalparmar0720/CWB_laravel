@extends('layouts.app')
@section('content')
    <div class="row">
        <section class="content">
            
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Customer Non-Personal Accounts Details</h3>
                    </div>
                	<div class="panel-body">
                	{!! Form::model($datas, array('method' => 'PATCH', 'route' => array('nonpersonal.update', $datas->cust_id),'class'=>'form-horizontal','role'=>"form")) !!}
                    {{ Form::hidden('address_id', null, array('id'=>'cif','class' => 'form-control')) }}
                    {{ Form::hidden('residence_id', null, array('id'=>'cif','class' => 'form-control')) }}
                    {{ Form::hidden('review_id', null, array('id'=>'cif','class' => 'form-control')) }}
                    {{ Form::hidden('account_type_id', null, array('class' => 'form-control')) }}
                    {{ Form::hidden('non_personal_review_id', null, array('class' => 'form-control')) }}
                    {{ Form::hidden('third_party_id', null, array('class' => 'form-control')) }}
                    {{ Form::hidden('intended_use_id', null, array('class' => 'form-control')) }}
                    {{ Form::hidden('review_id', null, array('class' => 'form-control')) }}
                    {{ Form::hidden('metrics_id', null, array('class' => 'form-control')) }}
                    {{ Form::hidden('average_money_id', null, array('class' => 'form-control')) }}
                                                
                        <div class="form-group {{ $errors->first('customer_name', 'has-error') }} "> 
                            {{ Form::label('customer_name', 'Customer Name',array('class'=>'col-sm-4 control-label')) }} 
                            <div class="col-sm-3">
                            {{ Form::text('customer_name',null, array('class' => 'form-control','readonly')) }}
                            {{ $errors->first('customer_name', '<span class="error">:message</span>') }} 
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('c_cif', 'has-error') }} "> 
                            {{ Form::label('c_cif', 'CIF',array('class'=>'col-sm-4 control-label')) }} 
                            <div class="col-sm-3">
                            {{ Form::text('c_cif', null, array('id'=>'cif','class' => 'form-control','readonly')) }}
                            {{ $errors->first('c_cif', '<span class="error">:message</span>') }} 
                            </div>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="nav-item active">
                                <a href="#address" class="nav-link" data-toggle="tab">Address Review</a>
                            </li>
                            <li class="nav-item">
                                <a href="#naics" class="nav-link" data-toggle="tab">NAICS Review</a>
                            </li>
                            <li class="nav-item">
                                <a href="#charity" class="nav-link" data-toggle="tab">Charity Review</a>
                            </li>
                            <li class="nav-item">
                                <a href="#thirdparty" class="nav-link" data-toggle="tab">Third Party Review</a>
                            </li>
                            <li class="nav-item">
                                <a href="#intendeduse" class="nav-link" data-toggle="tab">Intended Use Review</a>
                            </li>
                            <li class="nav-item">
                                <a href="#averagemoney" class="nav-link" data-toggle="tab">Average Money Review</a>
                            </li>
                            <li class="nav-item">
                                <a href="#nonpersonal" class="nav-link" data-toggle="tab">Non Personal Review</a>
                            </li>
                            <li class="nav-item">
                                <a href="#metrics" class="nav-link" data-toggle="tab">Metrics Review</a>
                            </li>
                            <li class="nav-item">
                                <a href="#cwb" class="nav-link" data-toggle="tab">CWB Review</a>
                            </li>
                        </ul>
                       <br>
                        <div class="tab-content">
                            <div class="tab-pane active" id="address">
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Address Review</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                         {{ Form::label('addressline1check', 'AddressLine1Check',array('class'=>'col-sm-6 control-label')) }}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        {{ Form::text('addressline1check', $addressline1check, array('id'=>'cif','class' => 'form-control success','readonly')) }}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                         {{ Form::label('customercitynamelegal', 'City Check',array('class'=>'col-sm-6 control-label')) }}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        {{ Form::text('customercitynamelegal', $customercitynamelegal, array('id'=>'cif','class' => 'form-control success','readonly')) }}
                                                </div>
                                            </div>
                                            <br>
                                           
                                            <div class="row">
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                         {{ Form::label('postalcodelegal', 'PostalCodeCheck',array('class'=>'col-sm-3 control-label')) }}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        {{ Form::text('postalcodelegal', $postalcodelegal, array('id'=>'cif','class' => 'form-control success','readonly')) }}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                         {{ Form::label('provincestatecodelegal', 'ProvinceCodeCheck',array('class'=>'col-sm-3 control-label')) }}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        {{ Form::text('provincestatecodelegal', $provincestatecodelegal, array('id'=>'cif','class' => 'form-control success','readonly')) }}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Address Line 1 :</strong>
                                                        {{ $datas->line_1_address}}
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Address Line 2 : </strong>
                                                        {{ $datas->line_2_address}}
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Address Line 3 : </strong>
                                                        {{ $datas->line_3_address}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Customer City Name :</strong>
                                                        {{ $datas->customer_city_name}}
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Postal Code : </strong>
                                                        {{ $datas->postal_code}}
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Province State Code : </strong>
                                                        {{ $datas->province_state_code}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Address Country Code :</strong>
                                                        {{ $datas->address_country_code}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Legal Address Line 1 :</strong>
                                                        {{ $datas->line_1_address_legal}}
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Legal Address Line 2 : </strong>
                                                        {{ $datas->line_2_address_legal}}
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Legal Address Line 3 : </strong>
                                                        {{ $datas->line_3_address_legal}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Legal Customer City Name :</strong>
                                                        {{ $datas->customer_city_name_legal}}
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Legal Postal Code : </strong>
                                                        {{ $datas->postal_code_legal}}
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Legal Province State Code : </strong>
                                                        {{ $datas->province_state_code_legal}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Legal Address Country Code :</strong>
                                                        {{ $datas->address_country_code_legal}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Canada Post Address :</strong>
                                                        {{ $datas->cp_address}}
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Canada Post City : </strong>
                                                        {{ $datas->cp_city}}
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Canada Post Postal Code : </strong>
                                                        {{ $datas->cp_postal_code}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Canada Post Province :</strong>
                                                        {{ $datas->cp_province}}
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Canada Post Country : </strong>
                                                        {{ $datas->cp_country}}
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Non Resident Flag : </strong>
                                                        {{ $datas->non_residential_flag}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group {{ $errors->first('address_def_comm', 'has-error') }} "> 
                                                {{ Form::label('address_def_comm', 'Address Deficiency Comments',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::textarea('address_def_comm', null, array('id'=>'cif','class' => 'form-control','rows'=>3)) }}
                                                {{ $errors->first('address_def_comm', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('address_review', 'has-error') }} "> 
                                                {{ Form::label('address_review', 'Address Review',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                    {{ Form::select('address_review', array('1' => '1','2' => '2','3' => '3','No' => 'No'), Input::old('address_review'), array('class' => 'form-control')) }}
                                                {{ $errors->first('address_review', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                               <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="submit" name="action" value="address" class="btn btn-success">Review</button>
                                                    <div class='pull-right'>
                                                        <a class="btn btn-primary btnNext" >Next</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="naics">
                               <!-- naics -->
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">NAICS Details</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>NAICS Code :</strong>
                                                        {{ $datas->naics_code}}
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>NAICS Name : </strong>
                                                        {{ $datas->naics_name}}
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>NAICS Sector Name : </strong>
                                                        {{ $datas->naics_sector_name}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>NAICS Internal Sector Name :</strong>
                                                        {{ $datas->naics_internal_sector_name}}
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>NAICS Lookup : </strong>
                                                        {{ $datas->naics_lookup}}
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>NAICS Prohibited : </strong>
                                                        {{ $datas->naics_prohibited}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Name Holding but not Holding Company :</strong>
                                                        {{ $datas->name_holding_but_not_holding_company}}
                                                </div>
                                            </div> 
                                            <hr>     
                                            <div class="form-group {{ $errors->first('naics_r', 'has-error') }} "> 
                                                {{ Form::label('naics_r', 'NAICS Review',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::select('naics_r', array('1' => '1','2' => '2','3' => '3','No' => 'No'), Input::old('naics_r'), array('class' => 'form-control')) }}
                                                {{ $errors->first('naics_r', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('naics_def_comm', 'has-error') }} "> 
                                                {{ Form::label('naics_def_comm', 'NAICS Deficiency Comments',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::textarea('naics_def_comm', null, array('id'=>'cif','class' => 'form-control','rows'=>'3')) }}
                                                {{ $errors->first('naics_def_comm', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="submit" name="action" value="naics" class="btn btn-success">Review</button>
                                                    <div class='pull-right'>
                                                        <a class="btn btn-primary btnPrevious" >Previous</a>
                                                        <a class="btn btn-primary btnNext" >Next</a>
                                                    </div>
                                                </div>
                                            </div>
                                         </div>
                                    </div>
                                </div>
                       
                            </div>
                            <div class="tab-pane fade" id="charity">
                                <!-- charity -->
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Charity Details</h3>
                                        </div>
                                        <div class="panel-body">
                                             <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Registered Charity Flag :</strong>
                                                        {{ $datas->registered_charity_flag}}
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Accepted Donation Flag : </strong>
                                                        {{ $datas->accepts_donations_flag}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group {{ $errors->first('charity_r', 'has-error') }} "> 
                                                {{ Form::label('charity_r', 'Charity Review',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                               {{ Form::select('charity_r', array('1' => '1','2' => '2','3' => '3','No' => 'No'), Input::old('charity_r'), array('class' => 'form-control')) }}
                                                {{ $errors->first('charity_r', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('charity_def_comm', 'has-error') }} "> 
                                                {{ Form::label('charity_def_comm', 'Charity Deficiency Comments',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::textarea('charity_def_comm', null, array('id'=>'cif','class' => 'form-control','rows'=>'3')) }}
                                                {{ $errors->first('charity_def_comm', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                            
                                         <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="submit" name="action" value="charity" class="btn btn-success">Review</button>
                                                    <div class='pull-right'>
                                                        <a class="btn btn-primary btnPrevious" >Previous</a>
                                                        <a class="btn btn-primary btnNext" >Next</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="thirdparty">
                               <!-- third party -->
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Third Party Details</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Third Party Flag :</strong>
                                                        {{ $datas->third_party_flag}}
                                                </div>
                                            </div> 
                                            <hr>
                                            <div class="form-group {{ $errors->first('third_party', 'has-error') }} "> 
                                                {{ Form::label('third_party', 'Third Party Review',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::select('third_party', array('1' => '1','2' => '2','3' => '3','No' => 'No'), Input::old('third_party'), array('class' => 'form-control')) }}
                                                {{ $errors->first('third_party', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('third_party_def_comm', 'has-error') }} "> 
                                                {{ Form::label('third_party_def_comm', 'Third Party Deficiency Comments',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::textarea('third_party_def_comm', null, array('id'=>'cif','class' => 'form-control','rows'=>'3')) }}
                                                {{ $errors->first('third_party_def_comm', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                           
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="submit" name="action" value="thirdparty" class="btn btn-success">Review</button>
                                                    <div class='pull-right'>
                                                        <a class="btn btn-primary btnPrevious" >Previous</a>
                                                        <a class="btn btn-primary btnNext" >Next</a>
                                                    </div>
                                                </div>
                                            </div>
                                         </div>
                                    </div>
                                </div>
                       
                            </div>
                            <div class="tab-pane fade" id="intendeduse">
                               <!-- Intended Use -->
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Intended Use Details</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Intended Use Code :</strong>
                                                        {{ $datas->intended_use_code}}
                                                </div>
                                                 <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Intended Use Description :</strong>
                                                        {{ $datas->intended_use_desc}}
                                                </div>
                                                 <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Intended Use Other Description :</strong>
                                                        {{ $datas->intended_use_other_desc}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group {{ $errors->first('intended_use', 'has-error') }} "> 
                                                {{ Form::label('intended_use', 'Intended Use Review',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::select('intended_use', array('1' => '1','2' => '2','3' => '3','No' => 'No'), Input::old('intended_use'), array('class' => 'form-control')) }}
                                                {{ $errors->first('intended_use', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('intended_use_def_comm', 'has-error') }} "> 
                                                {{ Form::label('intended_use_def_comm', 'Intended Use Deficiency Comments',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::textarea('intended_use_def_comm', null, array('id'=>'cif','class' => 'form-control','rows'=>'3')) }}
                                                {{ $errors->first('intended_use_def_comm', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="submit" name="action" value="intendeduse" class="btn btn-success">Review</button>
                                                    <div class='pull-right'>
                                                        <a class="btn btn-primary btnPrevious" >Previous</a>
                                                        <a class="btn btn-primary btnNext" >Next</a>
                                                    </div>
                                                </div>
                                            </div>
                                         </div>
                                    </div>
                                </div>
                       
                            </div>
                            <div class="tab-pane fade" id="averagemoney">
                               <!-- Average Money-->
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Average Money Details</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Average Money Cash Description :</strong>
                                                        {{ $datas->avg_mo_cash_dep}}
                                                </div>
                                                 <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Average Money Cheque Description :</strong>
                                                        {{ $datas->avg_mo_chq_dep}}
                                                </div>
                                                 <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Average Money Inc Wire :</strong>
                                                        {{ $datas->avg_mo_inc_wire}}
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Average Money Out Wire :</strong>
                                                        {{ $datas->avg_mo_out_wire}}
                                                </div>
                                            </div>  
                                            <hr>
                                            <div class="form-group {{ $errors->first('anticipated_acct_activities', 'has-error') }} "> 
                                                {{ Form::label('anticipated_acct_activities', 'Anticipated Account Activities',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::select('anticipated_acct_activities', array('1' => '1','2' => '2','3' => '3','No' => 'No'), Input::old('anticipated_acct_activities'), array('class' => 'form-control')) }}
                                                {{ $errors->first('anticipated_acct_activities', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('aaa_def_comm', 'has-error') }} "> 
                                                {{ Form::label('aaa_def_comm', 'AAA Deficiency Comments',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::textarea('aaa_def_comm', null, array('id'=>'cif','class' => 'form-control','rows'=>'3')) }}
                                                {{ $errors->first('aaa_def_comm', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="submit" name="action" value="averagemoney" class="btn btn-success">Review</button>
                                                    <div class='pull-right'>
                                                        <a class="btn btn-primary btnPrevious" >Previous</a>
                                                        <a class="btn btn-primary btnNext" >Next</a>
                                                    </div>
                                                </div>
                                            </div>
                                         </div>
                                    </div>
                                </div>
                       
                            </div>
                            <div class="tab-pane fade" id="nonpersonal">
                               <!-- nonpersonal -->
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Non Personal Details</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Ownership Structure :</strong>
                                                        {{ $datas->ownership_structure}}
                                                </div>
                                                 <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Owners on System :</strong>
                                                        {{ $datas->owners_on_system}}
                                                </div>
                                                 <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Confirm Existance :</strong>
                                                        {{ $datas->confirmed_existence}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Record of Directors :</strong>
                                                        {{ $datas->record_of_directors}}
                                                </div>
                                                 <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Directors on System :</strong>
                                                        {{ $datas->directors_on_system}}
                                                </div>
                                            </div> 
                                            <hr>
                                            <div class="form-group {{ $errors->first('signers_review', 'has-error') }} "> 
                                                {{ Form::label('signers_review', 'Signers Review',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::select('signers_review', array('1' => '1','2' => '2','3' => '3','No' => 'No'), Input::old('signers_review'), array('class' => 'form-control')) }}
                                                {{ $errors->first('signers_review', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="submit" name="action" value="nonpersonal" class="btn btn-success">Review</button>
                                                    <div class='pull-right'>
                                                        <a class="btn btn-primary btnPrevious" >Previous</a>
                                                        <a class="btn btn-primary btnNext" >Next</a>
                                                    </div>
                                                </div>
                                            </div>
                                         </div>
                                    </div>
                                </div>
                       
                            </div>
                            <div class="tab-pane fade" id="metrics">
                               <!-- Metrics -->
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Metrics Details</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                         {{ Form::label('totalaccountcount', 'Loan Only (BI Report)',array('class'=>'col-sm-6 control-label')) }}
                                                </div>
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                        {{ Form::text('totalaccountcount', $totalaccountcount, array('id'=>'cif','class' => 'form-control success','readonly')) }}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Joint Total Count :</strong>
                                                        {{ $datas->joint_total_count}}
                                                </div>
                                                 <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Primary Count :</strong>
                                                        {{ $datas->primary_count}}
                                                </div>
                                                 <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Joint Joint Count :</strong>
                                                        {{ $datas->joint_joint_count}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Joint Signer Count :</strong>
                                                        {{ $datas->joint_singer_count}}
                                                </div>
                                            </div>  
                                            <div class="row">
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Joint Power of Attorney Count :</strong>
                                                        {{ $datas->joint_power_of_attorney_count}}
                                                </div>
                                                 <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Joint Excecutor Count :</strong>
                                                        {{ $datas->joint_executor_count}}
                                                </div>
                                                 <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Joint Trustee Count :</strong>
                                                        {{ $datas->joint_trustee_count}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Joint Tenants in Commin Count :</strong>
                                                        {{ $datas->joint_tenants_in_common_count}}
                                                </div>
                                            </div>  
                                            <div class="row">
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Joint Guarantor Count :</strong>
                                                        {{ $datas->joint_guarantor_count}}
                                                </div>
                                                 <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Joint Third Party Count :</strong>
                                                        {{ $datas->joint_third_party_count}}
                                                </div>
                                                 <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Joint Other Count :</strong>
                                                        {{ $datas->joint_other_count}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Total Account Count :</strong>
                                                        {{ $datas->total_account_count}}
                                                </div>
                                            </div>  
                                            <div class="row">
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Total Deposit Count :</strong>
                                                        {{ $datas->total_deposit_count}}
                                                </div>
                                                 <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Total Demand Account Count :</strong>
                                                        {{ $datas->total_demand_account_count}}
                                                </div>
                                                 <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Total Loan Count :</strong>
                                                        {{ $datas->total_loan_count}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Total Term Deposit Count :</strong>
                                                        {{ $datas->total_term_deposit_count}}
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>CIF Count :</strong>
                                                        {{ $datas->cif_Count}}
                                                </div>
                                                 <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>EFG CIF Count :</strong>
                                                        {{ $datas->EFG_CIF_count}}
                                                </div>
                                                 <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>CIF ITF Count :</strong>
                                                        {{ $datas->CIF_ITF_count}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Account Count :</strong>
                                                        {{ $datas->account_count}}
                                                </div>

                                            </div> 
                                            <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>ITF Account Count :</strong>
                                                        {{ $datas->itf_account_count}}
                                                </div>
                                            </div> 
                                            
                                             <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="submit" name="action" value="metrics" class="btn btn-success">Review</button>
                                                    <div class='pull-right'>
                                                        <a class="btn btn-primary btnPrevious" >Previous</a>
                                                        <a class="btn btn-primary btnNext" >Next</a>
                                                    </div>
                                                </div>
                                            </div>
                                         </div>
                                    </div>
                                </div>
                       
                            </div>
                            <div class="tab-pane fade" id="cwb">
                               <!-- cwb -->
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Cwb Review Details</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Physical File Review :</strong>
                                                        {{ $datas->physical_file_review}}
                                                </div>
                                                 <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>FILENET/WAVE :</strong>
                                                        {{ $datas->filenet_wave}}
                                                </div>
                                                 <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Date Sent :</strong>
                                                        {{ $datas->date_sent}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Date Received :</strong>
                                                        {{ $datas->date_received}}
                                                </div>
                                                 <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Br Note :</strong>
                                                        {{ $datas->br_note}}
                                                </div>
                                                 <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Physical Date Reviewed :</strong>
                                                        {{ $datas->physical_date_review}}
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Physical Reviewed by :</strong>
                                                        {{ $datas->physical_reviewed_by}}
                                                </div>
                                                 <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Physical QA by :</strong>
                                                        {{ $datas->physical_qa_by}}
                                                </div>
                                                 <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Physical QA Note :</strong>
                                                        {{ $datas->physical_qa_note}}
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Electronic QA by :</strong>
                                                        {{ $datas->electronic_qa_by}}
                                                </div>
                                                 <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Electronic QA Note :</strong>
                                                        {{ $datas->electronic_qa_note}}
                                                </div>
                                                 <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Electronic QA Rating :</strong>
                                                        {{ $datas->electronic_qa_rating}}
                                                </div>
                                            </div> 
                                            <hr>
                                            <!-- <div class="form-group {{ $errors->first('physical_date_review', 'has-error') }} "> 
                                                {{ Form::label('physical_date_review', 'NAICS Review',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::select('physical_date_review', array('1' => '1','2' => '2','3' => '3','No' => 'No'), Input::old('physical_date_review'), array('class' => 'form-control')) }}
                                                {{ $errors->first('physical_date_review', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('naics_def_comm', 'has-error') }} "> 
                                                {{ Form::label('naics_def_comm', 'NAICS Deficiency Comments',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::textarea('naics_def_comm', null, array('id'=>'cif','class' => 'form-control','rows'=>'3')) }}
                                                {{ $errors->first('naics_def_comm', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div> -->
                                             <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="submit" name="action" value="cwb" class="btn btn-success">Review</button>
                                                    <div class='pull-right'>
                                                        <a class="btn btn-primary btnPrevious" >Previous</a>
                                                    </div>
                                                </div>
                                            </div>
                                         </div>
                                    </div>
                                </div>
                       
                            </div>
                            
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-5">
                                <!-- {{ Form::submit('Update', array('class' => 'btn btn-success submit')) }} -->
                                {{ link_to_route('nonpersonal.index', 'Cancel', null, array('class' => 'btn btn-danger cancel')) }}
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script type="text/javascript">
//my code here
</script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.btnNext').click(function(){
        $('.nav-tabs > .active').next('li').find('a').trigger('click');
        });

        $('.btnPrevious').click(function(){
        $('.nav-tabs > .active').prev('li').find('a').trigger('click');
        });
    });
</script>
@endsection

