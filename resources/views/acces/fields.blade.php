<!-- Role Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('role_id', 'Role Id:') !!}
    {!! Form::number('role_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Menu Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('menu_id', 'Menu Id:') !!}
    {!! Form::number('menu_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('acces.index') !!}" class="btn btn-default">Cancel</a>
</div>
