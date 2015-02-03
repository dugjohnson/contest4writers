@extends('layout-nonav')

@section('contents')

    @include('errors')
    {!! Form::open()  !!}
    @include('judge.form')
    @include('judge.formclose')
    Judging this year

    I will judge:

@stop