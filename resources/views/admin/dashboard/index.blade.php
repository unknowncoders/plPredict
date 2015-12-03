@extends('admin.layouts.master')

@section('title')

@stop

@section('content')

            <div class="col-sm-12 col-md-8 col-md-offset-2">
                Users ({{ $usersData['count'] }} : {{ $usersData['incompleteCount'] }})<br>
                Pics ({{ $picsData['count'] }} ) <br>
                Clubs ({{ $clubsData['count'] }} ) <br>
                Badges ({{ $badgesData['count'] }} ) <br>
                Fixtures ({{ $fixturesData['count'] }} : {{ $fixturesData['overCount'] }} : {{ $fixturesData['closedNotOverCount'] }} ! ) <br>
                Gameweeks ({{ $gameweeksData['count'] }} : {{ $gameweeksData['completeCount'] }} : ! {{ $gameweeksData['pendingCount'] }} ! ) <br>
                Admins ({{ $adminsData['count'] }} )
            </div>

@stop

