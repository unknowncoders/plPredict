@extends('layouts.master')

@section('title')
    Predict
@stop

@section('content')

    @include('partials.profbox')

    @foreach ($gws as $gw)
        
        <div>
                <h4>Gameweek {{ $gw->id }} </h4>
                <br>
                
                @foreach ($gw->fixtures as $fxt)

                   <div>
                           {{ $fxt->homeClub->name }} vs  {{ $fxt->awayClub->name }}
                   </div>

                @endforeach
                
        </div>

    @endforeach

@stop
