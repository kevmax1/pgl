<!-- Vacation Field -->
<div class="form-group col-sm-12">
    {!! Form::label('vacation', 'Vacation:') !!}

</div>

<!-- Annee Academique Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('annee_academique_id', 'Annee Academique Id:') !!}
    {!! Form::number('annee_academique_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Enseignant Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('enseignant_id', 'Enseignant Id:') !!}
    {!! Form::number('enseignant_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Classe Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('classe_id', 'Classe Id:') !!}
    {!! Form::number('classe_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Matiere Programmer Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('matiere_programmer_id', 'Matiere Programmer Id:') !!}
    {!! Form::number('matiere_programmer_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('affectations.index') !!}" class="btn btn-default">Cancel</a>
</div>
