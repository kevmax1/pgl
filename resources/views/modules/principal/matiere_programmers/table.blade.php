<table class="table table-responsive" id="matiereProgrammers-table">
    <thead>
        <th>Coef</th>
        <th>Annee Academique Id</th>
        <th>Programme Id</th>
        <th>Groupe Matiere Id</th>
        <th>Matiere Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($matiereProgrammers as $matiereProgrammer)
        <tr>
            <td>{!! $matiereProgrammer->coef !!}</td>
            <td>{!! $matiereProgrammer->annee_academique_id !!}</td>
            <td>{!! $matiereProgrammer->programme_id !!}</td>
            <td>{!! $matiereProgrammer->groupe_matiere_id !!}</td>
            <td>{!! $matiereProgrammer->matiere_id !!}</td>
            <td>
                {!! Form::open(['route' => ['matiereProgrammers.destroy', $matiereProgrammer->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('matiereProgrammers.show', [$matiereProgrammer->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('matiereProgrammers.edit', [$matiereProgrammer->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>