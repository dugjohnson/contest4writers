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
                        <p><em>Entry Title:</em> {{$finalsheet->title }}</p>
                        <p><em>Entry Number:</em> {{ $finalsheet->entry_id }}</p>
                        <p><em>Category:</em> {!! $categories[$finalsheet->category] !!} </p>

                        <p><em>Judge's Name: </em>{{$finalsheet->judge->first_name}} {{$finalsheet->judge->last_name}}</p>
                    </fieldset>
                    <fieldset>
                        <legend>Scoring</legend>
                        <p>What area(s) of the judged manuscript standout as well done or excellent?</p>
                        <p>{{$finalsheet->standout}}</p>

                        <p>What area(s) of the manuscript does the author need to improve?</p>
                        <p>{{$finalsheet->improve}}</p>

                        <p>What is your overall assessment of this entry?</p>
                        <p>{{$finalsheet->assessment}}</p>

                        <p>Score from 50 to 100:</p>
                        <p>{{$finalsheet->score}}</p>


                        <p>Out of all the entries I rank this entry number:</p>
                        <p>{{$finalsheet->rank}}</p>
                        <h4>***Would you like to see more?***</h4>
                        <p>Synopsis/3 chapters {{$finalsheet->synopsis?'Yes':'No'}}</p>
                        <p>Full Manuscript {{$finalsheet->full_manuscript?'Yes':'No'}}</p>

                        <p>Other {{$finalsheet->other?'Yes':'No'}}</p>


                        <p>Comments:</p>
                        <p>{{$finalsheet->comments}}</p>
                        <p>Electronic Signature:</p>
                        <p>{{$finalsheet->signature}}</p>
                    </fieldset>

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
