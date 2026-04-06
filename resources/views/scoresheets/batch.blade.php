@extends('layout')

@section('content')
    <p>This action will create score sheets for each entry, 3 for published, 4 for unpublished</p>
    <p>If you do not want to do that, click at the top of the page to go back</p>
    <form method="POST" action="{{ url('scoresheets/batch') }}">
        @csrf
        <flux:button type="submit" variant="primary">Create Batch</flux:button>
    </form>
@stop
