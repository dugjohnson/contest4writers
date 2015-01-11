@extends('layout')

@section('content')
    <div class="row">
        <div class="twelve columns">
            <dl class="tabs">
                <dd class="active"><a href="#simple1">Simple Tab 1</a></dd>
                <dd><a href="#simple2">Simple Tab 2</a></dd>
                <dd class="hide-for-small"><a href="#simple3">Simple Tab 3</a></dd>
            </dl>
            <ul class="tabs-content">
                <li class="active" id="simple1Tab">This is simple tab 1s content. Pretty neat, huh?</li>
                <li id="simple2Tab">This is simple tab 2s content. Now you see it!</li>
                <li id="simple3Tab">This is simple tab 3s content.</li>
            </ul>
        </div>
    </div>
@stop
