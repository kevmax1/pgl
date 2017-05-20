<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $jour->id !!}</p>
</div>

<!-- Libelle Fr Field -->
<div class="form-group">
    {!! Form::label('libelle_fr', 'Libelle Fr:') !!}
    <p>{!! $jour->libelle_fr !!}</p>
</div>

<!-- Libelle En Field -->
<div class="form-group">
    {!! Form::label('libelle_en', 'Libelle En:') !!}
    <p>{!! $jour->libelle_en !!}</p>
</div>

<!-- Ordre Field -->
<div class="form-group">
    {!! Form::label('ordre', 'Ordre:') !!}
    <p>{!! $jour->ordre !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $jour->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $jour->updated_at !!}</p>
</div>

