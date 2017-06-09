<table class="table table-responsive" id="anneeAcademiques-table">
    <thead>
        <th>@lang('annee_academique.libelle')</th>
        <th>@lang('annee_academique.start')</th>
        <th>@lang('annee_academique.end')</th>
        <th>@lang('annee_academique.encours')</th>
        <th>@lang('common.action')</th>
    </thead>
    <tbody>
    @foreach($anneeAcademiques as $anneeAcademique)
        <tr>
            <td>{!! $anneeAcademique->libelle !!}</td>
            <td>{!! Carbon\Carbon::parse($anneeAcademique->date_debut)->format('d-m-Y') !!}</td>
            <td>{!! Carbon\Carbon::parse($anneeAcademique->date_fin)->format('d-m-Y') !!}</td>
            <td>{!! $anneeAcademique->encours !!}</td>
            <td>
                {!! Form::open(['route' => ['anneeAcademiques.destroy', $anneeAcademique->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('anneeAcademiques.edit', [$anneeAcademique->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('".__('common.delete_confirm')."')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>