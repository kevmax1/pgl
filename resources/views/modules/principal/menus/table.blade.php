<table class="table table-responsive" id="menus-table">
    <thead>
        <th>Libelle</th>
        <th>Libelle En</th>
        <th>Icon</th>
        <th>Parent Id</th>
        <th>Route</th>
        <th>Route Name</th>
        <th>Module Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($menus as $menu)
        <tr>
            <td>{!! $menu->libelle !!}</td>
            <td>{!! $menu->libelle_en !!}</td>
            <td>{!! $menu->icon !!}</td>
            <td>{!! $menu->parent_id !!}</td>
            <td>{!! $menu->route !!}</td>
            <td>{!! $menu->route_name !!}</td>
            <td>{!! $menu->module_id !!}</td>
            <td>
                {!! Form::open(['route' => ['menus.destroy', $menu->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('menus.show', [$menu->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('menus.edit', [$menu->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>