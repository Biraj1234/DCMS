<!--Name-->
<div class="form-group">
    {!! Form::label('name','Name',['class'=>'control-label']) !!}

    {!! Form::text('name',null,['class'=>'form-control']) !!}

</div>

<div class="form-group">
    {!! Form::label('short_form','Short Form',['class'=>'control-label']) !!}

    {!! Form::text('short_form',null,['class'=>'form-control']) !!}
</div>


@error('name')
<p class="text text-danger">{{$message}}</p>
@enderror


<div class="form-group">
    {!! Form::label('status','Status',['class'=>'control-label']) !!}
    {!! Form::radio('status',1) !!}Active
    {!! Form::radio('status',0,true) !!}Inactive
</div>
