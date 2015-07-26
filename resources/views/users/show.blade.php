@extends('layouts.master')

@section('title')
{{$user->username}}'s profile
@stop

@section('content')
    @include('partials.profbox')
@stop
