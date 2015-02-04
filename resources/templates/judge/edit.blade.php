@extends('layout-nonav')

@section('content')

    @include('errors')
    {!! Form::open(array('url' => 'judges/'.$judge->id,'method'=>'put'))  !!}
    @include('judge.form')
    @include('judge.formclose')
@stop