@extends('layout-nonav')

@section('content')
    @if ($assign)
    @include('admin.scoresheets.list')
    @else
        @include('admin.scoresheets.access')
        @endif

    <a href="/coordinators" class="button radius">Return</a>
@stop