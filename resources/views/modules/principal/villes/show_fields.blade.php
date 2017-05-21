<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $ville->id !!}</p>
</div>

<!-- Libelle Fr Field -->
<div class="form-group">
    {!! Form::label('libelle_fr', 'Libelle Fr:') !!}
    <p>{!! $ville->libelle_fr !!}</p>
</div>

<!-- Libelle En Field -->
<div class="form-group">
    {!! Form::label('libelle_en', 'Libelle En:') !!}
    <p>{!! $ville->libelle_en !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $ville->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $ville->updated_at !!}</p>
</div>

