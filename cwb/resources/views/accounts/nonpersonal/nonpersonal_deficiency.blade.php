@extends('layouts.app')
@section('content')
	<div class="row">
    <div class="col-sm-offset-1 col-sm-5">
              {{ link_to_route('nonpersonal.index', 'Back', null, array('class' => 'btn btn-danger cancel')) }}
    </div>
		<section class="content">
  @include('messages')
			<div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-body">
              <div class="pull-left"><h3>Non Personal Deficiency</h3>
              </div>
            <div class="table-container">
              <table id="mytable" class="table table-bordred table-striped">
                   <thead>
                       <th></th>
                        <td>Address Review</td>
                        <td>NAICS Review</td>
                        <td>Charity Review</td>
                        <td>Third Party Review</td>
                        <td>Intended Use Review</td>
                        <td>Ownership Structure</td>
                        <td>Owners on System</td>
                        <td>Confirm Existence</td>
                        <td>Record of Directors</td>
                        <td>Directors On System</td>
                        <td>Signers Review</td>
                        <td>Anticipated Account Activities</td>
                   </thead>
                    <tbody>
                       <?php
                     $address_population = $address_review_rating1+$address_review_rating2+$address_review_rating3;
                     $naics_population = $naics_review_rating1+$naics_review_rating2+$naics_review_rating3;
                     $charity_population = $charity_review_rating1+$charity_review_rating2+$charity_review_rating3;
                     $ownership_structure_population = $ownership_structure_review_rating1+$ownership_structure_review_rating2+$ownership_structure_review_rating3;
                     $third_party_population = $third_party_review_rating1+$third_party_review_rating2+$third_party_review_rating3;
                     $intended_use_population = $intended_use_review_rating1+$intended_use_review_rating2+$intended_use_review_rating3;
                     $owners_on_system_population = $owners_on_system_review_rating1+$owners_on_system_review_rating2+$owners_on_system_review_rating3;
                     $confirmed_existence_population = $confirmed_existence_review_rating1+$confirmed_existence_review_rating2+$confirmed_existence_review_rating3;
                     $record_of_directors_population = $record_of_directors_review_rating1+$record_of_directors_review_rating2+$record_of_directors_review_rating3;
                     $directors_on_system_population = $directors_on_system_review_rating1+$directors_on_system_review_rating2+$directors_on_system_review_rating3;
                     $signers_population = $signers_review_rating1+$signers_review_rating2+$signers_review_rating3;
                     $anticipated_acct_activities_population = $anticipated_acct_activities_review_rating1+$anticipated_acct_activities_review_rating2+$anticipated_acct_activities_review_rating3;

                     $address_eff = $address_population == 0 ? 0 : ($address_review_rating1/$address_population)*100;
                     $naics_eff = $naics_population == 0 ? 0 : ($naics_review_rating1/$naics_population)*100;
                     $charity_eff = $charity_population == 0 ? 0 : ($charity_review_rating1/$charity_population)*100;
                     $ownership_structure_eff = $ownership_structure_population == 0 ? 0 : ($ownership_structure_review_rating1/$ownership_structure_population)*100;
                     $third_party_eff = $third_party_population == 0 ? 0 : ($third_party_review_rating1/$third_party_population)*100;
                     $intended_use_eff = $intended_use_population == 0 ? 0 : ($intended_use_review_rating1/$intended_use_population)*100;
                     $owners_on_system_eff = $owners_on_system_population == 0 ? 0 : ($owners_on_system_review_rating1/$owners_on_system_population)*100;
                     $confirmed_existence_eff = $confirmed_existence_population == 0 ? 0 : ($confirmed_existence_review_rating1/$confirmed_existence_population)*100;
                     $record_of_directors_eff = $record_of_directors_population == 0 ? 0 : ($record_of_directors_review_rating1/$record_of_directors_population)*100;
                     $directors_on_system_eff = $directors_on_system_population == 0 ? 0 : ($directors_on_system_review_rating1/$directors_on_system_population)*100;
                     $signers_eff = $signers_population == 0 ? 0 : ($signers_review_rating1/$signers_population)*100;
                     $anticipated_acct_activities_eff = $anticipated_acct_activities_population == 0 ? 0 : ($anticipated_acct_activities_review_rating1/$anticipated_acct_activities_population)*100;
                      
                      $address_def = $address_population == 0 ? 0 : ((($address_review_rating2 * 0.5) + ($address_review_rating3))/$address_population)*100;
                      $naics_def = $naics_population == 0 ? 0 : ((($naics_review_rating2 * 0.5) + ($naics_review_rating3))/$naics_population)*100;
                      $charity_def = $charity_population == 0 ? 0 : ((($charity_review_rating2 * 0.5) + ($charity_review_rating3))/$charity_population)*100;
                      $third_party_def = $third_party_population == 0 ? 0 : ((($third_party_review_rating2 * 0.5) + ($third_party_review_rating3))/$third_party_population)*100;
                      $intended_use_def = $intended_use_population == 0 ? 0 : ((($intended_use_review_rating2 * 0.5) + ($intended_use_review_rating3))/$intended_use_population)*100;
                      $ownership_structure_def = $ownership_structure_population == 0 ? 0 : ((($ownership_structure_review_rating2 * 0.5) + ($ownership_structure_review_rating3))/$ownership_structure_population)*100;
                      $confirmed_existence_def = $confirmed_existence_population == 0 ? 0 : ((($confirmed_existence_review_rating2 * 0.5) + ($confirmed_existence_review_rating3))/$confirmed_existence_population)*100;
                      $record_of_directors_def = $record_of_directors_population == 0 ? 0 : ((($record_of_directors_review_rating2 * 0.5) + ($record_of_directors_review_rating3))/$record_of_directors_population)*100;
                      $directors_on_system_def = $directors_on_system_population == 0 ? 0 : ((($directors_on_system_review_rating2 * 0.5) +($directors_on_system_review_rating3))/$directors_on_system_population)*100;
                      $signers_def = $signers_population == 0 ? 0 : ((($signers_review_rating2 * 0.5) + ($signers_review_rating3))/$signers_population)*100;
                      $anticipated_acct_activities_def = $anticipated_acct_activities_population == 0 ? 0 : ((($anticipated_acct_activities_review_rating2 * 0.5) + ($anticipated_acct_activities_review_rating3))/$anticipated_acct_activities_population)*100;
                    ?>
                   <tr>
                     <th>Populations</th>
                     <td>{{$address_population}}</td>
                     <td>{{$naics_population}}</td>
                     <td>{{$charity_population}}</td>
                     <td>{{$third_party_population}}</td>
                     <td>{{$intended_use_population}}</td>
                     <td>{{$ownership_structure_population}}</td>
                     <td>{{$owners_on_system_population}}</td>
                     <td>{{$confirmed_existence_population}}</td>
                     <td>{{$record_of_directors_population}}</td>
                     <td>{{$directors_on_system_population}}</td>
                     <td>{{$signers_population}}</td>
                     <td>{{$anticipated_acct_activities_population}}</td>
                   </tr>
                   <tr>
                     <th>Rating 1</th>
                     <td>{{$address_review_rating1}}</td>
                     <td>{{$naics_review_rating1}}</td>
                     <td>{{$charity_review_rating1}}</td>
                     <td>{{$third_party_review_rating1}}</td>
                     <td>{{$intended_use_review_rating1}}</td>
                      <td>{{$ownership_structure_review_rating1}}</td>
                     <td>{{$owners_on_system_review_rating1}}</td>
                     <td>{{$confirmed_existence_review_rating1}}</td>
                     <td>{{$record_of_directors_review_rating1}}</td>
                     <td>{{$directors_on_system_review_rating1}}</td>
                     <td>{{$signers_review_rating1}}</td>
                     <td>{{$anticipated_acct_activities_review_rating1}}</td>
                   </tr>
                   <tr>
                     <th>Rating 2</th>
                     <td>{{$address_review_rating2}}</td>
                     <td>{{$naics_review_rating2}}</td>
                     <td>{{$charity_review_rating2}}</td>
                     <td>{{$third_party_review_rating2}}</td>
                     <td>{{$intended_use_review_rating2}}</td>
                     <td>{{$ownership_structure_review_rating2}}</td>
                     <td>{{$owners_on_system_review_rating2}}</td>
                     <td>{{$confirmed_existence_review_rating2}}</td>
                     <td>{{$record_of_directors_review_rating2}}</td>
                     <td>{{$directors_on_system_review_rating2}}</td>
                     <td>{{$signers_review_rating2}}</td>
                     <td>{{$anticipated_acct_activities_review_rating2}}</td>
                   </tr>
                   <tr>
                     <th>Rating 3</th>
                     <td>{{$address_review_rating3}}</td>
                     <td>{{$naics_review_rating3}}</td>
                     <td>{{$charity_review_rating3}}</td>
                     <td>{{$third_party_review_rating3}}</td>
                     <td>{{$intended_use_review_rating3}}</td>
                     <td>{{$ownership_structure_review_rating3}}</td>
                     <td>{{$owners_on_system_review_rating3}}</td>
                     <td>{{$confirmed_existence_review_rating3}}</td>
                     <td>{{$record_of_directors_review_rating3}}</td>
                     <td>{{$directors_on_system_review_rating3}}</td>
                     <td>{{$signers_review_rating3}}</td>
                     <td>{{$anticipated_acct_activities_review_rating3}}</td>
                   </tr>
                   <tr>
                     <th>Efficiency 1</th>
                      <td>{{$address_eff}}%</td>
                     <td>{{$naics_eff}}%</td>
                     <td>{{$charity_eff}}%</td>
                     <td>{{$third_party_eff}}%</td>
                     <td>{{$intended_use_eff}}%</td>
                     <td>{{$ownership_structure_eff}}%</td>
                     <td>{{$confirmed_existence_eff}}%</td>
                     <td>{{$record_of_directors_eff}}%</td>
                     <td>{{$directors_on_system_eff}}%</td>
                     <td>{{$signers_eff}}%</td>
                     <td>{{$anticipated_acct_activities_eff}}%</td>
                   </tr> 
                     <th>Weighted Deficiency</th>
                     <td>{{$address_def}}%</td>
                     <td>{{$naics_def}}%</td>
                     <td>{{$charity_def}}%</td>
                     <td>{{$third_party_def}}%</td>
                     <td>{{$intended_use_def}}%</td>
                     <td>{{$ownership_structure_def}}%</td>
                     <td>{{$confirmed_existence_def}}%</td>
                     <td>{{$record_of_directors_def}}%</td>
                      <td>{{$directors_on_system_def}}%</td>
                     <td>{{$signers_def}}%</td>
                     <td>{{$anticipated_acct_activities_def}}%</td>
                   </tr>
                    </tbody>
              </table>
            </div>
          </div>
			</div>
		</section>
@endsection