@extends('layout-nonav')

@section('content')

    @include('errors')
    {!! Form::open()  !!}
    {!! Form::hidden('user_id',$judge->user_id) !!}
    @include('judge.form')
    {!! Form::close() !!}
@stop