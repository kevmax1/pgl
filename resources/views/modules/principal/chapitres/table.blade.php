<table class="table table-responsive" id="chapitres-table">
    <thead>
        <th>Odre</th>
        <th>Libelle</th>
        <th>Nbr Heure</th>
        <th>Nbr Heure Realiser</th>
        <th>Terminer</th>
        <th>Matiere Programmer Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($chapitres as $chapitre)
        <tr>
            <td>{!! $chapitre->odre !!}</td>
            <td>{!! $chapitre->libelle !!}</td>
            <td>{!! $chapitre->nbr_heure !!}</td>
            <td>{!! $chapitre->nbr_heure_realiser !!}</td>
            <td>{!! $chapitre->terminer !!}</td>
            <td>{!! $chapitre->matiere_programmer_id !!}</td>
            <td>
                {!! Form::open(['route' => ['chapitres.destroy', $chapitre->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('chapitres.show', [$chapitre->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('chapitres.edit', [$chapitre->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>