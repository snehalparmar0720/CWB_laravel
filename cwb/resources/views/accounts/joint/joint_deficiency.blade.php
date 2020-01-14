@extends('layouts.app')
@section('content')
	<div class="row">
    <div class="col-sm-offset-1 col-sm-5">
              {{ link_to_route('joint.index', 'Back', null, array('class' => 'btn btn-danger cancel')) }}
    </div>
		<section class="content">
  @include('messages')
			<div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-body">
              <div class="pull-left"><h3>Joint Deficiency</h3>
              </div>
            <div class="table-container">
              <table id="mytable" class="table table-bordred table-striped">
                   <thead>
                       <th></th>
                        <td>Address Review</td>
                        <td>Identification Review</td>
                        <td>NOC Review</td>
                        <td>Occupation Review</td>
                        <td>DOB Review</td>
                        <td>Incorrect Signing Authority</td>
                        <td>Role Review</td>
                        <td>Employer's name</td>
                        <td>Employer's address</td>
                        <td>PEFP Review</td>
                        <td>PEP Review</td>
                   </thead>
                    <tbody>
                       <?php
                     $address_population = $address_review_rating1+$address_review_rating2+$address_review_rating3;
                     $id_population = $id_review_rating1+$id_review_rating2+$id_review_rating3;
                     $noc_population = $noc_review_rating1+$noc_review_rating2+$noc_review_rating3;
                     $occupation_population = $occupation_review_rating1+$occupation_review_rating2+$occupation_review_rating3;
                     $dob_population = $dob_review_rating1+$dob_review_rating2+$dob_review_rating3;
                     $incorrect_signing_authority_population = $incorrect_signing_authority_review_rating1+$incorrect_signing_authority_review_rating2+$incorrect_signing_authority_review_rating3;
                     $role_population = $role_review_rating1+$role_review_rating2+$role_review_rating3;
                     $pefp_population = $pefp_review_rating1+$pefp_review_rating2+$pefp_review_rating3;
                     $pep_population = $pep_review_rating1+$pep_review_rating2+$pep_review_rating3;

                     $address_eff = $address_population == 0 ? 0 : ($address_review_rating1/$address_population)*100;
                      $id_eff = $id_population == 0 ? 0 : ($id_review_rating1/$id_population)*100;
                      $noc_eff = $noc_population == 0 ? 0 : ($noc_review_rating1/$noc_population)*100;
                      $occupation_eff = $occupation_population == 0 ? 0 : ($occupation_review_rating1/$occupation_population)*100;
                      $dob_eff = $dob_population == 0 ? 0 : ($dob_review_rating1/$dob_population)*100;
                      $incorrect_signing_authority_eff = $incorrect_signing_authority_population == 0 ? 0 : ($incorrect_signing_authority_review_rating1/$incorrect_signing_authority_population)*100;
                      $role_eff = $role_population == 0 ? 0 : ($role_review_rating1/$role_population)*100;
                      $pefp_eff = $pefp_population == 0 ? 0 : ($pefp_review_rating1/$pefp_population)*100;
                      $pep_eff = $pep_population == 0 ? 0 : ($pep_review_rating1/$pep_population)*100;


                      $address_def = $address_population == 0 ? 0 : ((($address_review_rating2 * 0.5) + ($address_review_rating3))/$address_population)*100;
                      $id_def = $id_population == 0 ? 0 : ((($id_review_rating2 * 0.5) + ($id_review_rating3))/$id_population)*100;
                      $noc_def = $noc_population == 0 ? 0 : ((($noc_review_rating2 * 0.5) + ($noc_review_rating3))/$noc_population)*100;
                      $occupation_def = $occupation_population == 0 ? 0 : ((($occupation_review_rating2 * 0.5) + ($occupation_review_rating3))/$occupation_population)*100;
                      $dob_def = $dob_population == 0 ? 0 : ((($dob_review_rating2 * 0.5) + ($dob_review_rating3))/$dob_population)*100;
                      $incorrect_signing_authority_def = $incorrect_signing_authority_population == 0 ? 0 : ((($incorrect_signing_authority_review_rating2 * 0.5) + ($incorrect_signing_authority_review_rating3))/$incorrect_signing_authority_population)*100;
                      $role_def = $role_population == 0 ? 0 : ((($role_review_rating2 * 0.5) + ($role_review_rating3))/$role_population)*100;
                      $pefp_def = $pefp_population == 0 ? 0 : ((($pefp_review_rating2 * 0.5) + ($pefp_review_rating3))/$pefp_population)*100;
                      $pep_def = $pep_population == 0 ? 0 : ((($pep_review_rating2 * 0.5) + ($pep_review_rating3))/$pep_population)*100;

                    ?>
                   <tr>
                     <th>Populations</th>
                     <td>{{$address_population}}</td>
                     <td>{{$id_population}}</td>
                     <td>{{$noc_population}}</td>
                     <td>{{$occupation_population}}</td>
                     <td>{{$dob_population}}</td>
                     <td>{{$incorrect_signing_authority_population}}</td>
                     <td>{{$role_population}}</td>
                     <td>0</td>
                     <td>0</td>
                     <td>{{$pefp_population}}</td>
                     <td>{{$pep_population}}</td>
                   </tr>
                   <tr>
                     <th>Rating 1</th>
                     <td>{{$address_review_rating1}}</td>
                     <td>{{$id_review_rating1}}</td>
                     <td>{{$noc_review_rating1}}</td>
                     <td>{{$occupation_review_rating1}}</td>
                     <td>{{$role_review_rating1}}</td>
                     <td>{{$incorrect_signing_authority_review_rating1}}</td>
                     <td>{{$role_review_rating1}}</td>
                     <td>0</td>
                     <td>0</td>
                     <td>{{$pefp_review_rating1}}</td>
                     <td>{{$pep_review_rating1}}</td>
                   </tr>
                   <tr>
                     <th>Rating 2</th>
                     <td>{{$address_review_rating2}}</td>
                     <td>{{$id_review_rating2}}</td>
                     <td>{{$noc_review_rating2}}</td>
                     <td>{{$occupation_review_rating2}}</td>
                     <td>{{$dob_review_rating2}}</td>
                     <td>{{$incorrect_signing_authority_review_rating2}}</td>
                     <td>{{$role_review_rating2}}</td>
                     <td>0</td>
                     <td>0</td>
                     <td>{{$pefp_review_rating2}}</td>
                     <td>{{$pep_review_rating2}}</td>
                   </tr>
                   <tr>
                     <th>Rating 3</th>
                     <td>{{$address_review_rating3}}</td>
                     <td>{{$id_review_rating3}}</td>
                     <td>{{$noc_review_rating3}}</td>
                     <td>{{$occupation_review_rating3}}</td>
                     <td>{{$dob_review_rating3}}</td>
                     <td>{{$incorrect_signing_authority_review_rating3}}</td>
                     <td>{{$role_review_rating3}}</td>
                     <td>0</td>
                     <td>0</td>
                     <td>{{$pefp_review_rating3}}</td>
                     <td>{{$pep_review_rating3}}</td>
                   </tr>
                    <tr>
                     <th>Efficiency 1</th>
                      <td>{{$address_eff}}%</td>
                     <td>{{$id_eff}}%</td>
                     <td>{{$noc_eff}}%</td>
                     <td>{{$occupation_eff}}%</td>
                     <td>{{$dob_eff}}%</td>
                     <td>{{$incorrect_signing_authority_eff}}%</td>
                     <td>{{$role_eff}}%</td>
                     <td>0.00%</td>
                     <td>0.00%</td>
                     <td>{{$pefp_eff}}%</td>
                     <td>{{$pep_eff}}%</td>
                   </tr>
                   <tr> 
                     <th>Weighted Deficiency</th>
                      <td>{{$address_def}}%</td>
                      <td>{{$id_def}}%</td>
                      <td>{{$noc_def}}%</td>
                      <td>{{$occupation_def}}%</td>
                      <td>{{$dob_def}}%</td>
                      <td>{{$incorrect_signing_authority_def}}%</td>
                      <td>{{$role_def}}%</td>
                      <td>0.00%</td>
                      <td>0.00%</td>
                      <td>{{$pefp_def}}%</td>
                      <td>{{$pep_def}}%</td>
                   </tr>
                    </tbody>
              </table>
            </div>
          </div>
			</div>
		</section>
@endsection