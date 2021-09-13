<!--Name-->
<div class="form-group">
    {!! Form::label('name','Name',['class'=>'control-label']) !!}

    {!! Form::text('name',null,['class'=>'form-control']) !!}

    @error('name')
    {{$message}}
    @enderror
</div>

<div class="form-group">
    {!! Form::label('email','Email',['class'=>'control-label']) !!}

    {!! Form::text('email',null,['class'=>'form-control']) !!}
    @error('email')
    {{$message}}
    @enderror
</div>

<div class="form-group">
    {!! Form::label('password','Password',['class'=>'control-label']) !!}

    {!! Form::password('password',['class'=>'form-control']) !!}
    @error('password')
    {{$message}}
    @enderror
</div>

<div class="form-group">
    {!! Form::label('cpassword','Confirm Password',['class'=>'control-label']) !!}

    {!! Form::password('cpassword',['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('profile_name','Profile Picture',['class'=>'control-label']) !!}

    {!! Form::file('profile_name',['class'=>'form-control']) !!}
</div>







<div class="form-group">
    {!! Form::label('status','Status',['class'=>'control-label']) !!}
    {!! Form::radio('status',1) !!}Active
    {!! Form::radio('status',0,true) !!}Inactive
</div>
