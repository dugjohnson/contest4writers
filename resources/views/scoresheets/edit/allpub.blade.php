@extends('scoresheets.layout')

@section('content')
    <div id="view-content">
        <div class="panel">
            <p><strong>Make sure you save your scoresheet before leaving this page.</strong> Closing the page or hitting
                the back button will lose your scoring. You can use the submit button at the
                bottom of the score sheet to save your scoring. You can come back to edit until you have completed the
                score sheet. A complete button will appear when you have completed the requirements for the scoresheet
            </p>
        </div>

        <fieldset>
            <legend>SCORING (100 points max)</legend>
            <ul>
                <li>5 = excellent</li>
                <li>4 = good</li>
                <li>3 = average</li>
                <li>2 = fair</li>
                <li>1 = poor</li>
            </ul>
            <p>Important: All comments must be professional and encouraging. For any question scored 3 or less, judges
                are particularly encouraged to include an explanation.</p>
        </fieldset>
        {!! Form::open(array('url' => 'scoresheets/'.$scoresheet->id,'method'=>'put'))  !!}
        @include('scoresheets.edit.formopen')
        @include('scoresheets.edit.allscoresheets')
        <fieldset>
            <legend>ENDING</legend>
            <div class="form-group">
                {!! Form::label('score18',  $label['score18']) !!}
                1 {!! Form::radio('score18[]','1',$scoresheet->sheet->scores->score18==1,['class'=>'scorer form-control']) !!}
                2 {!! Form::radio('score18[]','2',$scoresheet->sheet->scores->score18==2,['class'=>'scorer form-control']) !!}
                3 {!! Form::radio('score18[]','3',$scoresheet->sheet->scores->score18==3,['class'=>'scorer form-control']) !!}
                4 {!! Form::radio('score18[]','4',$scoresheet->sheet->scores->score18==4,['class'=>'scorer form-control']) !!}
                5 {!! Form::radio('score18[]','5',$scoresheet->sheet->scores->score18==5,['class'=>'scorer form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('score19',  $label['score19']) !!}
                1 {!! Form::radio('score19[]','1',$scoresheet->sheet->scores->score19==1,['class'=>'scorer form-control']) !!}
                2 {!! Form::radio('score19[]','2',$scoresheet->sheet->scores->score19==2,['class'=>'scorer form-control']) !!}
                3 {!! Form::radio('score19[]','3',$scoresheet->sheet->scores->score19==3,['class'=>'scorer form-control']) !!}
                4 {!! Form::radio('score19[]','4',$scoresheet->sheet->scores->score19==4,['class'=>'scorer form-control']) !!}
                5 {!! Form::radio('score19[]','5',$scoresheet->sheet->scores->score19==5,['class'=>'scorer form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('score20',  $label['score20']) !!}
                1 {!! Form::radio('score20[]','1',$scoresheet->sheet->scores->score20==1,['class'=>'scorer form-control']) !!}
                2 {!! Form::radio('score20[]','2',$scoresheet->sheet->scores->score20==2,['class'=>'scorer form-control']) !!}
                3 {!! Form::radio('score20[]','3',$scoresheet->sheet->scores->score20==3,['class'=>'scorer form-control']) !!}
                4 {!! Form::radio('score20[]','4',$scoresheet->sheet->scores->score20==4,['class'=>'scorer form-control']) !!}
                5 {!! Form::radio('score20[]','5',$scoresheet->sheet->scores->score20==5,['class'=>'scorer form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('comment20', 'Comments:') !!}
                {!! Form::textarea('comment20',$scoresheet->sheet->comments->comment20, ['class' => 'form-control']) !!}
            </div>
        </fieldset>

        @include('scoresheets.edit.bonus')
        @include('scoresheets.edit.formclose')
        {!! Form::close() !!}

    </div>
@stop
