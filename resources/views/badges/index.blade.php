@extends ('layouts.master')

@section ('title')

    Badges

@stop 

@section ('content')


    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 predictinfo ">

            <strong><h1 class="colorwhite">
               Badges   <span class="badge badgespan">  {{ $badges->count() }} </span>
                    </h1>
            </strong>
          
            <hr>
           
            @if (isset($user))

                @foreach ($badges as $badge)

                <div class="col-sm-5 col-md-5 col-lg-3 thumbnail badgesbox">
               
                   {{$badge->icon_path}}
                   
                   @if ($badge->users()->where('user_id',$user->id)->count()!=0)
                      <i class="fa fa-star badgestar"></i>
                    @endif


                 <h3 class="badgetext">     <img class="img-circle" width="70" height="70" src="{{ URL::asset('image/Soccer.png') }}" alt="coming"></img> 
                
                 {{ $badge->name }}

                 </h3>
                   <hr>
                <p class="badgedesription">   {{$badge->description}} </p>

                                    </div>

                @endforeach

            @else

                @foreach ($badges as $badge)

                <div class="col-sm-5 col-md-5 col-lg-3 thumbnail badgesbox">
                   {{$badge->icon_path}} <br>
                   {{$badge->name}} <br>
                   {{$badge->description}} <br>
                </div>

                @endforeach
    
            @endif
        
    </div>

@stop
