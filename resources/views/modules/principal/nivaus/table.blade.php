<table class="table table-responsive" id="nivaus-table">
    <thead>
        <th>Section</th>
        <th>Cycle</th>
        <th>Libelle Fr</th>
        <th>Libelle Fr</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($nivaus as $nivau)
        <tr>
            <td>{!! $nivau->cycle->section->libelle_fr !!}</td>
            <td>{!! $nivau->cycle->libelle_fr !!}</td>
            <td>{!! $nivau->libelle_fr !!}</td>
            <td>{!! $nivau->libelle_en !!}</td>
            <td>
                {!! Form::open(['route' => ['niveaux.destroy', $nivau->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('niveaux.edit', [$nivau->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>