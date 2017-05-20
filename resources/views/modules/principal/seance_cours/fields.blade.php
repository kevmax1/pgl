<!-- Date Seance Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_seance', 'Date Seance:') !!}
    {!! Form::date('date_seance', null, ['class' => 'form-control']) !!}
</div>

<!-- Planing Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('planing_id', 'Planing Id:') !!}
    {!! Form::number('planing_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('seanceCours.index') !!}" class="btn btn-default">Cancel</a>
</div>
