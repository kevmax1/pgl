<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $presence->id !!}</p>
</div>

<!-- Justifier Field -->
<div class="form-group">
    {!! Form::label('justifier', 'Justifier:') !!}
    <p>{!! $presence->justifier !!}</p>
</div>

<!-- Present Field -->
<div class="form-group">
    {!! Form::label('present', 'Present:') !!}
    <p>{!! $presence->present !!}</p>
</div>

<!-- Eleve Id Field -->
<div class="form-group">
    {!! Form::label('eleve_id', 'Eleve Id:') !!}
    <p>{!! $presence->eleve_id !!}</p>
</div>

<!-- Seance Cour Id Field -->
<div class="form-group">
    {!! Form::label('seance_cour_id', 'Seance Cour Id:') !!}
    <p>{!! $presence->seance_cour_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $presence->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $presence->updated_at !!}</p>
</div>

