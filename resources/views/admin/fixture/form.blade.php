<div class="form-group">
        {!!Form::label('home_club_id','Home Club:') !!}
        {!!Form::select('home_club_id',$clubs,null,['class'=>'form-control']) !!}

        {!!Form::label('home_score','Home Score:') !!}
        {!!Form::text('home_score',null,['class'=>'form-control']) !!}

        {!!Form::label('away_score','Away Score:') !!}
        {!!Form::text('away_score',null,['class'=>'form-control']) !!}

        {!!Form::label('away_club_id','Away Club:') !!}
        {!!Form::select('away_club_id',$clubs,null,['class'=>'form-control']) !!}

        {!!Form::label('gameweek_id','Gameweek:') !!}
        {!!Form::text('gameweek_id',$gameweekId,['class'=>'form-control']) !!}

        {!!Form::label('kickoff','Kickoff:') !!}
        {!!Form::text('kickoff',null,['class'=>'form-control','placeholder'=>'0000-00-00 00:00:00']) !!}
        
</div>


<div class="form-group">
        {!! Form::submit($submitText,['class'=>'btn btn-primary']) !!}
</div>
