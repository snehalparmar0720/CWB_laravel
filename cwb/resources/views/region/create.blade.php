@extends('layouts.app')
@section('content')
	<div class="row">
		<section class="content">
			<div class="col-md-8 col-md-offset-2">
				  @if (count($errors) > 0)
			        <div class="alert alert-danger">
			            <strong>Whoops!</strong> There were some problems with your input.<br><br>
			            <ul>
			                @foreach ($errors->all() as $error)
			                    <li>{{ $error }}</li>
			                @endforeach
			            </ul>
			        </div>
			    @endif
			    @if(Session::has('success'))
				    <div class="alert alert-info">
				      {{Session::get('success')}}
				    </div>
				@endif
				<div class="panel panel-default">
					<div class="panel-heading">
				    		<h3 class="panel-title">Add a New Region</h3>
				 	</div>
					<div class="panel-body">
					 {{ Form::open(array('route' => 'region.store','class'=>'form-horizontal','role'=>"form")) }}
				        <div class="form-group {{ $errors->first('region_name', 'has-error') }} "> 
				            {{ Form::label('region_name', 'Region Name:',array('class'=>'col-sm-4 control-label')) }} 
				            <div class="col-sm-3">
				            {{ Form::text('region_name', Input::old('region_name'), array('class' => 'form-control')) }}
				            {{ $errors->first('region_name', '<span class="error">:message</span>') }} 
				            </div>
				        </div>
				        <div class="form-group {{ $errors->first('region_code', 'has-error') }} "> 
				            {{ Form::label('region_code', 'Region Code:',array('class'=>'col-sm-4 control-label')) }} 
				            <div class="col-sm-3">
				            {{ Form::text('region_code', Input::old('region_code'), array('class' => 'form-control')) }}
				            {{ $errors->first('region_code', '<span class="error">:message</span>') }} 
				            </div>
				        </div>
						
			    		 <div class="form-group">
				            <div class="col-sm-offset-4 col-sm-5">
				                {{ Form::submit('Submit', array('class' => 'btn btn-success submit')) }}
				                {{ link_to_route('region.index', 'Cancel',null,array('class' => 'btn btn-danger cancel')) }}
				            </div>
				        </div>
        			{{ Form::close() }}
    				</div>
				</div>
			</div>
		</section>
	</div>
@endsection