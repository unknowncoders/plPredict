@extends('layouts.master')

@section('title')
    {{$user->username}}'s profile
@stop

@section('content')
    @include('partials.profbox')

  <div class="col-xs-12 col-sm-8 col-lg-9 col-md-9 thumbnail gameweekbox">

<ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#predictions" class="showtabs">Predictions</a></li>
        <li><a data-toggle="tab" href="#badges" class="showtabs">Badges</a></li>
       
</ul>
 
    <div class="tab-content">
       
        <div id="predictions" class="tab-pane active">
 
                     <div class="dropdown " style="float:right; margin-top:10px;">
              
                          <button class="btn gameweekdropdown" type="button" data-toggle="dropdown">Gameweek
                          <span class="caret"></span></button>
                          <ul class="dropdown-menu">
              
                                  @foreach ($gameweeks as $gameweek)

                                        <li><a href="/users/{{$user->username}}/gameweek/{{$gameweek->id}}">Gameweek {{ $gameweek->id }}</a></li>
                                    @endforeach

                          </ul>
                        </div>
                 <div class="gameweekshow ">                
                   <strong><h2> Gameweek {{ $gameweekInFocus->id}}</strong></h2>
                   <hr>
               
                        <?php 
                            $gw_inst = $user->gameweeks()->where('gameweek_id',$gameweekInFocus->id)->first();
                            $boostId = null;
                                if($gw_inst){
                                $boostId = $gw_inst->pivot->boost_id; 
                                }
                        ?>

                 </div>
                  <br><br><br><br><br><br><br><br>
                    @foreach ($gameweekInFocus->fixtures as $fixture)
                                        <div class="col-md-11 col-sm-11 col-lg-5 thumbnail gameweekpredictbox">
                                        <?php $pred = $fixture->predictions()->where('user_id',$user->id)->first(); ?>

                                    @if( $boostId == $fixture->id)
                                        <span class="colorred"> Boosted !! </span>
                                    @endif
                                     
                                        <span class="badge predictscore"> 
                                           @if ($pred)
                                                {{ $pred->score() }}
                                            @else
                                                0
                                              @endif 
                                       </span>

                                            <p class="gameweekuppername"> {{ $fixture->homeClub->name }}</p>
                                               <p class="gameweekpredictscore">

                                            @if ($pred)
                                                {{ $pred->home_score }}
                                            @else
                                                    - 
                                             @endif </p>
                                        
                                            <p class="gameweekactualscore"> 
                                                {{ $fixture->home_score }} 
                                             </p>       
                                               <br><br>
                                               <p class="gameweekpredictscore"> 

                                            @if ($pred)
                                                {{ $pred->away_score }}
                                            @else
                                                    -
                                             @endif </p>
                                              
                                             <p class="gameweekactualscore">
                                                  {{ $fixture->away_score }}
                                             </p>  

                                            <p class="gameweeklowername"> {{ $fixture->awayClub->name }}</p>

                                        </div>

                                    @endforeach
                  <div class="col-md-12 col-sm-12 col-lg-12"> 
                    @if ($gameweekInFocus->id > 1)
                        <a href="/users/{{$user->username}}/gameweek/{!!$gameweekInFocus->id-1!!}" class="dropdownprevious"><i class="fa fa-angle-double-left"></i> &nbsp Gameweek {!!$gameweekInFocus->id-1!!}</a>
                    @endif

                    @if ($gameweekInFocus->id < $lastFixture->gameweek->id)
                        <a href="/users/{{$user->username}}/gameweek/{!!$gameweekInFocus->id+1!!}" class="dropdownnext">Gameweek {!!$gameweekInFocus->id+1!!} &nbsp<i class="fa fa-angle-double-right"></i> </a>
                    @endif

                  </div>

       </div>
        <div id="badges" class="tab-pane fade">
                                 <br>
                                <h2 style="margin-left:3%">Total Badges <span class="badge badgescount"> {{$badges->count()}}</span> </h2>
                                <br><br>
                                     @foreach ($badges as $badge)

                                        {{ $badge->icon_path }}
                                        
                                      <div class="col-md-11 col-sm-11 col-lg-5 thumbnail gameweekpredictbox">
                                    
                                      <h3 class="badgeline">     <img class="img-circle" width="70" height="70" src="{{ URL::asset('image/Soccer.png') }}" alt="coming"></img> 
                                
                                      <a href="#" class="badgename" >{{ $badge->name }}</a>

                                       </h3>
                            <br><br>

                          <div><span class="badge badgegameweek">Gameweek {{ $badge->pivot->gameweek_id}} </span></div>

                                  <!--create a link so that by click the name the page redirect to badges pages for full explanation-->
                                  <!-- {{ $badge->description }} -->

                                          </div>
                                     @endforeach
    
   

        </div> 
   </div>
  </div>

                                         
                            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2  gamepointinfo thumbnail" >
                                <table class="table">
                                   <tbody>
                                 
                                    @foreach ($gameweeks as $gameweek)
                                    <tr> 
                                        <td style="border: 1px solid #333333">     <p><a href="/users/{{$user->username}}/gameweek/{{$gameweek->id}}" class="gameweeklink">Gameweek {{$gameweek->id}}</a>
                                    <?php $userGameweek = $gameweek->predictors()->where('user_id',$user->id)->first(); ?>
                                               &nbsp <span class="badge"> @if ($userGameweek) {{ $userGameweek->pivot->score }} @else 0  @endif </span></p>
                                         </td> 
                                      </tr>         
                                    @endforeach
                                   </tbody>
                                </table>
                            </div>


@stop
