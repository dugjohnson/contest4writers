@extends('layout-forms')

@section('content')
    @include('errors')
    {!! Form::open(array('files'=>'true')) !!}
    {!! Form::hidden('published',false) !!}
    @include('entry.formunpub')
    @include('entry.financial')
    <a class="small button radius" href="http://www.rwa.org/unpublisheddaphne" target="_blank">Click to go to myRWA www.rwa.org/unpublisheddaphne</a>

    @include('entry.readrules')
    <!-- Upload File Form Input -->
    <div class="panel callout radius form-group">
        <p>Your entry file must be in the rtf format and you must remove all of your personal information (author name) before submitting</p>
        {!! Form::label('filename', 'Upload File:') !!}
        {!! Form::file('filename', ['class' => 'form-control']) !!}
    </div>
    @include('entry.formclose')
@stop