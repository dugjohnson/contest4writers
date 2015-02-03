@extends('layout-nonav')

@section('content')

    @include('errors')
    {!! Form::open()  !!}

    @include('judge.form')
    @include('judge.formclose')
@stop