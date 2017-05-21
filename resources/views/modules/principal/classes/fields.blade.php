<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Code:') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Libelle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('libelle', 'Libelle:') !!}
    {!! Form::text('libelle', null, ['class' => 'form-control']) !!}
</div>

<!-- Effectif Normal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('effectif_normal', 'Effectif Normal:') !!}
    {!! Form::number('effectif_normal', null, ['class' => 'form-control']) !!}
</div>

<!-- Serie Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('serie_id', 'Serie Id:') !!}
    {!! Form::number('serie_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('classes.index') !!}" class="btn btn-default">Cancel</a>
</div>
