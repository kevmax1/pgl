<!-- Justifier Field -->
<div class="form-group col-sm-6">
    {!! Form::label('justifier', 'Justifier:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('justifier', false) !!}
        {!! Form::checkbox('justifier', '1', null) !!} 1
    </label>
</div>

<!-- Present Field -->
<div class="form-group col-sm-6">
    {!! Form::label('present', 'Present:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('present', false) !!}
        {!! Form::checkbox('present', '1', null) !!} 1
    </label>
</div>

<!-- Eleve Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('eleve_id', 'Eleve Id:') !!}
    {!! Form::number('eleve_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Seance Cour Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('seance_cour_id', 'Seance Cour Id:') !!}
    {!! Form::number('seance_cour_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('presences.index') !!}" class="btn btn-default">Cancel</a>
</div>
