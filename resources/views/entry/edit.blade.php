@extends('layout')

@section('content')
    <!-- Published Form Input -->
    <div class="form-group">
        {!! Form::label('published', 'Published:') !!}
        {!! Form::checkbox('published',$published, ['class' => 'form-control']) !!}
    </div>
    <!-- Author Name Form Input -->
    <div class="form-group">
        {!! Form::label('author', 'Author Name:') !!}
        {!! Form::text('author',null, ['class' => 'form-control']) !!}
    </div>
    <!-- Title Form Input -->
    <div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title',null, ['class' => 'form-control']) !!}
    </div>
    <!-- Category Form Input -->
    <div class="form-group">
    {!! Form::label('category', 'Category:') !!}
    {!! Form::select('category', ['-' => 'Pick a Category', 'SH' => 'Short', 'HI' => 'Historical', 'IN' => 'Spiritual', 'MA' => 'Mainstream', 'PA' => 'Paranormal', 'LO' => 'Long',] , null , ['class' => 'form-control']) !!}

    </div>
    <!-- Signed Form Input -->
    <div class="form-group">
    {!! Form::label('signed', 'Signed:') !!}
    {!! Form::text('signed',null, ['class' => 'form-control']) !!}
    </div>
    <!-- Upload File Form Input -->
    <div class="form-group">
    {!! Form::label('filename', 'Upload File:') !!}
    {!! Form::file('filename', ['class' => 'form-control']) !!}
    </div>
    <!-- Publisher Form Input -->
    <div class="form-group">
    {!! Form::label('publisher', 'Publisher:') !!}
    {!! Form::text('publisher',null, ['class' => 'form-control']) !!}
    </div>
    <!-- Editor Form Input -->
    <div class="form-group">
    {!! Form::label('editor', 'Editor:') !!}
    {!! Form::text('editor',null, ['class' => 'form-control']) !!}
    </div>
    <!-- Publication Month Form Input -->
    <div class="form-group">
    {!! Form::label('publicationMonth', 'Publication Month:') !!}
    {!! Form::month('publicationMonth',null, ['class' => 'form-control']) !!}
    </div>
    <!-- Invoice Number Form Input -->
    <div class="form-group">
    {!! Form::label('invoiceNumber', 'Invoice Number:') !!}
    {!! Form::text('invoiceNumber',$invoiceNumber, ['class' => 'form-control']) !!}
    </div>

@stop
