@extends('layout-forms')

@section('content')
    @include('errors')
    {!! Form::open()  !!}
    {!! Form::hidden('published',true) !!}
    @include('entry.formpub')
    @include('entry.financial')
    <a class="small button radius" href="http://www.rwa.org/publisheddaphne" target="_blank">Click to go to myRWA www.rwa.org/publisheddaphne</a>

    @include('entry.readrules')
    @include('entry.formclose')

@stop