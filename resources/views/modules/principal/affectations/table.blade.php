<table class="table table-responsive" id="affectations-table">
    <thead>
        <th>Vacation</th>
        <th>Principal</th>
        <th>Annee Academique Id</th>
        <th>Enseignant Id</th>
        <th>Classe Id</th>
        <th>Matiere Programmer Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($affectations as $affectation)
        <tr>
            <td>{!! $affectation->vacation !!}</td>
            <td>{!! $affectation->principal !!}</td>
            <td>{!! $affectation->annee_academique_id !!}</td>
            <td>{!! $affectation->enseignant_id !!}</td>
            <td>{!! $affectation->classe_id !!}</td>
            <td>{!! $affectation->matiere_programmer_id !!}</td>
            <td>
                {!! Form::open(['route' => ['affectations.destroy', $affectation->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('affectations.show', [$affectation->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('affectations.edit', [$affectation->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>