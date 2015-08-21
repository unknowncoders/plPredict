@extends('layouts.master')

@section('title')
    Predict
@stop

@section('content')

    @include('partials.profbox')


    @foreach ($gws as $gw)
        
        <div class="col-xs-12  col-sm-8 col-md-9 col-lg-9 predictinfo ">


           <strong>  <h1 class="colorwhite">Gameweek {{ $gw->id }}  </h1> </strong>
            <hr>
                <br>
                    {!! Form::open(['url'=>'predictions']) !!}
                                        
                        @foreach ($gw->fixtures as $fxt)
                             <div class="col-md-12 col-sm-12 col-lg-5 thumbnail predictbox "> 
                                    @if ($fxt->isClosed())

                                        @if ($gw->boostId == $fxt->id) 
                                            <span> Boosted!! </span>
                                        @endif
                                    
                                      <span class="badge predictscore">
                                        @if ($fxt->isOver())
                                            @if ($fxt->predictions->count()!=0)
                                                {{ $fxt->predictions[0]->score() }}
                                            @else
                                                -
                                                @endif
                                        @else
                                            -
                                        @endif
                                     </span>
                                    <br><br>
                                     <p>  {{ $fxt->homeClub->name }} </p>
                                    
                                        
                                         <p class="predictdata"> 

                                         @if ($fxt->predictions->count() != 0)
                                                 {{ $fxt->predictions[0]->home_score }}
                                             @else
                                               - 
                                              @endif
                                       </p>
         
                                       <p class="predictresult">

                                       @if ($fxt->isOver())
                                            {{ $fxt->home_score }} 
                                       @else
                                            -
                                         @endif
                                      </p>
                                          <br><br> 
                                     <p class="predictdata">
                                        @if ($fxt->predictions->count() != 0)
                                            {{ $fxt->predictions[0]->away_score }}                                
                                        @else
                                              - 
                                        @endif
                                  
                                     </p>
                                    
                                     <p class="predictresult">
                                     @if ($fxt->isOver())
                                            {{ $fxt->away_score }}
                                            
                                             @else
                                            -
                                        @endif
                              
                                     </p> 
                                    <p class="predictname">  {{ $fxt->awayClub->name }} </p>

                                    @else
                                        <?php if( $fxt->predictions->count()==0){
                                                  $p_home_score = 0;
                                                  $p_away_score = 0;
                                                  $hasPrediction = false;
                                                }else{
                                                  $p_home_score = $fxt->predictions[0]->home_score;
                                                  $p_away_score = $fxt->predictions[0]->away_score;
                                                  $hasPrediction = true; }
                                        ?>

                                            @include ('partials.predict_form',['hasPrediction'=>$hasPrediction,'p_home_score'=>$p_home_score,'p_away_score'=>$p_away_score])
                                    @endif

                                </div>
                            @endforeach
                            <div class="col-sm-12">

                                <div class="col-xs-9">
                                        @if(!$gw->boostedClosed)
                                            <div style="font-size: 1.1em; text-align: right;" class="col-xs-4 colorwhite">
                                                    <label for="boost_id">Boost:</label>
                                            </div>
                                            <div class="col-xs-8">
                                                    <select class="form-control" id="boost_id" name="boost_id">
                                                        @foreach($gw->fixtures()->open()->get() as $cfxt)
                                                        <option value="{{ $cfxt->id }}" <?php if($gw->boostId == $cfxt->id){echo "selected";}?>>
                                                                {!!$cfxt->homeClub->name!!} &nbsp vs &nbsp {!!$cfxt->awayClub->name!!}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                        @endif
                                </div>
                                <div class="col-xs-3">
                                        {!! Form::submit('Save',['class'=>'predictsubmit']) !!}
                                </div>
                                <br>               
                            </div>
                    {!! Form::close() !!}
        </div>
        @endforeach

@stop
