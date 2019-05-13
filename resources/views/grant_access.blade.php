@extends('layouts.app')

@section('title', 'Grant access')
@section('selectedGrantAccess', 'active')

@section('content')

    <form method="POST" action="">
        <p>Please enter label and username to get authentication QR code:</p>
        <div>
            <label for="label">Label</label>
            <input name="label" type="text" @isset($label) value="{{$label}}" @endisset>
            <div>&nbsp;@isset($errors['label']){{$errors['label'][0]}} @endisset</div>
        </div>
        <br>
        <div>
            <label for="username">Username</label>
            <input name="username" type="text" @isset($username) value="{{$username}}" @endisset>
            <div>&nbsp;@isset($errors['username']){{$errors['username'][0]}} @endisset</div>
        </div>
        <br>
        <input type="submit" value="Create">
    </form>

@endsection