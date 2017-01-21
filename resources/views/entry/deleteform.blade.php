{!! Form::open(['url' => 'entries/'.$entry->id, 'method' => 'delete']) !!}
<input id="deleteOK" type="checkbox" onclick="checkSubmit">  OK to delete<br>
<p>You cannot undo this action!</p>
<button id="deleteButton" type="submit">Delete this entry</button>
{!! Form::close() !!}

<script type="application/javascript">
    document.getElementById('deleteOK').onclick=checkSubmit;
    checkSubmit();

    function checkSubmit() {
        var isChecked = document.getElementById('deleteOK').checked
        document.getElementById('deleteButton').disabled = ! isChecked;
        var isDisabled = document.getElementById('deleteButton').disabled;
    }
</script>