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
        {!! Form::text('author',$entry->author, ['class' => 'form-control']) !!}
    </div>
    <!-- Title Form Input -->
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title',$entry->title, ['class' => 'form-control']) !!}
    </div>
    <!-- Category Form Input -->
    <div class="form-group">
        {!! Form::label('category', 'Category:') !!}
        {!! Form::select('category', $categories, $entry->category , ['class' => 'form-control']) !!}
    </div>
    <!-- Upload File Form Input -->
    <div class="form-group">
        {!! Form::label('filename', 'Upload File:') !!}
        {!! Form::file('filename', ['class' => 'form-control']) !!}
    </div>
    <!-- Invoice Number Form Input -->
    <div class="form-group">
        {!! Form::label('invoiceNumber', 'Invoice Number:') !!}
        {!! Form::text('invoiceNumber',$entry->invoiceNumber, ['class' => 'form-control']) !!}
    </div>
    @include('entry.bottom')
@stop