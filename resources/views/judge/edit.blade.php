@extends('layout-nonav')

@section('content')

    @include('errors')
    <form action="{{ url('judges/' . $judge->id) }}" method="POST">
        @csrf
        @method('PUT')
    @include('judge.form')
    @if($isAdministrator)
        @include('judge.formAdmin')
    @endif
    @include('judge.formclose')
@stop
