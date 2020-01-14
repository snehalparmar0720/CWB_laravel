@extends('layouts.app')
@section('content')
    <div class="row">
        <section class="content">
            
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Customer Personal Accounts Details</h3>
                    </div>
                	<div class="panel-body">
                	{!! Form::model($datas, array('method' => 'PATCH', 'route' => array('personal.update', $datas->cust_id),'class'=>'form-horizontal','role'=>"form")) !!}
                    {{ Form::hidden('address_id', null, array('id'=>'cif','class' => 'form-control')) }}
                    {{ Form::hidden('residence_id', null, array('id'=>'cif','class' => 'form-control')) }}
                    {{ Form::hidden('review_id', null, array('id'=>'cif','class' => 'form-control')) }}
                    {{ Form::hidden('account_type_id', null, array('class' => 'form-control')) }}
                    {{ Form::hidden('personal_review_id', null, array('class' => 'form-control')) }}
                    {{ Form::hidden('third_party_id', null, array('class' => 'form-control')) }}
                    {{ Form::hidden('intended_use_id', null, array('class' => 'form-control')) }}
                    {{ Form::hidden('metrics_id', null, array('class' => 'form-control')) }}
                    {{ Form::hidden('average_money_id', null, array('class' => 'form-control')) }}
                    {{ Form::hidden('identification_id', null, array('class' => 'form-control')) }}
                    {{ Form::hidden('noc_id', null, array('class' => 'form-control')) }}
                    {{ Form::hidden('occupation_id', null, array('class' => 'form-control')) }}
                    {{ Form::hidden('employer_id', null, array('class' => 'form-control')) }}
                    {{ Form::hidden('pefp_pep_id', null, array('class' => 'form-control')) }}
                                                
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
                                <a href="#ids" class="nav-link" data-toggle="tab">ID Review</a>
                            </li>
                            <li class="nav-item">
                                <a href="#noc" class="nav-link" data-toggle="tab">NOC Review</a>
                            </li>
                            <li class="nav-item">
                                <a href="#occupation" class="nav-link" data-toggle="tab">Occupation Review</a>
                            </li>
                            <li class="nav-item">
                                <a href="#employer" class="nav-link" data-toggle="tab">Employer Review</a>
                            </li>
                            <li class="nav-item">
                                <a href="#pefp_pep" class="nav-link" data-toggle="tab">PEFP/PEP Review</a>
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
                            <div class="tab-pane fade" id="ids">
                               <!-- ids -->
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Identification Details</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Agent/Affiliate Entity1 :</strong>
                                                        {{ $datas->agent_affiliate_entity}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Agent/Affiliate Entity2 : </strong>
                                                        {{ $datas->agent_affiliate_entity2}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Agent/Affiliate Name1 : </strong>
                                                        {{ $datas->agent_affiliate_name}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Agent/Affiliate Name2 : </strong>
                                                        {{ $datas->agent_affiliate_name2}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Agent/Affiliate Validation1 :</strong>
                                                        {{ $datas->agent_affiliate_validation}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Agent/Affiliate Validation2 : </strong>
                                                        {{ $datas->agent_affiliate_validation2}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Agent/Affiliate Verification Date1 : </strong>
                                                        {{ $datas->agent_affiliate_verification_date}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Agent/Affiliate Verification Date2 : </strong>
                                                        {{ $datas->agent_affiliate_verification_date2}}
                                                </div>
                                            </div>
                                             <div class="row">
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>CountID1 Digits :</strong>
                                                        {{ $datas->count_id_digit}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>CountID2 Digits : </strong>
                                                        {{ $datas->count_id_digit2}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Customer Identification Number1 : </strong>
                                                        {{ $datas->customer_id_number}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Customer Identification Number2 : </strong>
                                                        {{ $datas->customer_id_number2}}
                                                </div>
                                            </div>
                                             <div class="row">
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Customer Identification Type Desc1 :</strong>
                                                        {{ $datas->customer_id_number_type_desc}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Customer Identification Type Desc2 : </strong>
                                                        {{ $datas->customer_id_number_type_desc2}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Customer Identification Country Of Issue Desc1 : </strong>
                                                        {{ $datas->customer_identification_country_of_issue_desc}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Customer Identification Country Of Issue Desc2 : </strong>
                                                        {{ $datas->customer_identification_country_of_issue_desc2}}
                                                </div>
                                            </div>
                                             <div class="row">
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Customer Identification Place Of Issue Desc1 :</strong>
                                                        {{ $datas->customer_identification_place_of_issue_desc}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Customer Identification Place Of Issue Desc2 : </strong>
                                                        {{ $datas->customer_identification_place_of_issue_desc2}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>CWBIdentify1 : </strong>
                                                        {{ $datas->cwb_identify}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>CWB Identify2 : </strong>
                                                        {{ $datas->cwb_identify2}}
                                                </div>
                                            </div>
                                             <div class="row">
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Employee Verification Date1 :</strong>
                                                        {{ $datas->employee_verification_date}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Employee Verification Date2 : </strong>
                                                        {{ $datas->employee_verification_date2}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Expiry Date1 : </strong>
                                                        {{ $datas->expiry_date}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Expiry Date2 : </strong>
                                                        {{ $datas->expiry_date2}}
                                                </div>
                                            </div>
                                             <div class="row">
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>FACE TO FACE1 :</strong>
                                                        {{ $datas->face_2_face}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>FACE TO FACE2 : </strong>
                                                        {{ $datas->face_2_face2}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Matching Criteria 1 : </strong>
                                                        {{ $datas->matching_criteria}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Matching Criteria 2 : </strong>
                                                        {{ $datas->matching_criteria2}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Source Of Information 1 :</strong>
                                                        {{ $datas->source_of_information}}
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Source Of Information 2 :</strong>
                                                        {{ $datas->source_of_information2}}
                                                </div>
                                            </div> 
                                            <hr>     
                                            <div class="form-group {{ $errors->first('id_review', 'has-error') }} "> 
                                                {{ Form::label('id_review', 'ID Review',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::select('id_review', array('1' => '1','2' => '2','3' => '3','No' => 'No'), Input::old('id_review'), array('class' => 'form-control')) }}
                                                {{ $errors->first('id_review', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="submit" name="action" value="ids" class="btn btn-success">Review</button>
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
                            <div class="tab-pane fade" id="noc">
                                <!-- noc -->
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">NOC Details</h3>
                                        </div>
                                        <div class="panel-body">
                                             <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>NOC Code :</strong>
                                                        {{ $datas->noc_code}}
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>NOC Description : </strong>
                                                        {{ $datas->noc_desc}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group {{ $errors->first('noc_r', 'has-error') }} "> 
                                                {{ Form::label('noc_r', 'NOC Review',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                               {{ Form::select('noc_r', array('1' => '1','2' => '2','3' => '3','No' => 'No'), Input::old('noc_r'), array('class' => 'form-control')) }}
                                                {{ $errors->first('noc_r', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('noc_def_comm', 'has-error') }} "> 
                                                {{ Form::label('noc_def_comm', 'NOC DEFICIENCY COMMENTS',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::textarea('noc_def_comm', null, array('class' => 'form-control','rows'=>'3')) }}
                                                {{ $errors->first('noc_def_comm', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                            
                                         <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="submit" name="action" value="noc" class="btn btn-success">Review</button>
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
                            <div class="tab-pane fade" id="occupation">
                                <!-- occupation -->
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Occupation Details</h3>
                                        </div>
                                        <div class="panel-body">
                                             <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Customer Occupation Description :</strong>
                                                        {{ $datas->customer_occupation_desc}}
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Customer Employment Status Description : </strong>
                                                        {{ $datas->customer_employment_status_desc}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group {{ $errors->first('occupation_review', 'has-error') }} "> 
                                                {{ Form::label('occupation_review', 'Occupation Review',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                               {{ Form::select('occupation_review', array('1' => '1','2' => '2','3' => '3','No' => 'No'), Input::old('occupation_review'), array('class' => 'form-control')) }}
                                                {{ $errors->first('occupation_review', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('occupation_def_comm', 'has-error') }} "> 
                                                {{ Form::label('occupation_def_comm', 'Occupation DEFICIENCY COMMENTS',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::textarea('occupation_def_comm', null, array('class' => 'form-control','rows'=>'3')) }}
                                                {{ $errors->first('occupation_def_comm', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                            
                                         <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="submit" name="action" value="occupation" class="btn btn-success">Review</button>
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
                            <div class="tab-pane fade" id="employer">
                                <!-- employer -->
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Employer Details</h3>
                                        </div>
                                        <div class="panel-body">
                                             <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Customer Employer Business :</strong>
                                                        {{ $datas->customer_employer_business}}
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Customer Employer Name : </strong>
                                                        {{ $datas->customer_employer_name}}
                                                </div>
                                                 <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Customer Employer Address :</strong>
                                                        {{ $datas->customer_employer_address}}
                                                </div>
                                            </div>
                                             <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Employer's Name (Loan Only) : </strong>
                                                        {{ $datas->customer_employer_name_loan}}
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Employer's Address (Loan Only) : </strong>
                                                        {{ $datas->customer_employer_address_loan}}
                                                </div>
                                            </div>
                                            <hr>
                                            
                                            <div class="form-group {{ $errors->first('employer_def_comm', 'has-error') }} "> 
                                                {{ Form::label('employer_def_comm', 'Employer DEFICIENCY COMMENTS',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::textarea('employer_def_comm', null, array('class' => 'form-control','rows'=>'3')) }}
                                                {{ $errors->first('employer_def_comm', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                            
                                         <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="submit" name="action" value="employer" class="btn btn-success">Review</button>
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
                            <div class="tab-pane fade" id="pefp_pep">
                                <!-- pefp_pep -->
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">PEFP_PEP Details</h3>
                                        </div>
                                        <div class="panel-body">
                                             <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>PEFP Flag :</strong>
                                                        {{ $datas->pefp_flag}}
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>PEP Flag :</strong>
                                                        {{ $datas->pep_flag}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group {{ $errors->first('pefp_review', 'has-error') }} "> 
                                                {{ Form::label('pefp_review', 'PEFP Review',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                               {{ Form::select('pefp_review', array('1' => '1','2' => '2','3' => '3','No' => 'No'), Input::old('pefp_review'), array('class' => 'form-control')) }}
                                                {{ $errors->first('pefp_review', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('pep_review', 'has-error') }} "> 
                                                {{ Form::label('pep_review', 'PEP Review',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                               {{ Form::select('pep_review', array('1' => '1','2' => '2','3' => '3','No' => 'No'), Input::old('pep_review'), array('class' => 'form-control')) }}
                                                {{ $errors->first('pep_review', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('pefp_pep_def_comm', 'has-error') }} "> 
                                                {{ Form::label('pefp_pep_def_comm', 'PEFP/PEP DEFICIENCY COMMENTS',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::textarea('pefp_pep_def_comm', null, array('class' => 'form-control','rows'=>'3')) }}
                                                {{ $errors->first('pefp_pep_def_comm', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                            
                                         <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="submit" name="action" value="pefp_pep" class="btn btn-success">Review</button>
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
                                                 <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Category Code :</strong>
                                                        {{ $datas->category_code}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Intended Use Code :</strong>
                                                        {{ $datas->intended_use_code}}
                                                </div>
                                                 <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Intended Use Description :</strong>
                                                        {{ $datas->intended_use_desc}}
                                                </div>
                                                 <div class="col-xs-3 col-sm-3 col-md-3">
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
                                                 <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Physical Date Reviewed :</strong>
                                                        {{ $datas->physical_date_review}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Physical Reviewed by :</strong>
                                                        {{ $datas->physical_reviewed_by}}
                                                </div>
                                                 <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Physical QA by :</strong>
                                                        {{ $datas->physical_qa_by}}
                                                </div>
                                                 <div class="col-xs-3 col-sm-3 col-md-3">
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

