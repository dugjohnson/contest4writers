@extends('layout')

@section('content')
    <p>This action will create score sheets for each entry, 4 for published, 5 for unpublished</p>
    <p>If you do not want to do that, click at the top of the page to go back</p>
    {!! Form::open(array('url' => 'scoresheets/batch','method'=>'post'))  !!}
    {!! Form::submit('Create Batch', ['class' => 'form-control']) !!}
    {!! Form::close() !!}
@stop
