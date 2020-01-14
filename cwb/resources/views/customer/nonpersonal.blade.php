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
                                         </div>
                                    </div>
                                </div>
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
                                        </div>
                                    </div>
                                </div>
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
                                         </div>
                                    </div>
                                </div>
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
                                         </div>
                                    </div>
                                </div>
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
                                         </div>
                                    </div>
                                </div>
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
                                         </div>
                                    </div>
                                </div>
                               <!-- Metrics -->
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Metrics Details</h3>
                                        </div>
                                        <div class="panel-body">
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

