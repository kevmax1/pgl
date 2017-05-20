<table class="table table-responsive" id="eleves-table">
    <thead>
        <th>Matricule</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Sexe</th>
        <th>Date Naissance</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($eleves as $eleve)
        <tr>
            <td>{!! $eleve->matricule !!}</td>
            <td>{!! $eleve->nom !!}</td>
            <td>{!! $eleve->prenom !!}</td>
            <td>{!! $eleve->sexe !!}</td>
            <td>{!! $eleve->date_naissance !!}</td>
            <td>
                {!! Form::open(['route' => ['eleves.destroy', $eleve->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('eleves.show', [$eleve->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('eleves.edit', [$eleve->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>