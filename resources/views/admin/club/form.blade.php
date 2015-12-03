<div class="form-group">
        {!!Form::label('name','Name:') !!}
        {!!Form::text('name',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
        {!!Form::label('logo_id','Logo:') !!}
        {!! Form::select('logo_id',$pics,null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
        {!!Form::label('fan_pic_id','Fan Pic:') !!}
        {!! Form::select('fan_pic_id',$pics,null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
        {!! Form::submit($submitText,['class'=>'btn btn-primary']) !!}
</div>
