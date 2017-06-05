<table class="table table-responsive" id="sections-table">
    <thead>
        <th>Libelle Fr</th>
        <th>Libelle En</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($sections as $section)
        <tr>
            <td>{!! $section->libelle_fr !!}</td>
            <td>{!! $section->libelle_en !!}</td>
            <td>
                {!! Form::open(['route' => ['sections.destroy', $section->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('sections.edit', [$section->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>