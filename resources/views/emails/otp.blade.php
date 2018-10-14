@extends('emails.layout')
@section('content')

<p style="float:left; width:100%; font-size:16px; color:#000;">Welcome <strong style="font-weight:bold;">{{$name}}</strong></p>
<p>Your Otp is {{$otp}}</p>
@endsection