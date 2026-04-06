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

                        <div class="panel">
                            <p>The Daphne Committee has simplified score sheets. Because we need points to determine the
                                Overall Daphne du Maurier Award, we need two numbers from you. First a score for the entry
                                itself of between 50 to 100. Second, please rank all the entries (first through fifth). We very
                                much appreciate your help.
                                Thank you for judging the Daphne! If you have any questions or problems, please contact
                                <strong>Jennifer Graybeal at koddaphnecontest@gmail.com.</strong></p></div>
                    </fieldset>
                    <form method="POST" action="{{ url('scoresheets/final/'.$finalsheet->lookup_code.'/edit') }}">
                        @csrf
                        @method('PUT')
                    <fieldset>
                        <legend>Scoring</legend>
                        <flux:field>
                            <flux:label>What area(s) of the judged manuscript standout as well done or excellent?</flux:label>
                            <flux:textarea name="standout">{{ $finalsheet->standout }}</flux:textarea>
                        </flux:field>

                        <flux:field>
                            <flux:label>What area(s) of the manuscript does the author need to improve?</flux:label>
                            <flux:textarea name="improve">{{ $finalsheet->improve }}</flux:textarea>
                        </flux:field>

                        <flux:field>
                            <flux:label>What is your overall assessment of this entry?</flux:label>
                            <flux:textarea name="assessment">{{ $finalsheet->assessment }}</flux:textarea>
                        </flux:field>

                        <flux:field>
                            <flux:label>Score from 50 to 100:</flux:label>
                            <flux:input type="number" name="score" value="{{ $finalsheet->score }}" />
                        </flux:field>


                        <flux:field>
                            <flux:label>Out of all the entries I rank this entry number:</flux:label>
                            <flux:input type="number" name="rank" value="{{ $finalsheet->rank }}" />
                        </flux:field>
                        <flux:field>
                        <h4>***Would you like to see more?***</h4>
                        <p>If so, please mark:</p>
                            <flux:checkbox name="synopsis" value="1" :checked="$finalsheet->synopsis" label="Synopsis/3 chapters" />
                            <br>
                            <flux:checkbox name="full_manuscript" value="1" :checked="$finalsheet->full_manuscript" label="Full Manuscript" />
                            <br>
                            <flux:checkbox name="other" value="1" :checked="$finalsheet->other" label="Other" />
                        </flux:field>

                        <flux:field>
                            <flux:label>Comments:</flux:label>
                            <flux:textarea name="comments">{{ $finalsheet->comments }}</flux:textarea>
                        </flux:field>
                        <flux:field>
                            <flux:label>Electronic Signature (type your name):</flux:label>
                            <flux:input name="signature" value="{{ $finalsheet->signature }}" />
                        </flux:field>
                    </fieldset>
                    <flux:button type="submit" variant="primary" id="submitButton" name="submitButton">Save Edits</flux:button>
                    </form>

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
