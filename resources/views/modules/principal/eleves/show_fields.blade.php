<!-- Matricule Field -->
<div class="form-group">
    {!! Form::label('matricule', 'Matricule:') !!}
    <p><strong>{!! $eleve->matricule !!}</strong></p>
</div>

<!-- Nom Field -->
<div class="form-group">
    {!! Form::label('nom', 'Nom:') !!}
    <p><strong>{!! $eleve->nom !!}</strong></p>
</div>

<!-- Prenom Field -->
<div class="form-group">
    {!! Form::label('prenom', 'Prenom:') !!}
    <p><strong>{!! $eleve->prenom !!}</strong></p>
</div>

<!-- Sexe Field -->
<div class="form-group">
    {!! Form::label('sexe', 'Sexe:') !!}
    <p><strong>{!! $eleve->sexe->libelle_fr !!}</strong></p>
</div>

<!-- Date Naissance Field -->
<div class="form-group">
    {!! Form::label('date_naissance', 'Date de Naissance:') !!}
    <p><strong>{!! Carbon\Carbon::parse($eleve->date_naissance)->format('d-m-Y') !!}</strong></p>
</div>
