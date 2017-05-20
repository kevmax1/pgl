<table class="table table-responsive" id="compositions-table">
    <thead>
        <th>Note</th>
        <th>Evaluation Id</th>
        <th>Eleve Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($compositions as $composition)
        <tr>
            <td>{!! $composition->note !!}</td>
            <td>{!! $composition->evaluation_id !!}</td>
            <td>{!! $composition->eleve_id !!}</td>
            <td>
                {!! Form::open(['route' => ['compositions.destroy', $composition->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('compositions.show', [$composition->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('compositions.edit', [$composition->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>