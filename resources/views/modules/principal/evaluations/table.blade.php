<table class="table table-responsive" id="evaluations-table">
    <thead>
        <th>Code</th>
        <th>Sequence Id</th>
        <th>Matiere Programmer Id</th>
        <th>Classe Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($evaluations as $evaluation)
        <tr>
            <td>{!! $evaluation->code !!}</td>
            <td>{!! $evaluation->sequence_id !!}</td>
            <td>{!! $evaluation->matiere_programmer_id !!}</td>
            <td>{!! $evaluation->classe_id !!}</td>
            <td>
                {!! Form::open(['route' => ['evaluations.destroy', $evaluation->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('evaluations.show', [$evaluation->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('evaluations.edit', [$evaluation->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>