@extends('layout-forms')

@section('content')
    {!! Form::open(array('files'=>'true','method'=>'post','url' => '/entries/'.$entry->id.'/upload')) !!}
    {!! Form::hidden('isCoordinator',$isCoordinator) !!}
    @include('errors')
    @if($entry->published)
        @include('entry.fileuploadpub')
    @else
        @include('entry.fileuploadunpub')
    @endif
    @include('entry.formclose')
    <hr>
    <strong>Uploading and replacing the file for the following entry</strong>
    @include('entry.infounpub')
@stop

