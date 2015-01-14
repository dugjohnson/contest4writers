@extends('layout-forms')

@section('content')
    @include('errors')
    {!! Form::open()  !!}
    {!! Form::hidden('published',true) !!}
    @include('entry.formpub')
    @include('entry.financial')
    @include('entry.readrules')
    @include('entry.formclose')

@stop