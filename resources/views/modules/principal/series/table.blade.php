<table class="table table-responsive" id="series-table">
    <thead>
        <th>Code</th>
        <th>Libelle Fr</th>
        <th>Libelle En</th>
        <th>Niveau Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($series as $serie)
        <tr>
            <td>{!! $serie->code !!}</td>
            <td>{!! $serie->libelle_fr !!}</td>
            <td>{!! $serie->libelle_en !!}</td>
            <td>{!! $serie->niveau_id !!}</td>
            <td>
                {!! Form::open(['route' => ['series.destroy', $serie->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('series.show', [$serie->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('series.edit', [$serie->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>