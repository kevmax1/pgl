<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $programme->id !!}</p>
</div>

<!-- Libelle Fr Field -->
<div class="form-group">
    {!! Form::label('libelle_fr', 'Libelle Fr:') !!}
    <p>{!! $programme->libelle_fr !!}</p>
</div>

<!-- Libelle En Field -->
<div class="form-group">
    {!! Form::label('libelle_en', 'Libelle En:') !!}
    <p>{!! $programme->libelle_en !!}</p>
</div>

<!-- Serie Id Field -->
<div class="form-group">
    {!! Form::label('serie_id', 'Serie Id:') !!}
    <p>{!! $programme->serie_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $programme->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $programme->updated_at !!}</p>
</div>

