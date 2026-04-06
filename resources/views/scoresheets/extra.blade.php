@extends('layout')

@section('content')
    <p>This action can create score sheets for one entry</p>
    <p>If you do not want to do that, click at the top of the page to go back</p>
    <form method="POST" action="{{ url('scoresheets/extra') }}">
        @csrf
    <flux:field>
        <flux:label>Total Score sheets for entry when finished (adds blank entries, does not delete existing):</flux:label>
        <flux:input name="totalWhenDone" value="0" size="2" maxlength="2" />
    </flux:field>
    <flux:field>
        <flux:label>Entry number:</flux:label>
        <flux:input name="entry" value="" />
    </flux:field>

    <flux:button type="submit" variant="primary">Create Extras</flux:button>
    </form>
@stop
