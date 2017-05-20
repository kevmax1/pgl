<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $composition->id !!}</p>
</div>

<!-- Note Field -->
<div class="form-group">
    {!! Form::label('note', 'Note:') !!}
    <p>{!! $composition->note !!}</p>
</div>

<!-- Evaluation Id Field -->
<div class="form-group">
    {!! Form::label('evaluation_id', 'Evaluation Id:') !!}
    <p>{!! $composition->evaluation_id !!}</p>
</div>

<!-- Eleve Id Field -->
<div class="form-group">
    {!! Form::label('eleve_id', 'Eleve Id:') !!}
    <p>{!! $composition->eleve_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $composition->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $composition->updated_at !!}</p>
</div>

