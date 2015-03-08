@extends('layout-nonav')

@section('content')
    @include('admin.scoresheets.list')

    <a href="/coordinators" class="button radius">Return</a>
@stop