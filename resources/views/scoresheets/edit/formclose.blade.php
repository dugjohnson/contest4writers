<fieldset>
    <legend>Save or Save & Complete</legend>
    <!--see scoresheet.js for handling of submits-->
    {!! Form::hidden('process_method','',array('id'=>'process_method')) !!}
    {!! Form::submit('Save Edits', array('id'=>'submitButton','name'=>'submitButton','class'=>'button radius')) !!}
    {!! Form::submit('Scoresheet is Complete', array('id'=>'completeButton','name'=>'completeButton','class'=>'button radius right')) !!}
</fieldset>