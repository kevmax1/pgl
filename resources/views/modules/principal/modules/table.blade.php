<table class="table table-responsive" id="modules-table">
    <thead>
        <th>Libelle</th>
        <th>Couleur</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($modules as $module)
        <tr>
            <td>{!! $module->libelle !!}</td>
            <td>{!! $module->couleur !!}</td>
            <td>
                {!! Form::open(['route' => ['modules.destroy', $module->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('modules.show', [$module->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('modules.edit', [$module->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>