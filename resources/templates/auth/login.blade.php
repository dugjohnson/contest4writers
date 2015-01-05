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
    {!! Form::submit('Login', ['class' => 'form-control']) !!}
    {!! Form::close() !!}
    <a href="/password/email">Reset Password</a>

@stop
