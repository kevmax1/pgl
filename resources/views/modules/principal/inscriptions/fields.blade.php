<!-- Date Inscription Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_inscription', 'Date Inscription:') !!}
    {!! Form::date('date_inscription', null, ['class' => 'form-control']) !!}
</div>

<!-- Annee Academique Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('annee_academique_id', 'Annee Academique Id:') !!}
    {!! Form::number('annee_academique_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Niveau Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('niveau_id', 'Niveau Id:') !!}
    {!! Form::number('niveau_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Eleve Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('eleve_id', 'Eleve Id:') !!}
    {!! Form::number('eleve_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('inscriptions.index') !!}" class="btn btn-default">Cancel</a>
</div>
