<table class="table table-responsive" id="anneeAcademiques-table">
    <thead>
        <th>Libelle</th>
        <th>Date Debut</th>
        <th>Date Fin</th>
        <th>Encours</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($anneeAcademiques as $anneeAcademique)
        <tr>
            <td>{!! $anneeAcademique->libelle !!}</td>
            <td>{!! $anneeAcademique->date_debut !!}</td>
            <td>{!! $anneeAcademique->date_fin !!}</td>
            <td>{!! $anneeAcademique->encours !!}</td>
            <td>
                {!! Form::open(['route' => ['anneeAcademiques.destroy', $anneeAcademique->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('anneeAcademiques.show', [$anneeAcademique->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('anneeAcademiques.edit', [$anneeAcademique->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>