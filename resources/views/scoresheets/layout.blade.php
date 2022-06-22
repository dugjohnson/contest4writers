<html>
@include('head')
<body>
@if(! ($email ?? false))
    <div class="row">
        <a href="/">
            <div class="small-12 columns">
                <p>RWA® Mystery/Suspense Chapter presents: The Daphne du Maurier Award for Excellence in
                    Mystery/Suspense</p>
            </div>
        </a>
    </div>
@endif
<div class="row">
    <div class="large-9 columns" role="content">
        <div class="large-12 columns container">
            @if (Session::has('infoMessage'))
                <div class="alert-box success radius">{{ Session::get('infoMessage') }}</div>
            @endif
            <div class="row">
                <div class="content">
                    <fieldset>
                        <legend>General Information</legend>
                        <p><em>Judge ID: </em>{{$scoresheet->judge_id }}<em> Entry ID:</em> {{ $scoresheet->entry_id }}
                        </p>
                        <p>{{$scoresheet->title }}</p>
                        <p>{!! $categories[$scoresheet->category] !!} {!! ($scoresheet->published?'Published':'Unpublished')!!}</p>
                        <p><strong><em>{!! $scoresheet->completed?'Final Score:':'Score so far:' !!}</em><span
                                    id="showFinalScore"> {{  $scoresheet->finalScore }} </span></strong></p>
                    </fieldset>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <aside class="large-3 columns">
        <div class="row">
            <div class="content">
                @yield('sidebar','')
                <div id="scorebox">
                    <p id="scoretotal"></p>
                </div>
            </div>
        </div>

    </aside>

</div>

<footer class="row">
    <div class="large-12 columns">
        <hr/>
        <div class="row">
            <div class="large-6 columns">
                <p>©{{ $contest_year }} Kiss of Death/RWA Mystery/Romantic Suspense Chapter 144</p>
            </div>
        </div>
    </div>
</footer>
<script>
    $(document).foundation();
</script>

</body>
</html>
