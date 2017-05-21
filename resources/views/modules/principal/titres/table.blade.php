<table class="table table-responsive" id="titres-table">
    <thead>
        <th>Ordre</th>
        <th>Libelle</th>
        <th>Grand Titre Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($titres as $titre)
        <tr>
            <td>{!! $titre->ordre !!}</td>
            <td>{!! $titre->libelle !!}</td>
            <td>{!! $titre->grand_titre_id !!}</td>
            <td>
                {!! Form::open(['route' => ['titres.destroy', $titre->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('titres.show', [$titre->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('titres.edit', [$titre->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>