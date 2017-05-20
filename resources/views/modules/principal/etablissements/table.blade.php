<table class="table table-responsive" id="etablissements-table">
    <thead>
        <th>Nom</th>
        <th>Devise</th>
        <th>Adresse</th>
        <th>Logo</th>
        <th>Ville Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($etablissements as $etablissement)
        <tr>
            <td>{!! $etablissement->nom !!}</td>
            <td>{!! $etablissement->devise !!}</td>
            <td>{!! $etablissement->adresse !!}</td>
            <td>{!! $etablissement->logo !!}</td>
            <td>{!! $etablissement->ville_id !!}</td>
            <td>
                {!! Form::open(['route' => ['etablissements.destroy', $etablissement->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('etablissements.show', [$etablissement->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('etablissements.edit', [$etablissement->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>