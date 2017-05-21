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

<!-- Pause Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pause', 'Pause:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('pause', false) !!}
        {!! Form::checkbox('pause', '1', null) !!} 1
    </label>
</div>

<!-- Nbr Heure Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nbr_heure', 'Nbr Heure:') !!}
    {!! Form::number('nbr_heure', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('plageHoraires.index') !!}" class="btn btn-default">Cancel</a>
</div>
