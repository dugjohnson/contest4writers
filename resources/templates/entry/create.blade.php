@extends('layout')

@section('content')
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
    
    

@stop