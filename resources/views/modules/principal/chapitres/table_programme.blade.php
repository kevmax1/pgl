<table class="table table-responsive" id="progs-table">
    <thead>
        <th>#</th>
        <th>Matiere</th>
        <th>Niveaux</th>
        <th>Annee</th>
        <th>Affecter</th>
    </thead>
    <tbody>
    @foreach($progs as $prog)
        <tr>
            <td>{!! $prog->id !!}</td>
            <td>{!! $prog->matiere->libelle_fr !!}</td>
            <td>{!! $prog->serie->niveau->libelle_fr !!}</td>
            <td>{!! $prog->annee_academique->libelle !!}</td>
            <td>
                <a data-toggle="modal" data-target="#mod-{!! $prog->id !!}" type="button" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
                <button href="#" class='btn btn-default btn-xs' onclick="editMe({{$prog->id}})"><i class="glyphicon glyphicon-edit"></i></button>
            </td>
        </tr>
    <div id="mod-{!! $prog->id !!}" tabindex="-1" role="dialog" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
          </div>
          <div class="modal-body">
            <div class="text-center">
              <div class="text-primary"><span class="modal-main-icon mdi mdi-info-outline"></span></div>
              <h3>Information sur ce programme!</h3>
                <div class="form-group col-xs-6">
                    Matiere:
                    <b>{!! $prog->matiere->libelle_fr !!}</b><br>
                    Groupe Matiere:
                    <b>{!! $prog->groupe_matiere->libelle_fr !!}</b>
                </div>
                <div class="form-group col-xs-6">
                    Niveaux:
                    <b>{!! $prog->serie->niveau->libelle_fr !!}</b><br>
                    Annee Scolaire:
                    <b>{!! $prog->annee_academique->libelle !!}</b>
                </div>
                <div class="form-group col-xs-6">
                    Serie :
                    <b>{!! $prog->serie->libelle_fr !!}</b>
                </div>
                <div class="form-group col-xs-6">
                    Coef :
                    <b>{!! $prog->coef !!}</b>
                </div>
              <div class="xs-mt-50"> 
                <button type="button" data-dismiss="modal" class="btn btn-space btn-default">Fermer</button>
              </div>
            </div>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>
    @endforeach
    </tbody>
</table>
<script type="text/javascript">
    function editMe($id){
        if($serie != null && $annee !=null && $groupe != null){
            $.ajax({
               type: "POST",
                url: '{{route('matiereProgrammers.chapitre')}}',
                data:{id:$id},
                success: function(data){
                    $('#editMe').html(data);
                    $.gritter.add({
                        title: 'Alert',
                        text: 'Recherche/Mise a jours effectuer !!.',
                        class_name: 'color success'
                    });
                },
                error : function(e){
                    $.gritter.add({
                        title: 'Warning',
                        text: 'Erreur serveur ajout.',
                        class_name: 'color danger'
                    });
                    console.log(e);
                }
            });
        }else{
            $.gritter.add({
                title: 'Warning',
                text: 'Veuiller verifier qu\'il y a pas de champ vide!!.',
                class_name: 'color danger'
            });
        }
        return false;
    }
</script>