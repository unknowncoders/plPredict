         <div class="col-xs-12 col-sm-4 col-lg-3 userinfo ">
          
              <img class="img-responsive img-circle"src="image/Soccer.png" alt="coming"></img> 
           
             <div class="userpara"> <p><strong><a href="{{ url('/users',$profUser->username) }}" class="userlink">{{ $profUser->name }}</a></p>   
             <p>(<a href="{{ url('/users',$profUser->username) }}" class="userlink">{{ $profUser->username }}</a>)</p>

           </div>     

           <hr>
           <p >Club &nbsp<span class="badge user_info">{{ $profUser->club->name }} </span></p>
           <p >Points &nbsp <span class="badge user_info">{{ $profUser->score }}</span> </p>
           <p >Standing &nbsp <span class="badge user_info">{{ $profUser->rank }}</span></p>
           <p >Badges &nbsp <span class="badge user_info">{{  $profUser->badges()->count() }}</span> </p> 

           </strong> 
           
            {{ $profUser->club->fanPic->path }}
        </div>


