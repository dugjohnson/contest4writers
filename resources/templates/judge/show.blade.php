@extends('layout')

@section('content')
  @include('judge.info')
  @if ($isCoordinator)
    <a href="/coordinators/judges" class="button radius">Back to Coordinator Judges</a>
  @else
    <a href="/judges" class="button radius">Return</a>
  @endif

@stop