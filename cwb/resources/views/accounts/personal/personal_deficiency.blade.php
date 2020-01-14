@extends('layouts.app')
@section('content')
	<div class="row">
    <div class="col-sm-offset-1 col-sm-5">
              {{ link_to_route('personal.index', 'Back', null, array('class' => 'btn btn-danger cancel')) }}
    </div>
		<section class="content">
  @include('messages')
			<div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-body">
              <div class="pull-left"><h3>Personal Deficiency</h3>
              </div>
            <div class="table-container">
              <table id="mytable" class="table table-bordred table-striped">
                   <thead>
                       <th></th>
                        <td>Address Review</td>
                        <td>Identification Review</td>
                        <td>NOC Review</td>
                        <td>Occupation Review</td>
                        <td>PEFP Review</td>
                        <td>PEP Review</td>
                        <td>Third Party Review</td>
                        <td>Intended Use Review</td>
                        <td>Employer's name</td>
                        <td>Employer's address</td>
                   </thead>
                    <tbody>
                   <tr>
                    <?php
                     $address_population = $address_review_rating1+$address_review_rating2+$address_review_rating3;
                     $id_population = $id_review_rating1+$id_review_rating2+$id_review_rating3;
                     $noc_population = $noc_review_rating1+$noc_review_rating2+$noc_review_rating3;
                     $occupation_population = $occupation_review_rating1+$occupation_review_rating2+$occupation_review_rating3;
                     $pefp_population = $pefp_review_rating1+$pefp_review_rating2+$pefp_review_rating3;
                     $pep_population = $pep_review_rating1+$pep_review_rating2+$pep_review_rating3;
                     $third_party_population = $third_party_review_rating1+$third_party_review_rating2+$third_party_review_rating3;
                     $intended_use_population = $intended_use_review_rating1+$intended_use_review_rating2+$intended_use_review_rating3;
                      
                      $address_eff = $address_population == 0 ? 0 : ($address_review_rating1/$address_population)*100;
                      $id_eff = $id_population == 0 ? 0 : ($id_review_rating1/$id_population)*100;
                      $noc_eff = $noc_population == 0 ? 0 : ($noc_review_rating1/$noc_population)*100;
                      $occupation_eff = $occupation_population == 0 ? 0 : ($occupation_review_rating1/$occupation_population)*100;
                      $pefp_eff = $pefp_population == 0 ? 0 : ($pefp_review_rating1/$pefp_population)*100;
                      $pep_eff = $pep_population == 0 ? 0 : ($pep_review_rating1/$pep_population)*100;
                      $third_party_eff = $third_party_population == 0 ? 0 : ($third_party_review_rating1/$third_party_population)*100;
                      $intended_use_eff = $intended_use_population == 0 ? 0 : ($intended_use_review_rating1/$intended_use_population)*100;


                      $address_def = $address_population == 0 ? 0 : ((($address_review_rating2 * 0.5) + ($address_review_rating3))/$address_population)*100;
                      $id_def = $id_population == 0 ? 0 : ((($id_review_rating2 * 0.5) + ($id_review_rating3))/$id_population)*100;
                      $noc_def = $noc_population == 0 ? 0 : ((($noc_review_rating2 * 0.5) + ($noc_review_rating3))/$noc_population)*100;
                      $occupation_def = $occupation_population == 0 ? 0 : ((($occupation_review_rating2 * 0.5) + ($occupation_review_rating3))/$occupation_population)*100;
                      $pefp_def = $pefp_population == 0 ? 0 : ((($pefp_review_rating2 * 0.5) + ($pefp_review_rating3))/$pefp_population)*100;
                      $pep_def = $pep_population == 0 ? 0 : ((($pep_review_rating2 * 0.5) + ($pep_review_rating3))/$pep_population)*100;
                      $third_party_def = $third_party_population == 0 ? 0 : ((($third_party_review_rating2 * 0.5) + ($third_party_review_rating3))/$third_party_population)*100;
                      $intended_use_def = $intended_use_population == 0 ? 0 : ((($intended_use_review_rating2 * 0.5) + ($intended_use_review_rating3))/$intended_use_population)*100;
                    ?>
                     <th>Populations</th>
                     <td>{{$address_population}}</td>
                     <td>{{$id_population}}</td>
                     <td>{{$noc_population}}</td>
                     <td>{{$occupation_population}}</td>
                     <td>{{$pefp_population}}</td>
                     <td>{{$pep_population}}</td>
                     <td>{{$third_party_population}}</td>
                     <td>{{$intended_use_population}}</td>
                     <td>0</td>
                     <td>0</td>
                   </tr>
                   <tr>
                     <th>Rating 1</th>
                     <td>{{$address_review_rating1}}</td>
                     <td>{{$id_review_rating1}}</td>
                     <td>{{$noc_review_rating1}}</td>
                     <td>{{$occupation_review_rating1}}</td>
                     <td>{{$pefp_review_rating1}}</td>
                     <td>{{$pep_review_rating1}}</td>
                     <td>{{$third_party_review_rating1}}</td>
                     <td>{{$intended_use_review_rating1}}</td>
                     <td>0</td>
                     <td>0</td>
                   </tr>
                   <tr>
                     <th>Rating 2</th>
                     <td>{{$address_review_rating2}}</td>
                     <td>{{$id_review_rating2}}</td>
                     <td>{{$noc_review_rating2}}</td>
                     <td>{{$occupation_review_rating2}}</td>
                     <td>{{$pefp_review_rating2}}</td>
                     <td>{{$pep_review_rating2}}</td>
                     <td>{{$third_party_review_rating2}}</td>
                     <td>{{$intended_use_review_rating2}}</td>
                     <td>0</td>
                     <td>0</td>
                   </tr>
                   <tr>
                     <th>Rating 3</th>
                     <td>{{$address_review_rating3}}</td>
                     <td>{{$id_review_rating3}}</td>
                     <td>{{$noc_review_rating3}}</td>
                     <td>{{$occupation_review_rating3}}</td>
                     <td>{{$pefp_review_rating3}}</td>
                     <td>{{$pep_review_rating3}}</td>
                     <td>{{$third_party_review_rating3}}</td>
                     <td>{{$intended_use_review_rating3}}</td>
                     <td>0</td>
                     <td>0</td>
                   </tr>
                    <tr>
                     <th>Efficiency 1</th>
                      <td>{{$address_eff}}%</td>
                     <td>{{$id_eff}}%</td>
                     <td>{{$noc_eff}}%</td>
                     <td>{{$occupation_eff}}%</td>
                     <td>{{$pefp_eff}}%</td>
                     <td>{{$pep_eff}}%</td>
                     <td>{{$third_party_eff}}%</td>
                     <td>{{$intended_use_eff}}%</td>
                     <td>0.00%</td>
                     <td>0.00%</td>
                   </tr>
                   <tr> 
                     <th>Weighted Deficiency</th>
                      <td>{{$address_def}}%</td>
                      <td>{{$id_def}}%</td>
                      <td>{{$noc_def}}%</td>
                      <td>{{$occupation_def}}%</td>
                      <td>{{$pefp_def}}%</td>
                      <td>{{$pep_def}}%</td>
                      <td>{{$third_party_def}}%</td>
                      <td>{{$intended_use_def}}%</td>
                      <td>0.00%</td>
                      <td>0.00%</td>
                   </tr>
                    </tbody>
              </table>
            </div>
          </div>
			</div>
		</section>
@endsection