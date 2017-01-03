@extends('layout-forms')

@section('content')
    {!! Form::open(array('files'=>'true','method'=>'post','url' => '/entries/'.$entry->id.'/upload')) !!}
    {!! Form::hidden('isCoordinator',$isCoordinator) !!}
    @include('errors')
    @include('entry.fileupload')
    @include('entry.formclose')
    <hr>
    <strong>Uploading and replacing the file for the following entry</strong>
    @include('entry.infounpub')
@stop

