<table class="table table-responsive" id="planings-table">
    <thead>
        <th>Matiere Programmer Id</th>
        <th>Jour Id</th>
        <th>Plage Horaire Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($planings as $planing)
        <tr>
            <td>{!! $planing->matiere_programmer_id !!}</td>
            <td>{!! $planing->jour_id !!}</td>
            <td>{!! $planing->plage_horaire_id !!}</td>
            <td>
                {!! Form::open(['route' => ['planings.destroy', $planing->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('planings.show', [$planing->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('planings.edit', [$planing->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>