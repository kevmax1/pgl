<table class="table table-responsive" id="plageHoraires-table">
    <thead>
        <th>Ordre</th>
        <th>Libelle</th>
        <th>Pause</th>
        <th>Nbr Heure</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($plageHoraires as $plageHoraire)
        <tr>
            <td>{!! $plageHoraire->ordre !!}</td>
            <td>{!! $plageHoraire->libelle !!}</td>
            <td>{!! $plageHoraire->pause !!}</td>
            <td>{!! $plageHoraire->nbr_heure !!}</td>
            <td>
                {!! Form::open(['route' => ['plageHoraires.destroy', $plageHoraire->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('plageHoraires.show', [$plageHoraire->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('plageHoraires.edit', [$plageHoraire->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>