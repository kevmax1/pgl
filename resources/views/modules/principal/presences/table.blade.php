<table class="table table-responsive" id="presences-table">
    <thead>
        <th>Justifier</th>
        <th>Present</th>
        <th>Eleve Id</th>
        <th>Seance Cour Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($presences as $presence)
        <tr>
            <td>{!! $presence->justifier !!}</td>
            <td>{!! $presence->present !!}</td>
            <td>{!! $presence->eleve_id !!}</td>
            <td>{!! $presence->seance_cour_id !!}</td>
            <td>
                {!! Form::open(['route' => ['presences.destroy', $presence->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('presences.show', [$presence->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('presences.edit', [$presence->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>