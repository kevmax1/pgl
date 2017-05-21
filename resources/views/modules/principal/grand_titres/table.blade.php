<table class="table table-responsive" id="grandTitres-table">
    <thead>
        <th>Ordre</th>
        <th>Libelle</th>
        <th>Terminer</th>
        <th>Chapitre Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($grandTitres as $grandTitre)
        <tr>
            <td>{!! $grandTitre->ordre !!}</td>
            <td>{!! $grandTitre->libelle !!}</td>
            <td>{!! $grandTitre->terminer !!}</td>
            <td>{!! $grandTitre->chapitre_id !!}</td>
            <td>
                {!! Form::open(['route' => ['grandTitres.destroy', $grandTitre->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('grandTitres.show', [$grandTitre->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('grandTitres.edit', [$grandTitre->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>