                                                

       <p class="predictname">{!! Form::label('home_score',$fxt->homeClub->name) !!}</p>
        <input type="number" max="9" min="0" name="home_score[]" value="{!!$p_home_score!!}" class="predicttextarea"/>
 
   <p class="predicttextshow">  @if ($hasPrediction)
             {!!$p_home_score!!}
             @else -
        @endif   </p>

        <br><br>
           
         <input type="number" max="9" min="0" name="away_score[]" value="{!!$p_away_score!!}" class="predicttextarea"/>
 
          <p class="predicttextshow">  @if ($hasPrediction)
                     {!!$p_away_score!!}
               @else -
               @endif
          </p>
                  
        <p class="predictname">{!! Form::label('away_score',$fxt->awayClub->name) !!}</p>
       
         {!! Form::hidden('fix_id[]',$fxt->id) !!}


