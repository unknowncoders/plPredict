<div class="col-xs-12   col-sm-3 col-md-2 col-lg-2  userinfo  ">
              <img class="img-responsive img-circle" src="{{ URL::asset('image/Soccer.png') }}" alt="coming"></img> 
            
               @if ($user->club)
                    {{ $user->club->fanPic->path }}
                @else
                    {{ \App\Pic::find(1)->path }}
                    @endif

        <strong>  
              <div class="userpara"> <p><strong><a href="{{ url('/users',$user->username) }}" class="userlink">{{ $user->name }}</a></p>
               <p> (<a href="{{ url('/users',$user->username) }}" class="userlink">{{ $user->username }}</a>)</p>
              </div> 
             <hr>

           <p >Club &nbsp<span class="badge user_info"> @if (isset($user->club)){{ $user->club->name }} @else - @endif</span></p>
            <p >Points &nbsp <span class="badge user_info">{{ $user->score }}</span></p>
            <p >Standing &nbsp <span class="badge user_info">{{ $user->rank }}</span></p>
            <p >Badges &nbsp <span class="badge user_info">{{  $user->badges()->count() }}</span></p>
   
          </strong>
</div>


