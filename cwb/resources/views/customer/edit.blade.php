@extends('layouts.app')
@section('content')
    <div class="row">
        <section class="content">
            
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Customer Accounts Details</h3>
                    </div>
                	<div class="panel-body">
                	{!! Form::model($datas, array('method' => 'PATCH', 'route' => array('customer.update', $datas->cust_id),'class'=>'form-horizontal','role'=>"form")) !!}
                        <div class="form-group {{ $errors->first('customer_name', 'has-error') }} "> 
                            {{ Form::label('customer_name', 'Customer Name',array('class'=>'col-sm-4 control-label')) }} 
                            <div class="col-sm-3">
                            {{ Form::text('customer_name',null, array('class' => 'form-control')) }}
                            {{ $errors->first('customer_name', '<span class="error">:message</span>') }} 
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('c_cif', 'has-error') }} "> 
                            {{ Form::label('c_cif', 'CIF',array('class'=>'col-sm-4 control-label')) }} 
                            <div class="col-sm-3">
                            {{ Form::text('c_cif', null, array('id'=>'cif','class' => 'form-control')) }}
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
                                <div class=" col-md-offset-2 col-sm-8">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Address Review</h3>
                                        </div>
                                        <div class="panel-body">
                                            
                                            <div class="form-group {{ $errors->first('line_1_address', 'has-error') }} "> 
                                                {{ Form::hidden('address_id', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ Form::hidden('residence_id', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ Form::hidden('review_id', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ Form::label('line_1_address', 'Address Line 1',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('line_1_address', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('line_1_address', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('line_2_address', 'has-error') }} "> 
                                                {{ Form::label('line_2_address', 'Address Line 2',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('line_2_address', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('line_2_address', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('line_3_address', 'has-error') }} "> 
                                                {{ Form::label('line_3_address', 'Address Line 3',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('line_3_address', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('line_3_address', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('customer_city_name', 'has-error') }} "> 
                                                {{ Form::label('customer_city_name', 'City Name',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('customer_city_name', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('customer_city_name', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('postal_code', 'has-error') }} "> 
                                                {{ Form::label('postal_code', 'Postal Code',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('postal_code', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('postal_code', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('province_state_code', 'has-error') }} "> 
                                                {{ Form::label('province_state_code', 'Province State Code',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('province_state_code', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('province_state_code', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('address_country_code', 'has-error') }} "> 
                                                {{ Form::label('address_country_code', 'Address Country Code',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('address_country_code', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('address_country_code', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <!-- legal -->
                                            <div class="form-group {{ $errors->first('line_1_address_legal', 'has-error') }} "> 
                                                {{ Form::label('line_1_address_legal', 'Legal Address Line 1',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('line_1_address_legal', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('line_1_address_legal', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('line_2_address_legal', 'has-error') }} "> 
                                                {{ Form::label('line_2_address_legal', 'Legal Address Line 2',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('line_2_address_legal', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('line_2_address_legal', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('line_3_address_legal', 'has-error') }} "> 
                                                {{ Form::label('line_3_address_legal', 'Legal Address Line 3',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('line_3_address_legal', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('line_3_address_legal', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('customer_city_name_legal', 'has-error') }} "> 
                                                {{ Form::label('customer_city_name_legal', 'Legal City Name',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('customer_city_name_legal', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('customer_city_name_legal', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('postal_code_legal', 'has-error') }} "> 
                                                {{ Form::label('postal_code_legal', 'Legal Postal Code',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('postal_code_legal', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('postal_code_legal', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('province_state_code_legal', 'has-error') }} "> 
                                                {{ Form::label('province_state_code_legal', 'Legal Province State Code',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('province_state_code_legal', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('province_state_code_legal', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('address_country_code_legal', 'has-error') }} "> 
                                                {{ Form::label('address_country_code_legal', 'Legal Address Country Code',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('address_country_code_legal', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('address_country_code_legal', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <!-- end legal -->
                                             <div class="form-group {{ $errors->first('country_of_residence_desc', 'has-error') }} "> 
                                                {{ Form::label('country_of_residence_desc', 'Country of Residence Description',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('country_of_residence_desc', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('country_of_residence_desc', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('cp_address', 'has-error') }} "> 
                                                {{ Form::label('cp_address', 'Canada Post Address',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('cp_address', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('cp_address', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('cp_city', 'has-error') }} "> 
                                                {{ Form::label('cp_city', 'Canada Post City',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('cp_city', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('cp_city', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('cp_postal_code', 'has-error') }} "> 
                                                {{ Form::label('cp_postal_code', 'Canada Post Postal Code',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('cp_postal_code', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('cp_postal_code', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('cp_province', 'has-error') }} "> 
                                                {{ Form::label('cp_province', 'Canada Post Province',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('cp_province', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('cp_province', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('cp_country', 'has-error') }} "> 
                                                {{ Form::label('cp_country', 'Canada Post Country',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('cp_country', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('cp_country', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('address_def_comm', 'has-error') }} "> 
                                                {{ Form::label('address_def_comm', 'Address Deficiency Comments',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::textarea('address_def_comm', null, array('id'=>'cif','class' => 'form-control','rows'=>3)) }}
                                                {{ $errors->first('address_def_comm', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                             <div class="form-group {{ $errors->first('non_residential_flag', 'has-error') }} "> 
                                                {{ Form::label('non_residential_flag', 'Non Resident Flag',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('non_residential_flag', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('non_residential_flag', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('address_review', 'has-error') }} "> 
                                                {{ Form::label('address_review', 'Address Review',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                    {{ Form::select('address_review', array('0' => '0','1' => '1','2' => '2','No' => 'No'), Input::old('address_review'), array('class' => 'form-control')) }}
                                                {{ $errors->first('address_review', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                              <button type="submit" name="action" value="address" class="btn btn-success submit">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="naics">
                               <!-- naics -->
                                <div class=" col-md-offset-2 col-sm-8">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">NAICS Details</h3>
                                        </div>
                                        <div class="panel-body">
                                              {{ Form::hidden('account_type_id', null, array('class' => 'form-control')) }}
                                                {{ Form::hidden('non_personal_review_id', null, array('class' => 'form-control')) }}
                                            <div class="form-group {{ $errors->first('naics_code', 'has-error') }} "> 
                                                {{ Form::label('naics_code', 'NAICS Code',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('naics_code', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('naics_code', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('naics_name', 'has-error') }} "> 
                                                {{ Form::label('naics_name', 'NAICS Name',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('naics_name', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('naics_name', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('naics_sector_name', 'has-error') }} "> 
                                                {{ Form::label('naics_sector_name', 'NAICS Sector Name',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('naics_sector_name', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('naics_sector_name', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('naics_internal_sector_name', 'has-error') }} "> 
                                                {{ Form::label('naics_internal_sector_name', 'NAICS Internal Sector Name',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('naics_internal_sector_name', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('naics_internal_sector_name', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('naics_lookup', 'has-error') }} "> 
                                                {{ Form::label('naics_lookup', 'NAICS Lookup',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('naics_lookup', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('naics_lookup', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('naics_prohibited', 'has-error') }} "> 
                                                {{ Form::label('naics_prohibited', 'NAICS Prohibited',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('naics_prohibited', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('naics_prohibited', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('name_holding_but_not_holding_company', 'has-error') }} "> 
                                                {{ Form::label('name_holding_but_not_holding_company', 'Name Holding but not Holding Company',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('name_holding_but_not_holding_company', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('name_holding_but_not_holding_company', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('naics_r', 'has-error') }} "> 
                                                {{ Form::label('naics_r', 'NAICS Review',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::select('naics_r', array('0' => '0','1' => '1','2' => '2','No' => 'No'), Input::old('naics_r'), array('class' => 'form-control')) }}
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
                                            <button type="submit" name="action" value="naics" class="btn btn-success">Save</button>
                                         </div>
                                    </div>
                                </div>
                       
                            </div>
                            <div class="tab-pane fade" id="charity">
                                <!-- charity -->
                                <div class=" col-md-offset-2 col-sm-8">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Charity Details</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group {{ $errors->first('registered_charity_flag', 'has-error') }} "> 
                                                {{ Form::label('registered_charity_flag', 'Registered Charity Flag',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('registered_charity_flag', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('registered_charity_flag', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('accepts_donations_flag', 'has-error') }} "> 
                                                {{ Form::label('accepts_donations_flag', 'Accepted Donation Flag',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('accepts_donations_flag', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('accepts_donations_flag', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('charity_r', 'has-error') }} "> 
                                                {{ Form::label('charity_r', 'Charity Review',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                               {{ Form::select('charity_r', array('0' => '0','1' => '1','2' => '2','No' => 'No'), Input::old('charity_r'), array('class' => 'form-control')) }}
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
                                         <button type="submit" name="action" value="charity" class="btn btn-success submit">Save</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="thirdparty">
                               <!-- third party -->
                                <div class=" col-md-offset-2 col-sm-8">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Third Party Details</h3>
                                        </div>
                                        <div class="panel-body">
                                              {{ Form::hidden('third_party_id', null, array('class' => 'form-control')) }}
                                              
                                            <div class="form-group {{ $errors->first('third_party_flag', 'has-error') }} "> 
                                                {{ Form::label('third_party_flag', 'Third Party Flag',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('third_party_flag', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('third_party_flag', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('third_party', 'has-error') }} "> 
                                                {{ Form::label('third_party', 'Third Party Review',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::select('third_party', array('0' => '0','1' => '1','2' => '2','No' => 'No'), Input::old('third_party'), array('class' => 'form-control')) }}
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
                                            <button type="submit" name="action" value="thirdparty" class="btn btn-success">Save</button>
                                         </div>
                                    </div>
                                </div>
                       
                            </div>
                            <div class="tab-pane fade" id="intendeduse">
                               <!-- Intended Use -->
                                <div class=" col-md-offset-2 col-sm-8">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Intended Use Details</h3>
                                        </div>
                                        <div class="panel-body">
                                              {{ Form::hidden('intended_use_id', null, array('class' => 'form-control')) }}
                                                
                                            <div class="form-group {{ $errors->first('intended_use_code', 'has-error') }} "> 
                                                {{ Form::label('intended_use_code', 'Intended Use Code',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('intended_use_code', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('intended_use_code', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('intended_use_desc', 'has-error') }} "> 
                                                {{ Form::label('intended_use_desc', 'Intended Use Description',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('intended_use_desc', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('intended_use_desc', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            
                                            <div class="form-group {{ $errors->first('intended_use_other_desc', 'has-error') }} "> 
                                                {{ Form::label('intended_use_other_desc', 'Intended Use Other Description',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('intended_use_other_desc', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('intended_use_other_desc', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('intended_use', 'has-error') }} "> 
                                                {{ Form::label('intended_use', 'Intended Use Review',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::select('intended_use', array('0' => '0','1' => '1','2' => '2','No' => 'No'), Input::old('intended_use'), array('class' => 'form-control')) }}
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
                                            <button type="submit" name="action" value="intendeduse" class="btn btn-success">Save</button>
                                         </div>
                                    </div>
                                </div>
                       
                            </div>
                            <div class="tab-pane fade" id="averagemoney">
                               <!-- Average Money-->
                                <div class=" col-md-offset-2 col-sm-8">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Average Money Details</h3>
                                        </div>
                                        <div class="panel-body">
                                              {{ Form::hidden('average_money_id', null, array('class' => 'form-control')) }}
                                            <div class="form-group {{ $errors->first('avg_mo_cash_dep', 'has-error') }} "> 
                                                {{ Form::label('avg_mo_cash_dep', 'Average Money Cash Description',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('avg_mo_cash_dep', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('avg_mo_cash_dep', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('avg_mo_chq_dep', 'has-error') }} "> 
                                                {{ Form::label('avg_mo_chq_dep', 'Average Money Cheque Description',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('avg_mo_chq_dep', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('avg_mo_chq_dep', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('avg_mo_inc_wire', 'has-error') }} "> 
                                                {{ Form::label('avg_mo_inc_wire', 'Average Money Inc Wire',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('avg_mo_inc_wire', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('avg_mo_inc_wire', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                             <div class="form-group {{ $errors->first('avg_mo_out_wire', 'has-error') }} "> 
                                                {{ Form::label('avg_mo_out_wire', 'Average Money Out Wire',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('avg_mo_out_wire', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('avg_mo_out_wire', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('anticipated_acct_activities', 'has-error') }} "> 
                                                {{ Form::label('anticipated_acct_activities', 'Anticipated Account Activities',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::select('anticipated_acct_activities', array('0' => '0','1' => '1','2' => '2','No' => 'No'), Input::old('anticipated_acct_activities'), array('class' => 'form-control')) }}
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
                                            <button type="submit" name="action" value="averagemoney" class="btn btn-success">Save</button>
                                         </div>
                                    </div>
                                </div>
                       
                            </div>
                            <div class="tab-pane fade" id="nonpersonal">
                               <!-- nonpersonal -->
                                <div class=" col-md-offset-2 col-sm-8">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Non Personal Details</h3>
                                        </div>
                                        <div class="panel-body">
                                               <!--  {{ Form::hidden('non_personal_review_id', null, array('class' => 'form-control')) }} -->
                                            <div class="form-group {{ $errors->first('ownership_structure', 'has-error') }} "> 
                                                {{ Form::label('ownership_structure', 'Ownership Structure',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('ownership_structure', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('ownership_structure', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('owners_on_system', 'has-error') }} "> 
                                                {{ Form::label('owners_on_system', 'Owners on System',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('owners_on_system', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('owners_on_system', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('confirmed_existence', 'has-error') }} "> 
                                                {{ Form::label('confirmed_existence', 'Confirm Existance',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('confirmed_existence', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('confirmed_existence', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('record_of_directors', 'has-error') }} "> 
                                                {{ Form::label('record_of_directors', 'Record of Directors',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('record_of_directors', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('record_of_directors', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('directors_on_system', 'has-error') }} "> 
                                                {{ Form::label('directors_on_system', 'Directors on System',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('directors_on_system', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('directors_on_system', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('signers_review', 'has-error') }} "> 
                                                {{ Form::label('signers_review', 'Signers Review',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::select('signers_review', array('0' => '0','1' => '1','2' => '2','No' => 'No'), Input::old('signers_review'), array('class' => 'form-control')) }}
                                                {{ $errors->first('signers_review', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <button type="submit" name="action" value="nonpersonal" class="btn btn-success">Save</button>
                                         </div>
                                    </div>
                                </div>
                       
                            </div>
                            <div class="tab-pane fade" id="metrics">
                               <!-- Metrics -->
                                <div class=" col-md-offset-2 col-sm-8">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Metrics Details</h3>
                                        </div>
                                        <div class="panel-body">
                                              {{ Form::hidden('metrics_id', null, array('class' => 'form-control')) }}
                                               
                                            <div class="form-group {{ $errors->first('joint_total_count', 'has-error') }} "> 
                                                {{ Form::label('joint_total_count', 'Joint Total Count',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('joint_total_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('joint_total_count', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('primary_count', 'has-error') }} "> 
                                                {{ Form::label('primary_count', 'Metrics Name',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('primary_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('primary_count', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('joint_joint_count', 'has-error') }} "> 
                                                {{ Form::label('joint_joint_count', 'Metrics Sector Name',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('joint_joint_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('joint_joint_count', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('joint_singer_count', 'has-error') }} "> 
                                                {{ Form::label('joint_singer_count', 'Metrics Internal Sector Name',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('joint_singer_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('joint_singer_count', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('joint_power_of_attorney_count', 'has-error') }} "> 
                                                {{ Form::label('joint_power_of_attorney_count', 'Metrics Lookup',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('joint_power_of_attorney_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('joint_power_of_attorney_count', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('joint_executor_count', 'has-error') }} "> 
                                                {{ Form::label('joint_executor_count', 'Metrics Prohibited',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('joint_executor_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('joint_executor_count', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('joint_trustee_count', 'has-error') }} "> 
                                                {{ Form::label('joint_trustee_count', 'Name Holding but not Holding Company',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('joint_trustee_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('joint_trustee_count', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('joint_tenants_in_common_count', 'has-error') }} "> 
                                                {{ Form::label('joint_tenants_in_common_count', 'Joint Tenants in Commin Count',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('joint_tenants_in_common_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('joint_tenants_in_common_count', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('joint_guarantor_count', 'has-error') }} "> 
                                                {{ Form::label('joint_guarantor_count', 'Joint Guarantor Count',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('joint_guarantor_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('joint_guarantor_count', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('joint_third_party_count', 'has-error') }} "> 
                                                {{ Form::label('joint_third_party_count', 'Joint Third Party Count',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('joint_third_party_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('joint_third_party_count', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('joint_other_count', 'has-error') }} "> 
                                                {{ Form::label('joint_other_count', 'Joint Other Count',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('joint_other_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('joint_other_count', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('total_account_count', 'has-error') }} "> 
                                                {{ Form::label('total_account_count', 'Total Account Count',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('total_account_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('total_account_count', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                               <div class="form-group {{ $errors->first('total_deposit_count', 'has-error') }} "> 
                                                {{ Form::label('total_deposit_count', 'Total Deposit Count',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('total_deposit_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('total_deposit_count', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('total_demand_account_count', 'has-error') }} "> 
                                                {{ Form::label('total_demand_account_count', 'Total Demand Account Count',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('total_demand_account_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('total_demand_account_count', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('total_loan_count', 'has-error') }} "> 
                                                {{ Form::label('total_loan_count', 'Total Loan Count',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('total_loan_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('total_loan_count', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('total_term_deposit_count', 'has-error') }} "> 
                                                {{ Form::label('total_term_deposit_count', 'Total Term Deposit Count',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('total_term_deposit_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('total_term_deposit_count', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('cif_count', 'has-error') }} "> 
                                                {{ Form::label('cif_count', 'CIF Count',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('cif_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('cif_count', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('EFG_CIF_count', 'has-error') }} "> 
                                                {{ Form::label('EFG_CIF_count', 'EFG CIF Count',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('EFG_CIF_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('EFG_CIF_count', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('CIF_ITF_count', 'has-error') }} "> 
                                                {{ Form::label('CIF_ITF_count', 'CIF ITF Count',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('CIF_ITF_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('CIF_ITF_count', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('account_count', 'has-error') }} "> 
                                                {{ Form::label('account_count', 'Account Count',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('account_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('account_count', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('itf_account_count', 'has-error') }} "> 
                                                {{ Form::label('itf_account_count', 'ITF Account Count',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('itf_account_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('itf_account_count', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <button type="submit" name="action" value="metrics" class="btn btn-success">Save</button>
                                         </div>
                                    </div>
                                </div>
                       
                            </div>
                            <div class="tab-pane fade" id="cwb">
                               <!-- cwb -->
                                <div class=" col-md-offset-2 col-sm-8">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Cwb Review Details</h3>
                                        </div>
                                        <div class="panel-body">
                                              {{ Form::hidden('review_id', null, array('class' => 'form-control')) }}
                                                <!-- {{ Form::hidden('non_personal_review_id', null, array('class' => 'form-control')) }} -->
                                            <div class="form-group {{ $errors->first('physical_file_review', 'has-error') }} "> 
                                                {{ Form::label('physical_file_review', 'Physical File Review',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('physical_file_review', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('physical_file_review', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('filenet_wave', 'has-error') }} "> 
                                                {{ Form::label('filenet_wave', 'FILENET/WAVE',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('filenet_wave', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('filenet_wave', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('date_sent', 'has-error') }} "> 
                                                {{ Form::label('date_sent', 'Date Sent',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('date_sent', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('date_sent', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('date_received', 'has-error') }} "> 
                                                {{ Form::label('date_received', 'Date Received' ,array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('date_received', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('date_received', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('br_note', 'has-error') }} "> 
                                                {{ Form::label('br_note', 'Br Note',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('br_note', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('br_note', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('physical_date_review', 'has-error') }} "> 
                                                {{ Form::label('physical_date_review', 'Physical Date Reviewed ',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('physical_date_review', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('physical_date_review', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('physical_reviewed_by', 'has-error') }} "> 
                                                {{ Form::label('physical_reviewed_by', 'Physical Reviewed by',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('physical_reviewed_by', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('physical_reviewed_by', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('physical_qa_by', 'has-error') }} "> 
                                                {{ Form::label('physical_qa_by', 'Physical QA by',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('physical_qa_by', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('physical_qa_by', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('physical_qa_note', 'has-error') }} "> 
                                                {{ Form::label('physical_qa_note', 'Physical QA Note',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('physical_qa_note', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('physical_qa_note', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('electronic_qa_by', 'has-error') }} "> 
                                                {{ Form::label('electronic_qa_by', 'Electronic QA by',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('electronic_qa_by', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('electronic_qa_by', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('electronic_qa_note', 'has-error') }} "> 
                                                {{ Form::label('electronic_qa_note', 'Electronic QA Note',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('electronic_qa_note', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('electronic_qa_note', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('electronic_qa_rating', 'has-error') }} "> 
                                                {{ Form::label('electronic_qa_rating', 'Electronic QA Rating',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::text('electronic_qa_rating', null, array('id'=>'cif','class' => 'form-control')) }}
                                                {{ $errors->first('electronic_qa_rating', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <!-- <div class="form-group {{ $errors->first('physical_date_review', 'has-error') }} "> 
                                                {{ Form::label('physical_date_review', 'NAICS Review',array('class'=>'col-sm-3 control-label')) }} 
                                                <div class="col-sm-5">
                                                {{ Form::select('physical_date_review', array('0' => '0','1' => '1','2' => '2','No' => 'No'), Input::old('physical_date_review'), array('class' => 'form-control')) }}
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
                                            <button type="submit" name="action" value="cwb" class="btn btn-success">Save</button>
                                         </div>
                                    </div>
                                </div>
                       
                            </div>
                            
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-5">
                                <!-- {{ Form::submit('Update', array('class' => 'btn btn-success submit')) }} -->
                                {{ link_to_route('customer.index', 'Cancel', null, array('class' => 'btn btn-danger cancel')) }}
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
