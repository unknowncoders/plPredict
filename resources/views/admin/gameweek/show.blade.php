@extends ('admin.layouts.master')

@section ('title')
    Gameweek {{ $gameweek->id }}
@stop

@section('content')

            <div class="col-sm-12 col-md-8 col-md-offset-2">

                <h3>Gameweek {{ $gameweek->id }}</h3>

            </div>

@stop
