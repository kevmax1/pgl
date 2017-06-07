<table class="table table-fw-widget" id="eleves">
    <thead>
        <th>Matricule</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Sexe</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach($inscriptions as $inscription)
            <tr>
                <td>{!! $inscription->eleve->matricule !!}</td>
                <td>{!! $inscription->eleve->nom !!}</td>
                <td>{!! $inscription->eleve->prenom !!}</td>
                <td>{!! $inscription->eleve->sexe->libelle_fr !!}</td>
                <td>
                    {!! Form::open(['route' => ['eleves.destroy', $inscription->eleve->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('eleves.show', [$inscription->eleve->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('eleves.edit', [$inscription->eleve->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<script>
    $("#eleves").dataTable({
        "language":{
            "sProcessing":     "Traitement en cours...",
            "sSearch":         "Rechercher&nbsp;:",
            "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
            "sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
            "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
            "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
            "sInfoPostFix":    "",
            "sLoadingRecords": "Chargement en cours...",
            "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
            "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
            "oPaginate": {
                "sFirst":      "Premier",
                "sPrevious":   "Pr&eacute;c&eacute;dent",
                "sNext":       "Suivant",
                "sLast":       "Dernier"
            },
            "oAria": {
                "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
            }
        }
    });
</script>