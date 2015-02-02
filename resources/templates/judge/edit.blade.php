@extends('layout-nonav')

@section('contents')

    @include('errors')
    {!! Form::open()  !!}
    {!! Form::hidden('user_id',$judge->user_id) !!}
    @include('judge.form')
    @include('judge.formclose')
    Judging this year

    I will judge:

@stop