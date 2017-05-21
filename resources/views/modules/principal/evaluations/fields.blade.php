<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Code:') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Sequence Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sequence_id', 'Sequence Id:') !!}
    {!! Form::number('sequence_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Matiere Programmer Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('matiere_programmer_id', 'Matiere Programmer Id:') !!}
    {!! Form::number('matiere_programmer_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Classe Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('classe_id', 'Classe Id:') !!}
    {!! Form::number('classe_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('evaluations.index') !!}" class="btn btn-default">Cancel</a>
</div>
