<fieldset>
    <legend>Save or Save & Complete</legend>
    {!! Form::submit('Save Edits', array('id'=>'submitButton','name'=>'submitButton','class'=>'button radius','onclick'=>'this.disabled = true; this.form.submit();')) !!}
    {!! Form::submit('Scoresheet is Complete', array('id'=>'completeButton','name'=>'completeButton','class'=>'button radius right','onclick'=>'this.disabled = true; this.form.submit();')) !!}
</fieldset>