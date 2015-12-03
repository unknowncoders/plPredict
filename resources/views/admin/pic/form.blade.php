<div class="form-group">
        {!!Form::label('path','Path:') !!}
        {!!Form::text('path',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
        {!! Form::submit($submitText,['class'=>'btn btn-primary']) !!}
</div>
