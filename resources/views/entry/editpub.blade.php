@extends('layout-forms')

@section('content')
    @include('errors')
    {!! Form::open( array('method'=>'put','url' => '/entries/'.$entry->id) )  !!}
    {!! Form::hidden('published',$entry->published) !!}
    @if ($isCoordinator)
        @include('entry.formadmin')
    @endif
    <p>Category: {{$entry->category}}</p>
    <p>If you need to change categories contact a coordinator. Please do not create a new entry.</p>
    @include('entry.formpub')
    @include('entry.financial')
    @include('entry.readrules')
    @include('entry.formclose')
@stop