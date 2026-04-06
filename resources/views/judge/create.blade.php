@extends('layout-nonav')

@section('content')

    @include('errors')
    <form method="POST" action="{{ url('judges') }}">
        @csrf

    @include('judge.form')
    @include('judge.formclose')
@stop
