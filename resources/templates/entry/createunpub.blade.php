@extends('layout-nonav')

@section('content')
    @if ($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    @endif
    {!! Form::open(array('files'=>'true')) !!}
    {!! Form::hidden('published',false) !!}
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
    {!! Form::select('category', $categories, null , ['class' => 'form-control']) !!}
    </div>
    <!-- Upload File Form Input -->
    <div class="form-group">
    {!! Form::label('filename', 'Upload File:') !!}
    {!! Form::file('filename', ['class' => 'form-control']) !!}
    </div>
    <!-- Signed Form Input -->
    <div class="form-group">
        {!! Form::label('signed', 'Signed (type your name):') !!}
        {!! Form::text('signed',null, ['class' => 'form-control']) !!}
    </div>
    <!-- Invoice Number Form Input -->
    <div class="form-group">
    {!! Form::label('invoiceNumber', 'Invoice Number:') !!}
    {!! Form::text('invoiceNumber',null, ['class' => 'form-control']) !!}
    </div>
    {!! Form::submit('Submit!') !!}
    {!! Form::close() !!}

@stop