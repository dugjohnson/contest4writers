@extends('layout-nonav')
@section('content')
    @include('admin.coordinator')
    @if ($isAdmin)
        @include(('admin.administrator'))
    @endif
@stop
