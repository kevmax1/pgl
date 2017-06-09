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

<!-- Section Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('section_id', 'Section:') !!}
    {!! Form::select('section_id', $section, isset($cycle) ? $cycle->section_id : null,['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('cycles.index') !!}" class="btn btn-default">Cancel</a>
</div>
