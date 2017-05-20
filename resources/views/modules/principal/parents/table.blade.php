<table class="table table-responsive" id="parents-table">
    <thead>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Adresse</th>
        <th>Telphone</th>
        <th>Eleve Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($parents as $parent)
        <tr>
            <td>{!! $parent->nom !!}</td>
            <td>{!! $parent->prenom !!}</td>
            <td>{!! $parent->adresse !!}</td>
            <td>{!! $parent->telphone !!}</td>
            <td>{!! $parent->eleve_id !!}</td>
            <td>
                {!! Form::open(['route' => ['parents.destroy', $parent->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('parents.show', [$parent->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('parents.edit', [$parent->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>