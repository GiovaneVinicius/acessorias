@extends('layout')
@section('content')
    @include('header')
    <div id="app">
        <div class="container">
            <product-list :user-id="'{{ auth()->user()->id }}'"></product-list>
        </div>
    </div>
@stop
