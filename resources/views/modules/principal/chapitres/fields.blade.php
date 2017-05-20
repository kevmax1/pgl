<!-- Odre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('odre', 'Odre:') !!}
    {!! Form::number('odre', null, ['class' => 'form-control']) !!}
</div>

<!-- Libelle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('libelle', 'Libelle:') !!}
    {!! Form::text('libelle', null, ['class' => 'form-control']) !!}
</div>

<!-- Nbr Heure Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nbr_heure', 'Nbr Heure:') !!}
    {!! Form::number('nbr_heure', null, ['class' => 'form-control']) !!}
</div>

<!-- Nbr Heure Realiser Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nbr_heure_realiser', 'Nbr Heure Realiser:') !!}
    {!! Form::number('nbr_heure_realiser', null, ['class' => 'form-control']) !!}
</div>

<!-- Terminer Field -->
<div class="form-group col-sm-6">
    {!! Form::label('terminer', 'Terminer:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('terminer', false) !!}
        {!! Form::checkbox('terminer', '1', null) !!} 1
    </label>
</div>

<!-- Matiere Programmer Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('matiere_programmer_id', 'Matiere Programmer Id:') !!}
    {!! Form::number('matiere_programmer_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('chapitres.index') !!}" class="btn btn-default">Cancel</a>
</div>
