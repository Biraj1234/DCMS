<!--Name-->
<div class="form-group">
    {!! Form::label('name','Title',['class'=>'control-label']) !!}

    {!! Form::text('name',null,['class'=>'form-control']) !!}

    @error('name')
    <p class="text text-danger">{{$message}}</p>
    @enderror


</div>

<!--Rental Amount-->
<div class="form-group">
    {!! Form::label('rental_amount','Rental Amount',['class'=>'control-label']) !!}

    {!! Form::number('rental_amount',null,['class'=>'form-control']) !!}

    @error('rental_amount')
    <p class="text text-danger">{{$message}}</p>
    @enderror
</div>

<!--Size-->
<div class="form-group">
    {!! Form::label('size_id','Size',['class'=>'control-label']) !!}

    {!! Form::select('size_id',$data['costume_size'],null,['class'=>'form-control','placeholder'=>'Select size']) !!}

    @error('size_id')
    <p class="text text-danger">{{$message}}</p>
    @enderror
</div>

<!--Costume Type-->
<div class="form-group">
    {!! Form::label('costume_type_id','Costume Type',['class'=>'control-label']) !!}

    {!! Form::select('costume_type_id',$data['type'],null,['class'=>'form-control','placeholder'=>'Select costume type']) !!}


    @error('costume_type_id')
    <p class="text text-danger">{{$message}}</p>
    @enderror
</div>

<!--Photo-->
<div class="form-group">
    {!! Form::label('costume_photo','Photo',['class'=>'control-label']) !!}

    {!! Form::file('costume_photo',['class'=>'form-control']) !!}

    @error('costume_photo')
    <p class="text text-danger">{{$message}}</p>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('gender','For',['class'=>'control-label']) !!}
    {!! Form::radio('gender',1) !!}Boy
    {!! Form::radio('gender',0,true) !!}Girl
</div>

<div class="form-group">
    {!! Form::label('feature_costume','Featured',['class'=>'control-label']) !!}
    {!! Form::radio('feature_costume',1) !!}Active
    {!! Form::radio('feature_costume',0,true) !!}Inactive
</div>

<div class="form-group">
    {!! Form::label('slider_costume','Slider',['class'=>'control-label']) !!}
    {!! Form::radio('slider_costume',1) !!}Active
    {!! Form::radio('slider_costume',0,true) !!}Inactive
</div>
<div class="form-group">
    {!! Form::label('top_costume','Top',['class'=>'control-label']) !!}
    {!! Form::radio('top_costume',1) !!}Active
    {!! Form::radio('top_costume',0,true) !!}Inactive
</div>


<div class="form-group">
    {!! Form::label('status','Status',['class'=>'control-label']) !!}
    {!! Form::radio('status',1) !!}Active
    {!! Form::radio('status',0,true) !!}Inactive
</div>
