
@extends('layouts.default')

@section('title', 'Login Page')

@section('login-css')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="row">
    <div class="col">
        <h1 class="page-title">Login Page</h1>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-8">
        @if(session('register-success'))
        <div class="alert alert-success">
            {{ session('register-success') }}
        </div>
        @endif

        <form class="form-signin" method="POST", action="{{route('login')}}">
            @csrf
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

            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
          </form>
        
          @if(session('login-error'))
          <div class="alert alert-error">
              {{ session('login-error') }}
          </div>
          @endif
    </div>

</div>

 
    {{-- @dump($data); --}}
@endsection()