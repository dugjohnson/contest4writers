<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h3>Reset your password</h3>
<p>Following the link below will allow you to reset your password.</p>
<p>If you did not request this change, you need do nothing.</p>
<p>If the link below does not appear as a click-able link you can paste the link into your browser.</p>

<div>
    To reset your password, complete this form: {!! HTML::link(URL::to('password/reset', array($token))) !!}.<br/>
    This link will expire in {!! Config::get('auth.password.expire', 60) !!} minutes.
</div>
</body>
</html>
