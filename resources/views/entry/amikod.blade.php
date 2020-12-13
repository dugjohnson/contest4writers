@extends('layout-forms')

@section('content')
        <a style="margin: 0 10px;" class="button radius amikod" href="{!! route('paypal.payment.kodcheck',['entry_id'=>$entry, 'kodmember'=>false])!!}">
        I am not a KOD Member
        </a>
        <a style="margin: 0 10px;" class="button radius amikod"  href="{!! route('paypal.payment.kodcheck',['entry_id'=>$entry, 'kodmember'=>true])!!}">
        I am a KOD Member
        </a>
@stop
