@extends ('layouts.master')

@section ('title')

@stop

@section ('content')
    <div class="thumbnail standingouter">
            <ul class="nav nav-tabs">
                <li class="{{$activeTabs[0]}}"><a data-toggle="tab" href="#overall" class="showtabs">Overall</a></li>
                <li class="{{$activeTabs[1]}}"><a data-toggle="tab" href="#monthly" class="showtabs">Monthly</a></li>
                <li class="{{$activeTabs[2]}}"><a data-toggle="tab" href="#weekly" class="showtabs">Weekly</a></li>
            </ul>

            <div class="tab-content">

                    <div id="overall" class="tab-pane {{$activeTabs[0]}}">
 
                       <br><br>
                       <h2 style="margin:3%"><strong> Overall </strong> </h2>
                       <br>
      
                  <div class="standingtable">
                         <table class="table ">
                           <thead>
                              <tr>
                                 <th>Rank</th>
                                 <th>Username</th>
                                 <th>Total</th>
                               </tr>
                           </thead>
                           <tbody> 
                    
                                @foreach ($users  as $userInst)
                                  
                                 @if($user == $userInst)
 
                                   <tr style="background-color:#75A3D1; color:#FFFFFF">
                                   <td> {{ $userInst->rank }}</td>
                                   <td> <a href="/users/{{ $userInst->username }}" class="standingtableusermatch">{{ $userInst->username }} </a> </td>
                                   <td> {{ $userInst->score }}</td>
                                   </tr> 

                                 @else
                                   <tr>
                                   <td> {{ $userInst->rank }}</td>
                                   <td> <a href="/users/{{ $userInst->username }}" class="standingtableuser">{{ $userInst->username }} </a> </td>
                                   <td> {{ $userInst->score }}</td>
                                   </tr> 
                                 @endif

                                @endforeach 
                         </tbody>
                      </table>
                  </div>

                    </div>

                    <div id="monthly" class="tab-pane {{$activeTabs[1]}}">

                     <div class="dropdown " style="float:right; margin-top:10px;">
                        <button class="btn gameweekdropdown" type="button" data-toggle="dropdown">Month
                          <span class="caret"></span></button>
                      
                          <ul class="dropdown-menu">
                          
                               @foreach ($months as $month)
                                    <li><a href="/standings/month/{{$month->id}}">{{ $month->name }} </a></li>
                                @endforeach

                         </ul>
                 
                     </div> 
                     <br><br> 
                      <h2 style="margin:3%"><strong> {{$month->name }} </strong></h2>
                      <br>
          
              <div class="standingtable">
                         <table class="table ">
                           <thead>
                              <tr>
                                 <th>Rank</th>
                                 <th>Username</th>
                                 <th>Total</th>
                               </tr>
                           </thead>
                           <tbody> 
                    
                          @foreach ($monthUsers  as $userInst)

                                 @if($user->username == $userInst->username)
                             
                                     <?php $monthUser =$userInst->months()->where('month_id',$month->id)->first(); ?> 
                      
                                    <tr style="background-color:#75A3D1; color:#FFFFFF"> 
                                        <td> {{ $monthUser->pivot->rank }}</td>
                                        <td> <a href="/users/{{ $userInst->username }}" class="standingtableusermatch">{{ $userInst->username }} </a></td>
                                        <td> {{ $userInst->gameweeks()->where('month_id',$month->id)->sum('score') }}</td>
                                     </tr> 
                            @else
                             <?php $monthUser =$userInst->months()->where('month_id',$month->id)->first(); ?> 
              
                            <tr> 
                                <td> {{ $monthUser->pivot->rank }}</td>
                                <td> <a href="/users/{{ $userInst->username }}" class="standingtableuser">{{ $userInst->username }} </a></td>
                                <td> {{ $userInst->gameweeks()->where('month_id',$month->id)->sum('score') }}</td>
                             </tr> 
                             @endif                           

                            @endforeach 
                        </tbody>
                       </table>
                    </div>
                    </div>

                    <div id="weekly" class="tab-pane {{$activeTabs[2]}}">


                     <div class="dropdown " style="float:right; margin-top:10px;">
                        <button class="btn gameweekdropdown" type="button" data-toggle="dropdown">Gameweek
                          <span class="caret"></span></button>
                      
                          <ul class="dropdown-menu">
                                  @foreach ($gameweeks as $gameweekInst)
                                   <li> <a href="/standings/gameweek/{{$gameweekInst->id}}">Gameweek {{ $gameweekInst->id }} </a></li>
                                  @endforeach
                          </ul>
                 
                     </div> 

                            <br><br>
                           <h2 style="margin:3%"> <strong> Gameweek {{ $gameweek->id }} </strong></h2>
                           <br>
  
                     <div class="standingtable">
                        <table class="table ">
                           <thead>
                              <tr>
                                 <th>Rank</th>
                                 <th>Username</th>
                                 <th>Total</th>
                               </tr>
                           </thead>
                           <tbody> 

                                @foreach ($gameweekUsers  as $userInst)

                                @if($user->username == $userInst->username)

                                 <tr style="background-color:#75A3D1; color:#FFFFFF">
                                    <?php $gameweekUser =$userInst->gameweeks()->where('gameweek_id',$gameweek->id)->first(); ?> 
                                     <td> {{ $gameweekUser->pivot->rank }} </td>
                                     <td> <a href="/users/{{ $userInst->username }}" class="standingtableusermatch">{{ $userInst->username }} </a></td>
                                     <td> {{ $gameweekUser->pivot->score }}</td>
                                  </tr> 

                                  @else

                                 <tr>
                                    <?php $gameweekUser =$userInst->gameweeks()->where('gameweek_id',$gameweek->id)->first(); ?> 
                                     <td> {{ $gameweekUser->pivot->rank }} </td>
                                     <td> <a href="/users/{{ $userInst->username }}" class="standingtableuser">{{ $userInst->username }} </a></td>
                                     <td> {{ $gameweekUser->pivot->score }}</td>
                                  </tr> 
                              @endif 
                                  @endforeach 

                           </tbody>
                        </table>
                    </div>
                    </div>
            </div>
    </div>

@stop


