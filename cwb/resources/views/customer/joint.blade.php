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
                	{!! Form::model($datas, array('method' => 'PATCH', 'route' => array('nonpersonal.update', $datas->cust_id),'class'=>'form-horizontal','role'=>"form")) !!}
                                                
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
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Address Review</h3>
                                    </div>
                                    <div class="panel-body">
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
                                    </div>
                                </div>
                            </div>
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
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Source Of Information 1 :</strong>
                                                        {{ $datas->source_of_information}}
                                                </div>
                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                        <strong>Source Of Information 2 :</strong>
                                                        {{ $datas->source_of_information2}}
                                                </div>
                                            </div> 
                                         </div>
                                    </div>
                                </div>
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
                                        </div>
                                    </div>
                                </div>
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
                                        </div>
                                    </div>
                                </div>
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
                                        </div>
                                    </div>
                                </div>
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
                                        </div>
                                    </div>
                                </div>
                               <!-- third party -->
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
                                    </div>
                                </div>
                            </div>
                               <!-- Intended Use -->
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
                                        </div>
                                    </div>
                                </div>
                               
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
                                         </div>
                                    </div>
                                </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-5">
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

