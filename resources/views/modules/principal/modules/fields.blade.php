<!-- Libelle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('libelle', 'Libelle:') !!}
    {!! Form::text('libelle', null, ['class' => 'form-control']) !!}
</div>

<!-- Couleur Field -->
<div class="form-group col-sm-6">
    {!! Form::label('couleur', 'Couleur:') !!}
    {!! Form::text('couleur', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('modules.index') !!}" class="btn btn-default">Cancel</a>
</div>
