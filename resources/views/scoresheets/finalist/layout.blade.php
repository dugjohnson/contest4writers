<html>
@include('head')
<body>

<div class="row">
    <div class="small-12 columns">
        <p>RWA® Mystery/Suspense Chapter presents...</p>
        <h1>The Daphne du Maurier Award</h1>
        <h2>for Excellence in Mystery/Suspense</h2>
        <h2>Unpublished Division</h2>
        <h3>{{ $contest_year }}</h3>
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
                        <p><em>Entry Title:</em> {{$scoresheet->title }}</p>
                        <p>Entry Number:</em> {{ $scoresheet->entry_id }}</p>
                        <p>Category:</em> {!! $categories[$scoresheet->category] !!} </p>

                        <p><em>Judge's Name: </em>{{$scoresheet->judge_id }}<em></p>
                        <p><strong><em>{!! $scoresheet->completed?'Final Score:':'Score so far:' !!}</em><span
                                    id="showFinalScore"> {{  $scoresheet->finalScore }} </span></strong></p>
                        <div class="panel">
                            <p>The Daphne Committee has simplified score sheets. Because we need points to determine the
                                Overall Daphne du Maurier Award, we need two numbers from you. First a score for the entry
                                itself of between 50 to 100. Second, please rank all the entries (first through fifth). We very
                                much appreciate your help.
                                Thank you for judging the Daphne! If you have any questions or problems, please contact
                                <strong>Jennifer Graybeal or Jacki Renée at koddaphnecontest@gmail.com.</strong></p></div>
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
