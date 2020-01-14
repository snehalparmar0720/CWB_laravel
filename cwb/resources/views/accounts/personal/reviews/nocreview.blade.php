@extends('layouts.app')
@section('content')
	<div class="row">
     <div class="col-sm-offset-1 col-sm-5">
              {{ link_to_route('personal.index', 'Back', null, array('class' => 'btn btn-danger cancel')) }}
              <button type="button" class="btn btn-success" value="Show Div" onclick="showDiv()">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search
              </button>
    </div>
		<section class="content">
  @include('messages')
			<div class="col-md-11 col-md-offset-1">
         <div id="searchdiv" style="display:none;" class="answer_list" >  
              @include('accounts.personal.search.nocreviewsearch')<br>
        </div>
        <div class="panel panel-default">
          <div class="panel-body">
              <div class="pull-left"><h3>Personal Account - NOC Review</h3>
              </div>
            <div class="table-container">
              <table id="mytable" class="table table-bordred table-striped">
                    <tbody>
                      <?php $i = ($data->currentpage()-1)* $data->perpage() + 1;$j=0;?>
                          <?php {{ $head = "";$foot = 0;}} ?>
                      @if($data->count())  
                          @foreach($data as $d)
                          {{ Form::open(array('route' => 'nocreviewpersonal.store','class'=>'form-horizontal','role'=>"form")) }}  
                          {{ Form::hidden('personal_review_id[]', $d->personal_review_id, array('class' => 'form-control')) }}
                          {{ Form::hidden('account_type_id[]', $d->account_type_id, array('class' => 'form-control')) }}
                          {{ Form::hidden('cust_id[]', $d->cust_id, array('class' => 'form-control')) }}
                          {{ Form::hidden('noc_id[]', $d->noc_id, array('class' => 'form-control')) }}
                          @if ($head != $d->branch_name) 
                                @foreach($branch as $k => $br)
                                 @if($d->branch_id == $k)
                                 <?php {{$cnt = $br;}}?>
                                 @endif
                                @endforeach
                              <tr class="font_bold" style="background-color: #c6e7ee;">
                                  <td colspan="2"><label>Branch Name : </label> {{$d->branch_name}}</td>
                                  <td colspan="2"><label>Region Name : </label> {{$d->region_name}}</td>
                                  <td>{{$cnt}}</td>
                              </tr>
                          @endif
                          @if($cnt>0)
                            <tr>
                                <td rowspan="2">{{$i++}}</td>
                                <td><label>Customer Name :</label> {{$d->customer_name}}</td>
                                <td><label>CIF : </label> {{$d->cif}}</td>
                              </tr>
                              <tr>
                                <td colspan="4">
                                  <div class="col-sm-12">
                                  <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">NOC Review 
                                              @if($d->noc_review_track)
                                              <span class="label label-success">Completed</span>
                                              @else
                                              <span class="label label-danger">InComplete</span>
                                              @endif
                                            </h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>NOC Code :</strong>
                                                        {{ $d->noc_code}}
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <strong>NOC Description : </strong>
                                                        {{ $d->noc_desc}}
                                                </div>
                                            </div>
                                           
                                            <hr>
                                            <div class="form-group {{ $errors->first('noc_def_comm', 'has-error') }} "> 
                                                {{ Form::label('noc_def_comm', 'NOC DEFICIENCY COMMENTS',array('class'=>'col-sm-2 control-label')) }} 
                                                <div class="col-sm-4">
                                                {{ Form::textarea('noc_def_comm[]', $d->noc_def_comm, array('class' => 'form-control','rows'=>'3')) }}
                                                {{ $errors->first('noc_def_comm', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('noc_r', 'has-error') }} "> 
                                                {{ Form::label('noc_r', 'NOC Review',array('class'=>'col-sm-2 control-label')) }} 
                                                <div class="col-sm-2">
                                               {{ Form::select('noc_r[]', array('1' => '1','2' => '2','3' => '3','No' => 'No'),$d->noc_r, array('class' => 'form-control')) }}
                                                {{ $errors->first('noc_r', '<span class="error">:message</span>') }} 
                                                </div>
                                            </div>
                                               <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="submit" name="action" value="{{$j}}" class="btn btn-primary">Review</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                </td>
                            </tr>
                            <?php $j++;
                                  {{
                                      $foot++;
                                      $head = $d->branch_name;
                                      $cnt--;
                                  }}
                                  ?>
                                @endif
                           @endforeach 
                       @else
                           <tr>
                              <td colspan="7">No Records found !!</td>
                            </tr>
                        @endif
                    {{ Form::close() }}
                    </tbody>
        
              </table>
              {{ $data->links() }}
            </div>
          </div>
			</div>
<script>
  function showDiv() {
    var x = document.getElementById("searchdiv");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }
</script>
		</section>
@endsection