<table class="table table-responsive" id="matieres-table">
    <thead>
        <th>#</th>
        <th>Matieres (fr/en)</th>
        <th>Coef</th>
        <th>Enregistrer</th>
    </thead>
    <tbody>
    @if(isset($req))
    <input type="hidden" id="serie_id" value="{{$req->idserie}}">
    <input type="hidden" id="annee_id" value="{{$req->idanne}}">
    <input type="hidden" id="groupe_matiere_id" value="{{$req->idgroupe}}">
    @endif
    @foreach($matieres as $matiere)
        <tr id="tr-{!! $matiere->id !!}">
            <td>{!! $matiere->id !!}</td>
            <td>{!! $matiere->libelle_fr.' / '.$matiere->libelle_en!!}</td>
            <td>
                <input type="number" id="coef-{{$matiere->id}}" value="" class="form-control input-sm">
            </td>
            <td>
            <div class='btn-group'>
                <button class='btn btn-primary btn-xs' onclick="addMe({{$matiere->id}})"><i class="glyphicon glyphicon-save"></i></button>
            </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<script type="text/javascript">
    function addMe(id) {
        $serie = $("#serie_id").val();
        $annee = $("#annee_id").val();
        $groupe = $("#groupe_matiere_id").val();
        $coef = $('#coef-'+id).val();
        if($serie != null && $annee !=null && $groupe != null &&  $coef != null){
            $.ajax({
               type: "POST",
                url: '{{route('matiereProgrammers.save')}}',
                data:{
                    annee_academique_id:$annee, 
                    serie_id:$serie, 
                    groupe_matiere_id:$groupe, 
                    matiere_id:id, 
                    coef:$coef
                },
                success: function(data){
                    console.log(data);
                    getMatiere();
                },
                error : function(){
                    alert('erreur Serveur save');
                }
            });
        }else{
            $.gritter.add({
                title: 'Warning',
                text: 'Veuiller verifier qu\'il y a pas de champ vide!!.',
                class_name: 'color danger'
            });
        }
        $('#tr-'+id).hide();
        $.gritter.add({
            title: 'Alert',
            text: 'Ajout effectuer!!.',
            class_name: 'color success'
        });
         $('#searchMat').trigger('click');
    }
</script>