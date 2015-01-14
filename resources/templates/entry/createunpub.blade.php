@extends('layout-forms')

@section('content')
    @include('errors')
    {!! Form::open(array('files'=>'true')) !!}
    {!! Form::hidden('published',false) !!}
    @include('entry.formunpub')
    @include('entry.financial')
    @include('entry.readrules')
    <!-- Upload File Form Input -->
    <div class="panel callout radius form-group">
        <p>Your entry file must be in the rtf format and you must remove all of your personal information (author name) before submitting</p>
        {!! Form::label('filename', 'Upload File:') !!}
        {!! Form::file('filename', ['class' => 'form-control']) !!}
    </div>
    @include('entry.formclose')
@stop