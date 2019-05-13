@extends('layouts.app')

@section('title', 'Authenticate')

@section('selectedAuth', 'active')

@section('content')

    @isset($verified)
        <h3>
            @if ( $verified === false )
                {{$verificationError}}
            @else
                Congratulations! You are authenticated.
            @endif
        </h3>
    @endisset

    <form method="POST" action="">
        <p>Please enter username and TOTP code to authenticate:</p>
        <div>
            <label for="username">Username</label>
            <input name="username" type="text" @isset($username) value="{{$username}}" @endisset>
            <div>&nbsp; @isset($errors['username']){{$errors['username'][0]}} @endisset</div>
        </div>
        <br>
        <div>
            <label for="label">Code</label>
            <input name="code" type="text" @isset($code) value="{{$code}}" @endisset>
            <div>&nbsp; @isset($errors['code']){{$errors['code'][0]}} @endisset</div>
        </div>
        <br>
        <input type="submit" value="Verify">
    </form>

@endsection
