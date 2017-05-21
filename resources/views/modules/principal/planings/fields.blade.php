<!-- Matiere Programmer Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('matiere_programmer_id', 'Matiere Programmer Id:') !!}
    {!! Form::number('matiere_programmer_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Jour Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jour_id', 'Jour Id:') !!}
    {!! Form::number('jour_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Plage Horaire Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('plage_horaire_id', 'Plage Horaire Id:') !!}
    {!! Form::number('plage_horaire_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('planings.index') !!}" class="btn btn-default">Cancel</a>
</div>
