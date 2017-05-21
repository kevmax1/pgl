<table class="table table-responsive" id="jours-table">
    <thead>
        <th>Libelle Fr</th>
        <th>Libelle En</th>
        <th>Ordre</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($jours as $jour)
        <tr>
            <td>{!! $jour->libelle_fr !!}</td>
            <td>{!! $jour->libelle_en !!}</td>
            <td>{!! $jour->ordre !!}</td>
            <td>
                {!! Form::open(['route' => ['jours.destroy', $jour->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('jours.show', [$jour->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('jours.edit', [$jour->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>