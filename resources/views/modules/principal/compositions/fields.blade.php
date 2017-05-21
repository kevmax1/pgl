<!-- Note Field -->
<div class="form-group col-sm-6">
    {!! Form::label('note', 'Note:') !!}
    {!! Form::text('note', null, ['class' => 'form-control']) !!}
</div>

<!-- Evaluation Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('evaluation_id', 'Evaluation Id:') !!}
    {!! Form::number('evaluation_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Eleve Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('eleve_id', 'Eleve Id:') !!}
    {!! Form::number('eleve_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('compositions.index') !!}" class="btn btn-default">Cancel</a>
</div>
