
@extends('layouts.default')

@section('title', 'Registration page')

@section('login-css')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="row">
    <div class="col">
        <h1 class="page-title">Register</h1>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-8">
        @if(session('register-error'))
        <div class="alert alert-error">
            {{ session('register-error') }}
        </div>
        @endif
        <form class="form-signin" method="POST", action="{{route('register')}}">
            @csrf
            <label for="firstName" class="sr-only">First Name</label>
            <input type="text" id="firstName" class="form-control" placeholder="First name" required autofocus name="firstname" required>
                        
            @if ($errors->has('firstname'))
            <span class="text-danger">{{$errors->first('firstname')}}</span>
            @endif

            <label for="lastName" class="sr-only">Last Name</label>
            <input type="text" id="lastName" class="form-control" placeholder="Last name" required autofocus name="lastname" required>
                        
            @if ($errors->has('lastname'))
            <span class="text-danger">{{$errors->first('lastname')}}</span>
            @endif

            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus name="email" required>
            
            @if ($errors->has('email'))
            <span class="text-danger">{{$errors->first('email')}}</span>
            @endif

            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">

            @if ($errors->has('password'))
            <span class="text-danger">{{$errors->first('password')}}</span>
            @endif

            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>

        </form>
    </div>

</div>

 
    {{-- @dump($data); --}}
@endsection()