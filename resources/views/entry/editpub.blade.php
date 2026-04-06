@extends('layout-forms')

@section('content')
    @include('errors')
    <form method="POST" action="{{ url('/entries/' . $entry->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="published" value="{{ $entry->published }}">
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
