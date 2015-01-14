@extends('layout-forms')

@section('content')
    @include('errors')
    {!! Form::open(array('files'=>'true')) !!}
    {!! Form::hidden('published',false) !!}
    @include('entry.formunpub')
    @include('entry.financial')
    @include('entry.readrules')
    <!-- Upload File Form Input -->
    <div class="form-group">
        {!! Form::label('filename', 'Upload File:') !!}
        {!! Form::file('filename', ['class' => 'form-control']) !!}
    </div>
    @include('entry.formclose')
@stop