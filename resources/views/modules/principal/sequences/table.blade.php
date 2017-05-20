<table class="table table-responsive" id="sequences-table">
    <thead>
        <th>Libelle Fr</th>
        <th>Libelle En</th>
        <th>Trimestre Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($sequences as $sequence)
        <tr>
            <td>{!! $sequence->libelle_fr !!}</td>
            <td>{!! $sequence->libelle_en !!}</td>
            <td>{!! $sequence->trimestre_id !!}</td>
            <td>
                {!! Form::open(['route' => ['sequences.destroy', $sequence->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('sequences.show', [$sequence->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('sequences.edit', [$sequence->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>