@extends('layout-forms')

@section('content')
    @include('errors')
    {!! Form::open(array('files'=>'true','method'=>'put','url' => '/entries/'.$entry->id)) !!}
    {!! Form::hidden('published',$entry->published) !!}
    @if ($isCoordinator)
        @include('entry.formadmin')
    @endif
    @include('entry.formunpub')
    @include('entry.financial')
    @include('entry.formclose')
@stop