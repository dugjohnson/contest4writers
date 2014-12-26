@extends('layout')
@section('content')
    {!! Form::open() !!}
    @if ($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    @endif
    <div class="form-group">
        {!! Form::label('email','Email:') !!}
        {!! Form::email('email',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password','Password:') !!}
        {!! Form::password('password',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password_confirmation','Password Confirmation:') !!}
        {!! Form::email('password_confirmation',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email','Email:') !!}
        {!! Form::email('email',null,['class'=>'form-control']) !!}
    </div>
    {!! Form::submit('Register', ['class' => 'form-control']) !!}
    {!! Form::close() !!}

@stop