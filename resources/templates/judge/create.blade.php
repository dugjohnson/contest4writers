@extends('layout-nonav')

@section('content')

    @include('errors')
    {!! Form::open()  !!}
    {!! Form::hidden('user_id',$judge->user_id) !!}

    @include('judge.form')
    @include('judge.formclose')
@stop