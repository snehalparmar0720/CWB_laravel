{{ Form::open(array('route' => 'customer.index','method'=>'get','class'=>'form-filter')) }}
<fieldset>
    <legend>Searching</legend>    
    <ul class="search">
        <li>
            {{Form::label('filter[customer_name][value]', 'Customer Name',array('class'=>'control-label'))}}
            {{Form::text('filter[customer_name][value]',Input::get('filter')['customer_name']['value'],array('class'=>'form-control'))}}
            {{Form::hidden('filter[customer_name][type]','7')}}
        </li>
        <li>
            {{Form::label('filter[cif][value]', 'CIF',array('class'=>'control-label'))}}
            {{Form::text('filter[cif][value]',Input::get('filter')['cif']['value'],array('class'=>'form-control'))}}
            {{Form::hidden('filter[cif][type]','7')}}
        </li>
        <li>
            {{Form::label('filter[branch_name][value]', 'Branch name',array('class'=>'control-label'))}}
            {{Form::text('filter[branch_name][value]',Input::get('filter')['branch_name']['value'],array('class'=>'form-control'))}}
            {{Form::hidden('filter[branch_name][type]','7')}}
        </li>
        <li>
            {{Form::label('filter[region_name][value]', 'Region name',array('class'=>'control-label'))}}
            {{Form::text('filter[region_name][value]',Input::get('filter')['region_name']['value'],array('class'=>'form-control'))}}
            {{Form::hidden('filter[region_name][type]','7')}}
        </li>
        <li>
            {{Form::label('filter[from_date][value]', 'From Date',array('class'=>'control-label'))}}
            {{Form::text('filter[from_date][value]',Input::get('filter')['from_date']['value'],array('class'=>'form-control','id'=>'from_date'))}}
            {{Form::hidden('filter[from_date][type]','5')}}
        </li>
        <li>
            {{Form::label('filter[to_date][value]', 'To Date',array('class'=>'control-label'))}}
            {{Form::text('filter[to_date][value]',Input::get('filter')['to_date']['value'],array('class'=>'form-control','id'=>'to_date'))}}
            {{Form::hidden('filter[to_date][type]','6')}}
        </li>
        <li class="action">
            {{Form::submit('Search', array('class' => 'btn btn-info submit'))}}
            {{Html::link('customer', 'Cancel', array('class'=>'btn btn-default'))}}
        </li>
    </ul>
</fieldset>
{{Form::close()}}
