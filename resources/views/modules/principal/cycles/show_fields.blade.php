<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $cycle->id !!}</p>
</div>

<!-- Libelle Fr Field -->
<div class="form-group">
    {!! Form::label('libelle_fr', 'Libelle Fr:') !!}
    <p>{!! $cycle->libelle_fr !!}</p>
</div>

<!-- Libelle En Field -->
<div class="form-group">
    {!! Form::label('libelle_en', 'Libelle En:') !!}
    <p>{!! $cycle->libelle_en !!}</p>
</div>

<!-- Section Id Field -->
<div class="form-group">
    {!! Form::label('section_id', 'Section Id:') !!}
    <p>{!! $cycle->section_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $cycle->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $cycle->updated_at !!}</p>
</div>

