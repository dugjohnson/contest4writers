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

                        <p><em>Judge's Name: </em>{{$finalsheet->judge->first_name}} {{$finalsheet->judge->last_name}}<em></p>
                        <div class="panel">
                            <p>The Daphne Committee has simplified score sheets. Because we need points to determine the
                                Overall Daphne du Maurier Award, we need two numbers from you. First a score for the entry
                                itself of between 50 to 100. Second, please rank all the entries (first through fifth). We very
                                much appreciate your help.
                                Thank you for judging the Daphne! If you have any questions or problems, please contact
                                <strong>Jennifer Graybeal or Jacki Renée at koddaphnecontest@gmail.com.</strong></p></div>
                    </fieldset>
                    {!! Form::open(array('url' => 'scoresheets/final/'.$finalsheet->lookup_code.'/edit','method'=>'put'))  !!}
                    <fieldset>
                        <legend>Scoring</legend>
                        <div class="form-group">
                            {!! Form::label('standout', 'What area(s) of the judged manuscript standout as well done or excellent?') !!}
                            {!! Form::textarea('standout',$finalsheet->standout, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('improve', 'What area(s) of the manuscript does the author need to improve?') !!}
                            {!! Form::textarea('improve',$finalsheet->improve, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('assessment', 'What is your overall assessment of this entry?') !!}
                            {!! Form::textarea('assessment',$finalsheet->assessment, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('score', 'Score from 50 to 100:') !!}
                            {!! Form::number('score',$finalsheet->score, ['class' => 'form-control']) !!}
                        </div>


                        <div class="form-group">
                            {!! Form::label('rank', 'Out of all the entries I rank this entry number:') !!}
                            {!! Form::number('rank',$finalsheet->rank, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                        <h4>***Would you like to see more?***</h4>
                        <p>If so, please mark:</p>
                            {!! Form::label('synopsis', 'Synopsis/3 chapters') !!}
                            {!! Form::checkbox('synopsis',$finalsheet->synopsis) !!}
                            <br>
                            {!! Form::label('full_manuscript', 'Full Manuscript') !!}
                            {!! Form::checkbox('full_manuscript',$finalsheet->full_manuscript) !!}
                            <br>
                            {!! Form::label('other', 'Other') !!}
                            {!! Form::checkbox('other',$finalsheet->other) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('comments', 'Comments:') !!}
                            {!! Form::textarea('comments',$finalsheet->comments, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('signature', 'Electronic Signature (type your name):') !!}
                            {!! Form::text('signature',$finalsheet->signature, ['class' => 'form-control']) !!}
                        </div>
                    </fieldset>
                    {!! Form::submit('Save Edits', array('id'=>'submitButton','name'=>'submitButton','class'=>'button radius')) !!}

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
