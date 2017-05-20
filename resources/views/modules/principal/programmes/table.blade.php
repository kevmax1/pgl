<table class="table table-responsive" id="programmes-table">
    <thead>
        <th>Libelle Fr</th>
        <th>Libelle En</th>
        <th>Serie Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($programmes as $programme)
        <tr>
            <td>{!! $programme->libelle_fr !!}</td>
            <td>{!! $programme->libelle_en !!}</td>
            <td>{!! $programme->serie_id !!}</td>
            <td>
                {!! Form::open(['route' => ['programmes.destroy', $programme->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('programmes.show', [$programme->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('programmes.edit', [$programme->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>