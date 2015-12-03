<div class="form-group">
        {!!Form::label('name','Name:') !!}
        {!!Form::text('name',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
        {!!Form::label('description','Description:') !!}
        {!!Form::text('description',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
        {!!Form::label('icon_path','Icon Path:') !!}
        {!!Form::text('icon_path',$defaultPath,['class'=>'form-control']) !!}
</div>

<div class="form-group">
        {!! Form::submit($submitText,['class'=>'btn btn-primary']) !!}
</div>
