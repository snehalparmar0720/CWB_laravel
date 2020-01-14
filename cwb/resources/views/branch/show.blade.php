@extends('layouts.app')
@section('content')

<div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"> Region</h3>
                    </div>
                	<div class="panel-body">
                	{{ Form::model($regions, array('method' => 'PATCH', 'route' => array('region.update', $regions->id),'class'=>'form-horizontal','role'=>"form")) }}
                   
                       
                        <div class="form-group {{ $errors->first('region_name', 'has-error') }} "> 
                            {{ Form::label('region_name', 'Region Name:',array('class'=>'col-sm-4 control-label')) }} 
                            <div class="col-sm-3">
                            {{ Form::text('region_name',null, array('class' => 'form-control','readonly'=>'readonly')) }}
                            {{ $errors->first('region_name', '<span class="error">:message</span>') }} 
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('region_code', 'has-error') }} "> 
                            {{ Form::label('region_code', 'Region :',array('class'=>'col-sm-4 control-label')) }} 
                            <div class="col-sm-3">
                            {{ Form::text('region_code',null, array('class' => 'form-control','readonly'=>'readonly')) }}
                            {{ $errors->first('region_code', '<span class="error">:message</span>') }} 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-5">
                                {{ link_to_route('region.index', 'Cancel', null, array('class' => 'btn btn-danger cancel')) }}
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection