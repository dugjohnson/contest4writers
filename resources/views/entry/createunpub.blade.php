@extends('layout-forms')

@section('content')
    @include('errors')
    {!! Form::open(array('files'=>'true')) !!}
    {!! Form::hidden('published',false) !!}
    
    @include('entry.formunpub')
    <!-- Category Form Input -->
    <div class="form-group">
        {!! Form::label('category', 'Category:') !!}
        {!! Form::select('category', $categories , $entry->category , ['class' => 'form-control']) !!}
    </div>
    @include('entry.financial')
    <a class="small button radius" href="http://www.rwa.org/unpublisheddaphne" target="_blank">Click to go to myRWA www.rwa.org/unpublisheddaphne</a>

    @include('entry.readrules')
    @include('entry.fileupload')
    @include('entry.formclose')
@stop