@extends('layouts.master')

@section('title')
    Complete your profile
@stop

@section('content')

   <br><br><br><br><br>
 
   <div class="row">
   <div class="col-lg-12 text-center">
   <br><br><br>

             <div style="color:#D9411E;font-size:5vw;">Complete your registration</div>
    </div>
    </div>
    <br><br><br>

         
         <div class="col-sm-6 registrationborder" id="registrationmargin">

            {!! Form::open(['url'=>'complete']) !!}

                <div class="input-group">
                <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user"></i></span>
                     {!! Form::text('username',null,['placeholder'=>'Enter your Username', 'class'=>'form-control',  'aria-describedby'=>'sizing-addon1']) !!}
                </div>

                <!--div class="input-group">
                <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-key"></i></span>
                     {!! Form::password('password',['placeholder'=>'Enter your Password', 'class'=>'form-control',  'aria-describedby'=>'sizing-addon1']) !!}
                </div-->

                <div class="input-group">
                <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-heartbeat"></i></span>
                        {!! Form::select('club_id',$clubs,null,['class'=>'form-control','aria-describedby'=>'sizing-addon1']) !!}
                </div>

                <div>
                        {!! Form::submit('Done',['class'=>'registrationsubmitbutton']) !!}
                </div>

            {!! Form::close() !!}

            @if(count($errors)>0) 
              @foreach($errors->all() as $error) 
                    {{ $error }}
                @endforeach
            @endif

       </div>
@stop



