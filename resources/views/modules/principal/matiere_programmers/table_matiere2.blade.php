<table class="table table-responsive" id="matieres-table">
    <thead>
        <th>#</th>
        <th>Matieres (fr/en)</th>
        <th>Coef</th>
        <th>Suprimer</th>
    </thead>
    <tbody>
    @foreach($matieres as $matiere)
        <tr id="tr-{!! $matiere->id !!}">
            <td>{!! $matiere->id !!}</td>
            <td>{!! $matiere->matiere->libelle_fr.' / '.$matiere->matiere->libelle_en!!}</td>
            <td>{{$matiere->coef}}</td>
            <td>
            <div class='btn-group'>
                <button class='btn btn-danger btn-xs' onclick="deleteMe({{$matiere->id}})"><i class="glyphicon glyphicon-trash"></i></button>
            </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<script type="text/javascript">
    function deleteMe(id) {
        if(id != null){
            $.ajax({
               type: "POST",
                url: '{{route('matiereProgrammers.delete')}}',
                data:{
                    id:id
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
                text: 'Programme Inconnu!!.',
                class_name: 'color danger'
            });
        }
        $('#tr-'+id).hide();
        $.gritter.add({
            title: 'Alert',
            text: 'Supression effectuer!!.',
            class_name: 'color warning'
        });
         $('#searchMat').trigger('click');
    }
</script>