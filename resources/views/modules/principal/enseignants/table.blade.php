<table class="table table-responsive" id="enseignants-table">
    <thead>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Adresse</th>
        <th>Email</th>
        <th>User Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($enseignants as $enseignant)
        <tr>
            <td>{!! $enseignant->nom !!}</td>
            <td>{!! $enseignant->prenom !!}</td>
            <td>{!! $enseignant->adresse !!}</td>
            <td>{!! $enseignant->email !!}</td>
            <td>{!! $enseignant->user_id !!}</td>
            <td>
                {!! Form::open(['route' => ['enseignants.destroy', $enseignant->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('enseignants.show', [$enseignant->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('enseignants.edit', [$enseignant->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>