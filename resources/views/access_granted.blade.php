@extends('layouts.app')

@section('title', 'QR Code')

@section('selectedGrantAccess', 'active')

@section('content')
    <p>Here is the QR code for label <b>{{$label}}</b> and username <b>{{$username}}:</b></p>

    <img src="{{$qr_code}}" />

    <p>You can scan it with the <a target="_blank" href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2"> Google authenticator app</a></p>

@endsection