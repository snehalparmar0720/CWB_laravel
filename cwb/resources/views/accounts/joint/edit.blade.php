@extends('layouts.app')
@section('content')
    <div class="row">
        <section class="content">
            
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Customer Joint Accounts Details</h3>
                    </div>
                	<div class="panel-body">
                	{!! Form::model($datas, array('method' => 'PATCH', 'route' => array('joint.update', $datas->cust_id),'class'=>'form-horizontal','role'=>"form")) !!}
                    {{ Form::hidden('address_id', null, array('id'=>'cif','class' => 'form-control')) }}
                    {{ Form::hidden('residence_id', null, array('id'=>'cif','class' => 'form-control')) }}
                    {{ Form::hidden('account_type_id', null, array('class' => 'form-control')) }}
                    {{ Form::hidden('joint_review_id', null, array('class' => 'form-control')) }}
                    {{ Form::hidden('review_id', null, array('class' => 'form-control')) }}
                    {{ Form::hidden('metrics_id', null, array('class' => 'form-control')) }}
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
                                <a href="#role" class="nav-link" data-toggle="tab">Role Review</a>
                            </li>
                            <li class="nav-item">
                                <a href="#dob" class="nav-link" data-toggle="tab">DOB Review</a>
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
                                            <div class="form-group {{ $errors->first('id_deficiency_comments', 'has-error') }} "> 
                                                {{ Form::label('id_deficiency_comments', 'ID Deficiency Comments',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::textarea('id_deficiency_comments', null, array('id'=>'cif','class' => 'form-control','rows'=>'3')) }}
                                                {{ $errors->first('id_deficiency_comments', '<span class="error">:message</span>') }} 
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
                            <div class="tab-pane fade" id="role">
                               <!-- Role -->
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Role Details</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Joint Type Description :</strong>
                                                        {{ $datas->joint_type_desc}}
                                                </div>
                                                 <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Multiple CIFs :</strong>
                                                        {{ $datas->multiple_cifs}}
                                                </div>
                                                 <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Selected for Role Review :</strong>
                                                        {{ $datas->selected_for_role_review}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>CIF Relation :</strong>
                                                        {{ $datas->cif_relation}}
                                                </div>
                                                 <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Personal CIF Role :</strong>
                                                        {{ $datas->personal_cif_role}}
                                                </div>
                                                 <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Correct Role :</strong>
                                                        {{ $datas->correct_role}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Highest AML Requirement Role :</strong>
                                                        {{ $datas->highest_aml_requirement_role}}
                                                </div>
                                            </div> 
                                            <hr>
                                            <div class="form-group {{ $errors->first('type_def_comm', 'has-error') }} "> 
                                                {{ Form::label('type_def_comm', 'Type Deficiency Comments',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::textarea('type_def_comm', null, array('id'=>'cif','class' => 'form-control','rows'=>'3')) }}
                                                {{ $errors->first('type_def_comm', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('role_def_comm', 'has-error') }} "> 
                                                {{ Form::label('role_def_comm', 'Role Deficiency Comments',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::textarea('role_def_comm', null, array('id'=>'cif','class' => 'form-control','rows'=>'3')) }}
                                                {{ $errors->first('role_def_comm', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                           
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="submit" name="action" value="role" class="btn btn-success">Review</button>
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
                            <div class="tab-pane fade" id="dob">
                               <!-- DOB -->
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">DOB Details</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                 <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Customer Birth Date :</strong>
                                                        {{ $datas->customer_birth_date}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group {{ $errors->first('dob_review', 'has-error') }} "> 
                                                {{ Form::label('dob_review', 'DOB Review',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::select('dob_review', array('1' => '1','2' => '2','3' => '3','No' => 'No'), Input::old('dob_review'), array('class' => 'form-control')) }}
                                                {{ $errors->first('dob_review', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('dob_def_comm', 'has-error') }} "> 
                                                {{ Form::label('dob_def_comm', 'DOB Deficiency Comments',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::textarea('dob_def_comm', null, array('id'=>'cif','class' => 'form-control','rows'=>'3')) }}
                                                {{ $errors->first('dob_def_comm', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="submit" name="action" value="dob" class="btn btn-success">Review</button>
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
                                                        <strong>Optimum Physical IDs :</strong>
                                                        {{ $datas->optimum_physical_ids}}
                                                </div>
                                                 <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Physical Review :</strong>
                                                        {{ $datas->physical_review}}
                                                </div>
                                                 <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Physical Deficient :</strong>
                                                        {{ $datas->physical_deficient}}
                                                </div>
                                            </div>  
                                            <div class="row">
                                                 <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Physical Date Reviewed :</strong>
                                                        {{ $datas->physical_date_review}}
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Physical Reviewed by :</strong>
                                                        {{ $datas->physical_reviewed_by}}
                                                </div>
                                                 <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>Physical QA by :</strong>
                                                        {{ $datas->physical_qa_by}}
                                                </div>
                                            </div> 
                                            <div class="row">
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

