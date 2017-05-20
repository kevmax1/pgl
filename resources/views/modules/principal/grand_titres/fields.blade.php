<!-- Ordre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ordre', 'Ordre:') !!}
    {!! Form::number('ordre', null, ['class' => 'form-control']) !!}
</div>

<!-- Libelle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('libelle', 'Libelle:') !!}
    {!! Form::text('libelle', null, ['class' => 'form-control']) !!}
</div>

<!-- Terminer Field -->
<div class="form-group col-sm-6">
    {!! Form::label('terminer', 'Terminer:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('terminer', false) !!}
        {!! Form::checkbox('terminer', '1', null) !!} 1
    </label>
</div>

<!-- Chapitre Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('chapitre_id', 'Chapitre Id:') !!}
    {!! Form::number('chapitre_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('grandTitres.index') !!}" class="btn btn-default">Cancel</a>
</div>
