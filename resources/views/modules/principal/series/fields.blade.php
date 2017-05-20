<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Code:') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Libelle Fr Field -->
<div class="form-group col-sm-6">
    {!! Form::label('libelle_fr', 'Libelle Fr:') !!}
    {!! Form::text('libelle_fr', null, ['class' => 'form-control']) !!}
</div>

<!-- Libelle En Field -->
<div class="form-group col-sm-6">
    {!! Form::label('libelle_en', 'Libelle En:') !!}
    {!! Form::text('libelle_en', null, ['class' => 'form-control']) !!}
</div>

<!-- Niveau Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('niveau_id', 'Niveau Id:') !!}
    {!! Form::number('niveau_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('series.index') !!}" class="btn btn-default">Cancel</a>
</div>
