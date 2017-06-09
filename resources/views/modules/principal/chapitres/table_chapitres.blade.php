<div id="edit" class="tab-pane active cont">
    <div id="list1" class="dd">
        <ol class="dd-list" id="li">
            {!!$chaps->list!!}
        </ol>
    </div>
    <input id="ordre" type="hidden" name="ordre" value="">
    <div class="input-group xs-mb-15">
    <span class="input-group-btn"><button href="#" class='btn btn-success btn-xs' onclick="saveOrder({{$id}})"><i class="glyphicon glyphicon-save"></i></button></span>
      <input id="new_chap" type="text" class="form-control" placeholder="Ajouter un titre" value=""><span class="input-group-btn">
        <button type="button" onclick="addChap({{$id}})" class="btn btn-primary">Ajouter!</button></span>
     </div>
</div>

<div id="show" class="tab-pane cont">
    <div id="list1" class="dd0">
        <ol class="dd-list">
            {!!$chaps->list_d!!}
        </ol>
    </div>
</div>

<script type="text/javascript">
    
        $('.dd').nestable();
        //Watch for list changes and show serialized output
        function update_out(selector, sel2){
          var out = $(selector).nestable('serialize');
          $(sel2).val(window.JSON.stringify(out));
        }
        
        update_out('#list1',"#ordre");
        
        $('#list1').on('change', function() {
          update_out('#list1',"#ordre");
        });

        function chap(id, libelle) {
            var chap = "<li data-id='"+id+"' class='dd-item'>"+
            "<div class='dd-handle'>"+libelle+"</div></li>";
            $('#li').append(chap);
        }

        function addChap($id) {
            $lib = $('#new_chap').val();
            if($lib != null && $lib != ''){
                $.ajax({
                   type: "POST",
                    url: '{{route('matiereProgrammers.add_chap')}}',
                    data:{matiere_programmer_id:$id, libelle:$lib},
                    success: function(data){
                        chap(data.id,data.libelle);
                        $('#new_chap').val('');
                        $.gritter.add({
                            title: 'Success',
                            text: 'Ajout effectuer!.',
                            class_name: 'color success'
                        });
                    },
                    error : function(e){
                        $.gritter.add({
                            title: 'Warning',
                            text: 'Erreur serveur ajout Mat.',
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
        } 

        function saveOrder($id) {
            var $newO =  $('#ordre').val();
            $.ajax({
               type: "POST",
                url: '{{route('matiereProgrammers.edit_order')}}',
                data:{id:$id, newO:$newO},
                success: function(data){
                    $.gritter.add({
                        title: 'Success',
                        text: 'Ordre mis a jours!.',
                        class_name: 'color success'
                    });
                    editMe($id);
                },
                error : function(e){
                    $.gritter.add({
                        title: 'Warning',
                        text: 'Erreur de mise a jours.',
                        class_name: 'color danger'
                    });
                    console.log(e);
                }
            });
        }

        function deleteChap($id) {
            $.ajax({
               type: "POST",
                url: '{{route('matiereProgrammers.delete_chapitre')}}',
                data:{id:$id},
                success: function(data){
                    $.gritter.add({
                        title: 'Success',
                        text: 'Chapitre mis a jours!.',
                        class_name: 'color warning'
                    });
                    editMe(data.id);
                },
                error : function(e){
                    $.gritter.add({
                        title: 'Warning',
                        text: 'Erreur de mise a jours.',
                        class_name: 'color danger'
                    });
                    console.log(e);
                }
            });
            $('#li-'+$id).hide();
        }

</script>