@extends('layouts.master')

@section('title')
{{$profUser->username}}'s profile
@stop

@section('content')
    @include('partials.profbox')
@stop
