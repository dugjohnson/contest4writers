@extends('layout-forms')

@section('content')
    @include('errors')
    {!! Form::open( array('method'=>'put','url' => '/entries/'.$entry->id) )  !!}
    {!! Form::hidden('published',$entry->published) !!}
    @include('entry.formpub')
    @include('entry.financial')
    @include('entry.formclose')
@stop