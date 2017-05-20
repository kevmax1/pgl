<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $sequence->id !!}</p>
</div>

<!-- Libelle Fr Field -->
<div class="form-group">
    {!! Form::label('libelle_fr', 'Libelle Fr:') !!}
    <p>{!! $sequence->libelle_fr !!}</p>
</div>

<!-- Libelle En Field -->
<div class="form-group">
    {!! Form::label('libelle_en', 'Libelle En:') !!}
    <p>{!! $sequence->libelle_en !!}</p>
</div>

<!-- Trimestre Id Field -->
<div class="form-group">
    {!! Form::label('trimestre_id', 'Trimestre Id:') !!}
    <p>{!! $sequence->trimestre_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $sequence->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $sequence->updated_at !!}</p>
</div>

