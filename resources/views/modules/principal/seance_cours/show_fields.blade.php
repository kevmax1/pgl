<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $seanceCour->id !!}</p>
</div>

<!-- Date Seance Field -->
<div class="form-group">
    {!! Form::label('date_seance', 'Date Seance:') !!}
    <p>{!! $seanceCour->date_seance !!}</p>
</div>

<!-- Planing Id Field -->
<div class="form-group">
    {!! Form::label('planing_id', 'Planing Id:') !!}
    <p>{!! $seanceCour->planing_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $seanceCour->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $seanceCour->updated_at !!}</p>
</div>

