

@extends('layouts.default')

@section('title', 'Home Page')

@section('content')

<div class="row">
    <div class="col">
        <h1 class="page-title">Crypto Currencies</h1>
    </div>
</div>
<div class="row">
    <div class="col">
        @isset($data)
            <x-coins :data=$data></x-coins>
        @endisset
    </div>
</div>

@endsection