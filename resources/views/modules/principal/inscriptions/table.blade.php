<table class="table table-responsive" id="inscriptions-table">
    <thead>
        <th>Date Inscription</th>
        <th>Annee Academique Id</th>
        <th>Niveau Id</th>
        <th>Eleve Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($inscriptions as $inscription)
        <tr>
            <td>{!! $inscription->date_inscription !!}</td>
            <td>{!! $inscription->annee_academique_id !!}</td>
            <td>{!! $inscription->niveau_id !!}</td>
            <td>{!! $inscription->eleve_id !!}</td>
            <td>
                {!! Form::open(['route' => ['inscriptions.destroy', $inscription->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('inscriptions.show', [$inscription->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('inscriptions.edit', [$inscription->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>