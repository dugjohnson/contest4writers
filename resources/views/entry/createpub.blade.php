@extends('layout-forms')

@section('content')
    @include('errors')
    <form method="POST" action="{{ url('entries') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="published" value="1">
    @include('entry.formpub')
    <!-- Category Form Input -->
    <flux:field>
        <flux:label>Category:</flux:label>
        <flux:select name="category">
            @foreach($categories as $val => $label)
                <flux:select.option value="{{ $val }}" :selected="$val == $entry->category">{{ $label }}</flux:select.option>
            @endforeach
        </flux:select>
    </flux:field>
    @include('entry.financial')
    @include('entry.readrules')
    @include('entry.fileuploadpub')
    @include('entry.formclose')

@stop
