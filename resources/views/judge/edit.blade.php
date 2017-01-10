@extends('layout-nonav')

@section('content')

    @include('errors')
    {!! Form::open(array('url' => 'judges/'.$judge->id,'method'=>'put'))  !!}
    @include('judge.form')
    @if($isAdmin)
        @include('judge.formAdmin')
    @endif
    @include('judge.formclose')
@stop