@extends('layout')

@section('content')
    <div class="loginForm-wrap">
        {!! Form::open() !!}
        @if ($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        @endif
        <div class="row">
        <div class="form-group">
            <input class="form-control" type="hidden" name="token" value="{{ $token }}"/>
        </div>
        </div>
        <div class="row">
            <div class="form-group">
                {!! Form::label('email','Email:') !!}
                {!! Form::email('email',null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                {!! Form::label('password','Password:') !!}
                {!! Form::password('password',null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                {!! Form::label('password_confirmation','Password Confirmation:') !!}
                {!! Form::password('password_confirmation',null,['class'=>'form-control']) !!}
            </div>
        </div>
        {!! Form::submit('reset', ['class' => 'form-control']) !!}
        {!! Form::close() !!}
    </div>
@stop