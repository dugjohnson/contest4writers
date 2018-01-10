@extends('layout-nonav')
@section('content')
    @include('admin.coordinator')
    @if ($isAdmin)
        @include(('admin.administrator'))
    @endif
    @include('reports.categorytotals')
@stop
