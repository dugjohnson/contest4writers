@extends('layout-nonav')
@section('content')
    @include('admin.coordinator')
    @if ($isAdministrator)
        @include(('admin.administrator'))
    @endif
    @include('reports.categorytotals')
@stop
