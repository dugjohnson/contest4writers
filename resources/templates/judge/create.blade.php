@extends('layout-nonav')

@section('content')

    @include('errors')
    {!! Form::open(array('url' => 'judges'))  !!}

    @include('judge.form')
    @include('judge.formclose')
@stop