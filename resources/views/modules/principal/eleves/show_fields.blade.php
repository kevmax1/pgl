<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $eleve->id !!}</p>
</div>

<!-- Matricule Field -->
<div class="form-group">
    {!! Form::label('matricule', 'Matricule:') !!}
    <p>{!! $eleve->matricule !!}</p>
</div>

<!-- Nom Field -->
<div class="form-group">
    {!! Form::label('nom', 'Nom:') !!}
    <p>{!! $eleve->nom !!}</p>
</div>

<!-- Prenom Field -->
<div class="form-group">
    {!! Form::label('prenom', 'Prenom:') !!}
    <p>{!! $eleve->prenom !!}</p>
</div>

<!-- Sexe Field -->
<div class="form-group">
    {!! Form::label('sexe', 'Sexe:') !!}
    <p>{!! $eleve->sexe !!}</p>
</div>

<!-- Date Naissance Field -->
<div class="form-group">
    {!! Form::label('date_naissance', 'Date Naissance:') !!}
    <p>{!! $eleve->date_naissance !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $eleve->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $eleve->updated_at !!}</p>
</div>

