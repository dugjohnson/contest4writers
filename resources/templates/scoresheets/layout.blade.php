<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="/css/foundation.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="/js/foundation.min.js"></script>
    <script src="/js/vendor/modernizr.js"></script>
    <link href='/css/app.css' rel='stylesheet' type='text/css'>

</head>
<body>

<div class="row">
    <div class="small-12 columns">
    <p>RWA® Mystery/Suspense Chapter presents: The Daphne du Maurier Award for Excellence in
             Mystery/Suspense</p>
    </div>
</div>
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
                        <p><em>Judge ID: </em>{{$scoresheet->judge_id }}<em> Entry ID:</em> {{ $scoresheet->entry_id }}</p>
                        <p><em>Title:</em>    {{$scoresheet->title }}  <em>Category</em>:    {{$scoresheet->category }}</p>
                        <p><strong><em>{!! $scoresheet->completed?'Final Score:':'Score so far:' !!}</em><span id="showFinalScore"> {{  $scoresheet->finalScore }} </span></strong></p>
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
            </div>
        </div>

    </aside>

</div>

<footer class="row">
    <div class="large-12 columns">
        <hr/>
        <div class="row">
            <div class="large-12 columns container quote">{{ Inspiring::quote() }}</div>
        </div>
        <div class="row">
            <div class="large-6 columns">
                <p>©2015 Kiss of Death/RWA Mystery/Romantic Suspense Chapter 144</p>
            </div>
        </div>
    </div>
</footer>
<script>
    $(document).foundation();
</script>

</body>
</html>
