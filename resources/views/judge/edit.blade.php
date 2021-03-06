@extends('layout-nonav')

@section('content')

    @include('errors')
    {!! Form::open(array('url' => 'judges/'.$judge->id,'method'=>'put'))  !!}
    @include('judge.form')
    @if($isAdministrator)
        @include('judge.formAdmin')
    @endif
    @include('judge.formclose')
@stop
