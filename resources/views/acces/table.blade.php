<table class="table table-responsive" id="acces-table">
    <thead>
        <th>Role Id</th>
        <th>Menu Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($acces as $acces)
        <tr>
            <td>{!! $acces->role_id !!}</td>
            <td>{!! $acces->menu_id !!}</td>
            <td>
                {!! Form::open(['route' => ['acces.destroy', $acces->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('acces.show', [$acces->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('acces.edit', [$acces->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>