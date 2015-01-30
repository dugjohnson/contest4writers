@extends('layout-forms')

@section('content')
    @include('errors')
    {!! Form::open(array('files'=>'true')) !!}
    {!! Form::hidden('published',false) !!}
    @include('entry.formunpub')
    @include('entry.financial')
    <a class="small button radius" href="http://www.rwa.org/unpublisheddaphne" target="_blank">Click to go to myRWA www.rwa.org/unpublisheddaphne</a>

    @include('entry.readrules')
    @include('entry.fileupload')
    @include('entry.formclose')
@stop