<!-- Coef Field -->
<div class="form-group col-sm-6">
    {!! Form::label('coef', 'Coef:') !!}
    {!! Form::number('coef', null, ['class' => 'form-control']) !!}
</div>

<!-- Annee Academique Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('annee_academique_id', 'Annee Academique Id:') !!}
    {!! Form::number('annee_academique_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Programme Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('programme_id', 'Programme Id:') !!}
    {!! Form::number('programme_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Groupe Matiere Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('groupe_matiere_id', 'Groupe Matiere Id:') !!}
    {!! Form::number('groupe_matiere_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Matiere Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('matiere_id', 'Matiere Id:') !!}
    {!! Form::number('matiere_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('matiereProgrammers.index') !!}" class="btn btn-default">Cancel</a>
</div>
