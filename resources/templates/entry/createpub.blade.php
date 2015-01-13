@extends('layout-nonav')

@section('content')
    @if ($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    @endif
    {!! Form::open(array('url' => 'entries/storepub','method' => 'POST'))  !!}
    {!! Form::hidden('published',true) !!}
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
        {!! Form::select('category', $categories , null , ['class' => 'form-control']) !!}
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
        {!! Form::label('publicationMonth', 'Publication or Release Month (see rules):') !!}
        {!! Form::select('publicationMonth',$monthlist,null, ['class' => 'form-control']) !!}
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