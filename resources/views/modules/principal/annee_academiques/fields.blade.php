<!-- Libelle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('libelle', 'Libelle:') !!}
    {!! Form::text('libelle', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Debut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_debut', 'Date Debut:') !!}
    {!! Form::date('date_debut', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Fin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_fin', 'Date Fin:') !!}
    {!! Form::date('date_fin', null, ['class' => 'form-control']) !!}
</div>

<!-- Encours Field -->
<div class="form-group col-sm-12">
    {!! Form::label('encours', 'Encours:') !!}

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('anneeAcademiques.index') !!}" class="btn btn-default">Cancel</a>
</div>
