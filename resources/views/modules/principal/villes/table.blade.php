<table class="table table-responsive" id="villes-table">
    <thead>
        <th>Libelle Fr</th>
        <th>Libelle En</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($villes as $ville)
        <tr>
            <td>{!! $ville->libelle_fr !!}</td>
            <td>{!! $ville->libelle_en !!}</td>
            <td>
                {!! Form::open(['route' => ['villes.destroy', $ville->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('villes.show', [$ville->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('villes.edit', [$ville->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>