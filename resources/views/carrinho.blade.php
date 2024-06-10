@extends('layout')
@section('content')
    @include('header')
    <div id="app">
        <div class="container">
            <cart-list :user-id="'{{ auth()->user()->id }}'"></cart-list>
        </div>
    </div>
@stop
