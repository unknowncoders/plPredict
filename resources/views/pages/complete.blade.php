@extends('layouts.master')

@section('title')
    Complete your profile
@stop

@section('content')

    <h3> Complete your registration </h3>

    

    <div>
            {!! Form::open(['url'=>'complete']) !!}

                <div>
                        {!! Form::label('username','Username:') !!}
                        {!! Form::text('username',null,[]) !!}
                </div>

                <div>
                        {!! Form::label('password','Password:') !!}
                        {!! Form::password('password',null,[]) !!}
                </div>

                <div>
                        {!! Form::select('club_id',$clubs,null,[]) !!}
                </div>

                <div>
                        {!! Form::submit('Done',[]) !!}
                </div>

            {!! Form::close() !!}

            @if(count($errors)>0) 
              @foreach($errors->all() as $error) 
                    {{ $error }}
                @endforeach
            @endif



    </div>

    
@stop



