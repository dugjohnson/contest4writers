@extends('layout-forms')

@section('content')
    {!! Form::open(array('files'=>'true','method'=>'post','url' => '/entries/final/'.$entry->id.'/upload')) !!}
    {!! Form::hidden('isCoordinator',$isCoordinator) !!}
    @include('errors')
    @include('entry.fileuploadpub')
    @include('entry.formclose')
    <hr>
    <strong>Uploading and/or replacing the finalist file for the following entry</strong>
    @include('entry.infounpub')
@stop

