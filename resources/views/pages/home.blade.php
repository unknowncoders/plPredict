@extends('layouts.master')

@section('title')
    Predict
@stop

@section('content')

    @include('partials.profbox')

<div class ="col-xs-12 col-sm-8 col-lg-9 col-md-9 thumbnail gameweekbox">

<ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#current" class="showtabs"> Gameweek {{ $gws[0]->id }}</a></li>
    @if(count($gws)===2)    
     <li><a data-toggle="tab" href="#next" class="showtabs"> Gameweek {{ $gws[1]->id }}</a></li>
      @endif 
</ul>
 
    <div class="tab-content">
       
        <div id="current" class="tab-pane active">


           <br><br>

                    {!! Form::open(['url'=>'predictions']) !!}
                                        
                        @foreach ($gws[0]->fixtures as $fxt)
                             <div class="col-md-12 col-sm-12 col-lg-5 thumbnail gameweekpredictbox "> 
                                    @if ($fxt->isClosed())

                                        @if ($gws[0]->boostId == $fxt->id) 
                                            <span class="colorred"> Boosted!! </span>
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
    
                                <div class="col-xs-12" >
                                        @if(!$gws[0]->boostedClosed)

                                            <div  class="col-xs-1" class="boost">
                                                    <label for="boost_id" >Boost</label>
                                            </div>
                                            <div class="col-xs-9" class="boostfield">
                                                    <select class="form-control boostfield" id="boost_id" name="boost_id">
                                                        @foreach($gws[0]->fixtures()->open()->get() as $cfxt)
                                                        <option value="{{ $cfxt->id }}" <?php if($gws[0]->boostId == $cfxt->id){echo "selected";}?>>
                                                                {!!$cfxt->homeClub->name!!} &nbsp vs &nbsp {!!$cfxt->awayClub->name!!}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                @endif
                                
                                 <div class="col-xs-1 predictsave">
                                        {!! Form::submit('Save',['class'=>'predictsubmit']) !!}
                                 </div>
                                
                                </div>
                                
                                <br>               
                    {!! Form::close() !!}
        </div> 

      <div id="next" class="tab-pane fade">

<br><br>
            @if(count($gws)===2)

                    {!! Form::open(['url'=>'predictions']) !!}
                                        
                        @foreach ($gws[1]->fixtures as $fxt)
                             <div class="col-md-12 col-sm-12 col-lg-5 thumbnail gameweekpredictbox "> 
                                    @if ($fxt->isClosed())

                                        @if ($gws[1]->boostId == $fxt->id) 
                                            <span class="colorred"> Boosted!! </span>
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
    
                                <div class="col-xs-12" >
                                        @if(!$gws[1]->boostedClosed)

                                            <div  class="col-xs-1" class="boost">
                                                    <label for="boost_id" >Boost</label>
                                            </div>
                                            <div class="col-xs-9" class="boostfield">
                                                    <select class="form-control boostfield" id="boost_id" name="boost_id">
                                                        @foreach($gws[1]->fixtures()->open()->get() as $cfxt)
                                                        <option value="{{ $cfxt->id }}" <?php if($gws[1]->boostId == $cfxt->id){echo "selected";}?>>
                                                                {!!$cfxt->homeClub->name!!} &nbsp vs &nbsp {!!$cfxt->awayClub->name!!}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                @endif
                                
                                 <div class="col-xs-1 predictsave">
                                        {!! Form::submit('Save',['class'=>'predictsubmit']) !!}
                                 </div>
                                
                                </div>
                                
                                <br>               
                    {!! Form::close() !!}
             
            @endif 
       </div>

   </div> 
 
</div>
@stop
