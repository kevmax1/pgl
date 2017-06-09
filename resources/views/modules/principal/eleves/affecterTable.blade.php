{!! Form::open(['route' => 'eleves.affecter.Store',"class"=>'form-horizontal group-border-dashed']) !!}
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
                    <div class="checkbox">
                        <label>
                        <input name="eleves[]" onclick="toogleInscription(event)" id="{{ $inscription->id }}" value="{{ $inscription->id }}" {{ ($inscription->classe_id)? 'checked': '' }} type="checkbox">
                        </label>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @if(isset($inscription))
        <input type="hidden" name="niveau-id" id="niveau-id" value="{{ $inscription->niveau->id }}">
    @endif
{!! Form::close() !!}
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
    $classe = {{ $classe }}
    function toogleInscription(e){
        $input = e.target;
        $.post("{{ route('eleves.affecter.Store') }}",{
            niveau: $("#niveau-id").val(),
            classe: $classe,
            inscription: $input.id
        }).done(function(data){
            $.gritter.add({
                title: 'Succès',
                text: data.msg,
                class_name: 'color success'
            });
        }).fail(function (data){
            console.log(data);
            $.gritter.add({
                title: 'Erreur',
                text: data.msg,
                class_name: 'color danger'
            });
            $input.prop("checked",!$input.prop("checked"));
        });
    }
</script>