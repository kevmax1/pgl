<table class="table table-responsive" id="groupeMatieres-table">
    <thead>
        <th>Libelle Fr</th>
        <th>Libelle En</th>
        <th colspan="2">Action</th>
    </thead>
    <tbody>
    @foreach($groupeMatieres as $groupeMatiere)
        <tr>
            <td>{!! $groupeMatiere->libelle_fr !!}</td>
            <td>{!! $groupeMatiere->libelle_en !!}</td>
            <td>
                {!! Form::open(['route' => ['groupeMatieres.destroy', $groupeMatiere->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('groupeMatieres.edit', [$groupeMatiere->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>