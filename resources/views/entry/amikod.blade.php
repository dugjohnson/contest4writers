@extends('layout-forms')

@section('content')
        <a class="button radius" href="{!! route('paypal.payment.kodcheck',['entry_id'=>$entry, 'kodmember'=>false])!!}">
        I am not a KOD Member *
        </a>

        <a class="button radius"  href="{!! route('paypal.payment.kodcheck',['entry_id'=>$entry, 'kodmember'=>true])!!}">
        I am a KOD Member
        </a>
@stop
