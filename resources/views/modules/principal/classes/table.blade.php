<table class="table table-responsive" id="classes-table">
    <thead>
        <th>Code</th>
        <th>Libelle</th>
        <th>Effectif Normal</th>
        <th>Serie Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($classes as $classe)
        <tr>
            <td>{!! $classe->code !!}</td>
            <td>{!! $classe->libelle !!}</td>
            <td>{!! $classe->effectif_normal !!}</td>
            <td>{!! $classe->serie_id !!}</td>
            <td>
                {!! Form::open(['route' => ['classes.destroy', $classe->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('classes.show', [$classe->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('classes.edit', [$classe->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>