<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $inscription->id !!}</p>
</div>

<!-- Date Inscription Field -->
<div class="form-group">
    {!! Form::label('date_inscription', 'Date Inscription:') !!}
    <p>{!! $inscription->date_inscription !!}</p>
</div>

<!-- Annee Academique Id Field -->
<div class="form-group">
    {!! Form::label('annee_academique_id', 'Annee Academique Id:') !!}
    <p>{!! $inscription->annee_academique_id !!}</p>
</div>

<!-- Niveau Id Field -->
<div class="form-group">
    {!! Form::label('niveau_id', 'Niveau Id:') !!}
    <p>{!! $inscription->niveau_id !!}</p>
</div>

<!-- Eleve Id Field -->
<div class="form-group">
    {!! Form::label('eleve_id', 'Eleve Id:') !!}
    <p>{!! $inscription->eleve_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $inscription->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $inscription->updated_at !!}</p>
</div>

