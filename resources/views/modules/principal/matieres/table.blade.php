<table class="table table-responsive" id="matieres-table">
    <thead>
        <th>Libelle Fr</th>
        <th>Libelle En</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($matieres as $matiere)
        <tr>
            <td>{!! $matiere->libelle_fr !!}</td>
            <td>{!! $matiere->libelle_en !!}</td>
            <td>
                {!! Form::open(['route' => ['matieres.destroy', $matiere->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('matieres.show', [$matiere->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('matieres.edit', [$matiere->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>