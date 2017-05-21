<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $planing->id !!}</p>
</div>

<!-- Matiere Programmer Id Field -->
<div class="form-group">
    {!! Form::label('matiere_programmer_id', 'Matiere Programmer Id:') !!}
    <p>{!! $planing->matiere_programmer_id !!}</p>
</div>

<!-- Jour Id Field -->
<div class="form-group">
    {!! Form::label('jour_id', 'Jour Id:') !!}
    <p>{!! $planing->jour_id !!}</p>
</div>

<!-- Plage Horaire Id Field -->
<div class="form-group">
    {!! Form::label('plage_horaire_id', 'Plage Horaire Id:') !!}
    <p>{!! $planing->plage_horaire_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $planing->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $planing->updated_at !!}</p>
</div>

