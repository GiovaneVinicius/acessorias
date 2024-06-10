@extends('layout')
@section('content')
    <div id="app">
        <auth-form :csrf_token="{{ csrf_token() }}"></auth-form>
    </div>
@stop
