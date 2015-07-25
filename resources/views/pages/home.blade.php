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
                
                <div id="form-container">
                    {!! Form::open(['url'=>'predictions']) !!}
                        @foreach ($gw->fixtures as $fxt)


                            <div>
                                    @if ($fxt->isClosed())
                                        <div style="border: 1px solid black; width: 400px; padding: 10px;">
                                                <div style="float:left; width:150px;">
                                                        {{ $fxt->homeClub->name }} 
                                                        <br>
                                                        {{ $fxt->awayClub->name }}
                                                </div>

                                                <div style="float:left; width: 50px;">
                                                        @if ($fxt->predictions->count() != 0)
                                                            {{ $fxt->predictions[0]->home_score }} <br> {{ $fxt->predictions[0]->away_score }}                                
                                                        @else
                                                            - <br> - 
                                                        @endif
                                                </div>

                                                <div style="float:left;background-color: #4488ff; width: 50px;">
                                                        @if ($fxt->isOver())
                                                            {{ $fxt->home_score }} <br> {{ $fxt->away_score }}
                                                        @endif
                                                </div>

                                                <div style="float:left; background-color: #88bbff; width: 50px;">
                                                        @if ($fxt->isOver())
                                                            @if ($fxt->predictions->count()!=0)
                                                                {{ $fxt->predictions[0]->score() }}
                                                            @else
                                                                -
                                                            @endif
                                                        @endif
                                                </div>
                                                <!--Dummy div to clear the float -->
                                                <div style="clear:left"></div>

                                        </div>

                                    @else
                                        <?php if( $fxt->predictions->count()==0){
                                                  $p_home_score = 0;
                                                  $p_away_score = 0;
                                                  $hasPrediction = false;
                                                }else{
                                                  $p_home_score = $fxt->predictions[0]->home_score;
                                                  $p_away_score = $fxt->predictions[0]->away_score;
                                                  $hasPrediction = true;
                                                }
                                        ?>

                                            @include ('partials.predict_form',['hasPrediction'=>$hasPrediction,'p_home_score'=>$p_home_score,'p_away_score'=>$p_away_score])
                                    @endif

                            </div>
                            <br>
                        @endforeach
                    {!! Form::submit('Save',[]) !!}

                    {!! Form::close() !!}
                </div>
                
        </div>

    @endforeach

@stop
