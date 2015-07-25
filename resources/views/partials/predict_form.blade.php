                                                

<div style="width:400px; padding: 10px;">

    <div style="float:left; width:300px;">
        {!! Form::label('home_score',$fxt->homeClub->name) !!}
             <input type="number" max="9" min="0" name="home_score[]" value="{!!$p_home_score!!}"/>
        <br>
        {!! Form::label('away_score',$fxt->awayClub->name) !!}
            <input type="number" max="9" min="0" name="away_score[]" value="{!!$p_away_score!!}" />
        {!! Form::hidden('fix_id[]',$fxt->id) !!}
    </div>

    @if ($hasPrediction)
    <div style="float:left; width: 50px; background-color: #77ee99">
        Saved
    </div>
    @endif

    <div style="clear:left"></div>

</div>
