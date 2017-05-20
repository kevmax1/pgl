<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', 'Nom:') !!}
    {!! Form::text('nom', null, ['class' => 'form-control']) !!}
</div>

<!-- Prenom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prenom', 'Prenom:') !!}
    {!! Form::text('prenom', null, ['class' => 'form-control']) !!}
</div>

<!-- Adresse Field -->
<div class="form-group col-sm-6">
    {!! Form::label('adresse', 'Adresse:') !!}
    {!! Form::text('adresse', null, ['class' => 'form-control']) !!}
</div>

<!-- Telphone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telphone', 'Telphone:') !!}
    {!! Form::text('telphone', null, ['class' => 'form-control']) !!}
</div>

<!-- Eleve Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('eleve_id', 'Eleve Id:') !!}
    {!! Form::number('eleve_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('parents.index') !!}" class="btn btn-default">Cancel</a>
</div>
