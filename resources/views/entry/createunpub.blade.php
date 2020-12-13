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
    @include('entry.readrules')
    @include('entry.fileupload')
    @include('entry.formclose')
@stop
