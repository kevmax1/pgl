<!-- Ordre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ordre', 'Ordre:') !!}
    {!! Form::number('ordre', null, ['class' => 'form-control']) !!}
</div>

<!-- Libelle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('libelle', 'Libelle:') !!}
    {!! Form::text('libelle', null, ['class' => 'form-control']) !!}
</div>

<!-- Grand Titre Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grand_titre_id', 'Grand Titre Id:') !!}
    {!! Form::number('grand_titre_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('titres.index') !!}" class="btn btn-default">Cancel</a>
</div>
