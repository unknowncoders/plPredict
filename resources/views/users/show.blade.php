@extends('layouts.master')

@section('title')
{{$user->username}}'s profile
@stop

@section('content')

    <div>
            Name: {{ $user->name }}
            (Username: {{ $user->username }})
    </div>

@stop
