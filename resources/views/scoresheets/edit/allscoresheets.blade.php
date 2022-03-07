<fieldset>
    <legend>OPENING</legend>
    <div class="form-group">
        {!! Form::label('score01',  $label['score01']) !!}
        1 {!! Form::radio('score01[]','1',$scoresheet->sheet->scores->score01==1,['class'=>'scorer form-control']) !!}
        2 {!! Form::radio('score01[]','2',$scoresheet->sheet->scores->score01==2,['class'=>'scorer form-control']) !!}
        3 {!! Form::radio('score01[]','3',$scoresheet->sheet->scores->score01==3,['class'=>'scorer form-control']) !!}
        4 {!! Form::radio('score01[]','4',$scoresheet->sheet->scores->score01==4,['class'=>'scorer form-control']) !!}
        5 {!! Form::radio('score01[]','5',$scoresheet->sheet->scores->score01==5,['class'=>'scorer form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('score02',  $label['score02']) !!}
        1 {!! Form::radio('score02[]','1',$scoresheet->sheet->scores->score02==1,['class'=>'scorer']) !!}
        2 {!! Form::radio('score02[]','2',$scoresheet->sheet->scores->score02==2,['class'=>'scorer']) !!}
        3 {!! Form::radio('score02[]','3',$scoresheet->sheet->scores->score02==3,['class'=>'scorer']) !!}
        4 {!! Form::radio('score02[]','4',$scoresheet->sheet->scores->score02==4,['class'=>'scorer']) !!}
        5 {!! Form::radio('score02[]','5',$scoresheet->sheet->scores->score02==5,['class'=>'scorer']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('comment02', 'Comments:') !!}
        {!! Form::textarea('comment02',$scoresheet->sheet->comments->comment02, ['class' => 'form-control']) !!}
    </div>
</fieldset>

<fieldset>
    <legend>STORY</legend>
    <div class="form-group">
        {!! Form::label('score03',  $label['score03']) !!}
        1 {!! Form::radio('score03[]','1',$scoresheet->sheet->scores->score03==1,['class'=>'scorer form-control']) !!}
        2 {!! Form::radio('score03[]','2',$scoresheet->sheet->scores->score03==2,['class'=>'scorer form-control']) !!}
        3 {!! Form::radio('score03[]','3',$scoresheet->sheet->scores->score03==3,['class'=>'scorer form-control']) !!}
        4 {!! Form::radio('score03[]','4',$scoresheet->sheet->scores->score03==4,['class'=>'scorer form-control']) !!}
        5 {!! Form::radio('score03[]','5',$scoresheet->sheet->scores->score03==5,['class'=>'scorer form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('score04',  $label['score04']) !!}
        1 {!! Form::radio('score04[]','1',$scoresheet->sheet->scores->score04==1,['class'=>'scorer form-control']) !!}
        2 {!! Form::radio('score04[]','2',$scoresheet->sheet->scores->score04==2,['class'=>'scorer form-control']) !!}
        3 {!! Form::radio('score04[]','3',$scoresheet->sheet->scores->score04==3,['class'=>'scorer form-control']) !!}
        4 {!! Form::radio('score04[]','4',$scoresheet->sheet->scores->score04==4,['class'=>'scorer form-control']) !!}
        5 {!! Form::radio('score04[]','5',$scoresheet->sheet->scores->score04==5,['class'=>'scorer form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('score05',  $label['score05']) !!}
        1 {!! Form::radio('score05[]','1',$scoresheet->sheet->scores->score05==1,['class'=>'scorer form-control']) !!}
        2 {!! Form::radio('score05[]','2',$scoresheet->sheet->scores->score05==2,['class'=>'scorer form-control']) !!}
        3 {!! Form::radio('score05[]','3',$scoresheet->sheet->scores->score05==3,['class'=>'scorer form-control']) !!}
        4 {!! Form::radio('score05[]','4',$scoresheet->sheet->scores->score05==4,['class'=>'scorer form-control']) !!}
        5 {!! Form::radio('score05[]','5',$scoresheet->sheet->scores->score05==5,['class'=>'scorer form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('score06',  $label['score06']) !!}
        1 {!! Form::radio('score06[]','1',$scoresheet->sheet->scores->score06==1,['class'=>'scorer form-control']) !!}
        2 {!! Form::radio('score06[]','2',$scoresheet->sheet->scores->score06==2,['class'=>'scorer form-control']) !!}
        3 {!! Form::radio('score06[]','3',$scoresheet->sheet->scores->score06==3,['class'=>'scorer form-control']) !!}
        4 {!! Form::radio('score06[]','4',$scoresheet->sheet->scores->score06==4,['class'=>'scorer form-control']) !!}
        5 {!! Form::radio('score06[]','5',$scoresheet->sheet->scores->score06==5,['class'=>'scorer form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('comment06', 'Comments:') !!}
        {!! Form::textarea('comment06',$scoresheet->sheet->comments->comment06, ['class' => 'form-control']) !!}
    </div>

</fieldset>

<fieldset>
    <legend>CHARACTERIZATION</legend>
    <div class="form-group">
        {!! Form::label('score07',  $label['score07']) !!}
        1 {!! Form::radio('score07[]','1',$scoresheet->sheet->scores->score07==1,['class'=>'scorer form-control']) !!}
        2 {!! Form::radio('score07[]','2',$scoresheet->sheet->scores->score07==2,['class'=>'scorer form-control']) !!}
        3 {!! Form::radio('score07[]','3',$scoresheet->sheet->scores->score07==3,['class'=>'scorer form-control']) !!}
        4 {!! Form::radio('score07[]','4',$scoresheet->sheet->scores->score07==4,['class'=>'scorer form-control']) !!}
        5 {!! Form::radio('score07[]','5',$scoresheet->sheet->scores->score07==5,['class'=>'scorer form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('score08',  $label['score08']) !!}
        1 {!! Form::radio('score08[]','1',$scoresheet->sheet->scores->score08==1,['class'=>'scorer form-control']) !!}
        2 {!! Form::radio('score08[]','2',$scoresheet->sheet->scores->score08==2,['class'=>'scorer form-control']) !!}
        3 {!! Form::radio('score08[]','3',$scoresheet->sheet->scores->score08==3,['class'=>'scorer form-control']) !!}
        4 {!! Form::radio('score08[]','4',$scoresheet->sheet->scores->score08==4,['class'=>'scorer form-control']) !!}
        5 {!! Form::radio('score08[]','5',$scoresheet->sheet->scores->score08==5,['class'=>'scorer form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('score09',  $label['score09']) !!}
        1 {!! Form::radio('score09[]','1',$scoresheet->sheet->scores->score09==1,['class'=>'scorer form-control']) !!}
        2 {!! Form::radio('score09[]','2',$scoresheet->sheet->scores->score09==2,['class'=>'scorer form-control']) !!}
        3 {!! Form::radio('score09[]','3',$scoresheet->sheet->scores->score09==3,['class'=>'scorer form-control']) !!}
        4 {!! Form::radio('score09[]','4',$scoresheet->sheet->scores->score09==4,['class'=>'scorer form-control']) !!}
        5 {!! Form::radio('score09[]','5',$scoresheet->sheet->scores->score09==5,['class'=>'scorer form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('comment09', 'Comments:') !!}
        {!! Form::textarea('comment09',$scoresheet->sheet->comments->comment09, ['class' => 'form-control']) !!}
    </div>
</fieldset>

<fieldset>
    <legend>SETTING</legend>
    <div class="form-group">
        {!! Form::label('score10',  $label['score10']) !!}
        1 {!! Form::radio('score10[]','1',$scoresheet->sheet->scores->score10==1,['class'=>'scorer form-control']) !!}
        2 {!! Form::radio('score10[]','2',$scoresheet->sheet->scores->score10==2,['class'=>'scorer form-control']) !!}
        3 {!! Form::radio('score10[]','3',$scoresheet->sheet->scores->score10==3,['class'=>'scorer form-control']) !!}
        4 {!! Form::radio('score10[]','4',$scoresheet->sheet->scores->score10==4,['class'=>'scorer form-control']) !!}
        5 {!! Form::radio('score10[]','5',$scoresheet->sheet->scores->score10==5,['class'=>'scorer form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('score11',  $label['score11']) !!}
        1 {!! Form::radio('score11[]','1',$scoresheet->sheet->scores->score11==1,['class'=>'scorer form-control']) !!}
        2 {!! Form::radio('score11[]','2',$scoresheet->sheet->scores->score11==2,['class'=>'scorer form-control']) !!}
        3 {!! Form::radio('score11[]','3',$scoresheet->sheet->scores->score11==3,['class'=>'scorer form-control']) !!}
        4 {!! Form::radio('score11[]','4',$scoresheet->sheet->scores->score11==4,['class'=>'scorer form-control']) !!}
        5 {!! Form::radio('score11[]','5',$scoresheet->sheet->scores->score11==5,['class'=>'scorer form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('score12',  $label['score12']) !!}
        1 {!! Form::radio('score12[]','1',$scoresheet->sheet->scores->score12==1,['class'=>'scorer form-control']) !!}
        2 {!! Form::radio('score12[]','2',$scoresheet->sheet->scores->score12==2,['class'=>'scorer form-control']) !!}
        3 {!! Form::radio('score12[]','3',$scoresheet->sheet->scores->score12==3,['class'=>'scorer form-control']) !!}
        4 {!! Form::radio('score12[]','4',$scoresheet->sheet->scores->score12==4,['class'=>'scorer form-control']) !!}
        5 {!! Form::radio('score12[]','5',$scoresheet->sheet->scores->score12==5,['class'=>'scorer form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('comment12', 'Comments:') !!}
        {!! Form::textarea('comment12',$scoresheet->sheet->comments->comment12, ['class' => 'form-control']) !!}
    </div>

</fieldset>

<fieldset>
    <legend>STYLE/VOICE</legend>
    <div class="form-group">
        {!! Form::label('score13',  $label['score13']) !!}
        1 {!! Form::radio('score13[]','1',$scoresheet->sheet->scores->score13==1,['class'=>'scorer form-control']) !!}
        2 {!! Form::radio('score13[]','2',$scoresheet->sheet->scores->score13==2,['class'=>'scorer form-control']) !!}
        3 {!! Form::radio('score13[]','3',$scoresheet->sheet->scores->score13==3,['class'=>'scorer form-control']) !!}
        4 {!! Form::radio('score13[]','4',$scoresheet->sheet->scores->score13==4,['class'=>'scorer form-control']) !!}
        5 {!! Form::radio('score13[]','5',$scoresheet->sheet->scores->score13==5,['class'=>'scorer form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('score14',  $label['score14']) !!}
        1 {!! Form::radio('score14[]','1',$scoresheet->sheet->scores->score14==1,['class'=>'scorer form-control']) !!}
        2 {!! Form::radio('score14[]','2',$scoresheet->sheet->scores->score14==2,['class'=>'scorer form-control']) !!}
        3 {!! Form::radio('score14[]','3',$scoresheet->sheet->scores->score14==3,['class'=>'scorer form-control']) !!}
        4 {!! Form::radio('score14[]','4',$scoresheet->sheet->scores->score14==4,['class'=>'scorer form-control']) !!}
        5 {!! Form::radio('score14[]','5',$scoresheet->sheet->scores->score14==5,['class'=>'scorer form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('score15',  $label['score15']) !!}
        1 {!! Form::radio('score15[]','1',$scoresheet->sheet->scores->score15==1,['class'=>'scorer form-control']) !!}
        2 {!! Form::radio('score15[]','2',$scoresheet->sheet->scores->score15==2,['class'=>'scorer form-control']) !!}
        3 {!! Form::radio('score15[]','3',$scoresheet->sheet->scores->score15==3,['class'=>'scorer form-control']) !!}
        4 {!! Form::radio('score15[]','4',$scoresheet->sheet->scores->score15==4,['class'=>'scorer form-control']) !!}
        5 {!! Form::radio('score15[]','5',$scoresheet->sheet->scores->score15==5,['class'=>'scorer form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('comment15', 'Comments:') !!}
        {!! Form::textarea('comment15',$scoresheet->sheet->comments->comment15, ['class' => 'form-control']) !!}
    </div>
</fieldset>

<fieldset>
    <legend>DIALOGUE/NARRATIVE</legend>


    <div class="form-group">
        {!! Form::label('score16',  $label['score16']) !!}
        1 {!! Form::radio('score16[]','1',$scoresheet->sheet->scores->score16==1,['class'=>'scorer form-control']) !!}
        2 {!! Form::radio('score16[]','2',$scoresheet->sheet->scores->score16==2,['class'=>'scorer form-control']) !!}
        3 {!! Form::radio('score16[]','3',$scoresheet->sheet->scores->score16==3,['class'=>'scorer form-control']) !!}
        4 {!! Form::radio('score16[]','4',$scoresheet->sheet->scores->score16==4,['class'=>'scorer form-control']) !!}
        5 {!! Form::radio('score16[]','5',$scoresheet->sheet->scores->score16==5,['class'=>'scorer form-control']) !!}
    </div>


    <div class="form-group">
        {!! Form::label('score17',  $label['score17']) !!}
        1 {!! Form::radio('score17[]','1',$scoresheet->sheet->scores->score17==1,['class'=>'scorer form-control']) !!}
        2 {!! Form::radio('score17[]','2',$scoresheet->sheet->scores->score17==2,['class'=>'scorer form-control']) !!}
        3 {!! Form::radio('score17[]','3',$scoresheet->sheet->scores->score17==3,['class'=>'scorer form-control']) !!}
        4 {!! Form::radio('score17[]','4',$scoresheet->sheet->scores->score17==4,['class'=>'scorer form-control']) !!}
        5 {!! Form::radio('score17[]','5',$scoresheet->sheet->scores->score17==5,['class'=>'scorer form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('comment17', 'Comments:') !!}
        {!! Form::textarea('comment17',$scoresheet->sheet->comments->comment17, ['class' => 'form-control']) !!}
    </div>
</fieldset>
