<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $titre->id !!}</p>
</div>

<!-- Ordre Field -->
<div class="form-group">
    {!! Form::label('ordre', 'Ordre:') !!}
    <p>{!! $titre->ordre !!}</p>
</div>

<!-- Libelle Field -->
<div class="form-group">
    {!! Form::label('libelle', 'Libelle:') !!}
    <p>{!! $titre->libelle !!}</p>
</div>

<!-- Grand Titre Id Field -->
<div class="form-group">
    {!! Form::label('grand_titre_id', 'Grand Titre Id:') !!}
    <p>{!! $titre->grand_titre_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $titre->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $titre->updated_at !!}</p>
</div>

