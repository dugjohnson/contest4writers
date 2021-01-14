@extends('layout-forms')

@section('content')
    @include('errors')
    {!! Form::open(array('files'=>'true')) !!}
    {!! Form::hidden('published',true) !!}
    @include('entry.formpub')
    <!-- Category Form Input -->
    <div class="form-group">
        {!! Form::label('category', 'Category:') !!}
        {!! Form::select('category', $categories, $entry->category , ['class' => 'form-control']) !!}
    </div>
    @include('entry.financial')
    @include('entry.readrules')
    @include('entry.fileuploadpub')
    @include('entry.formclose')

@stop
