@extends('layouts.app')
@section('page-head')
    <div class="page-head">
        <h2 class="page-head-title">Planing des cours</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">Module principal</a></li>
            <li><a href="#">Planing des cours</a></li>
            <li class="active">choix de matiere</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
                <div class="panel-heading panel-heading-divider">Choix des details</div>
                <div class="panel-body">
                    <div class="form-group xs-pt-10">
                        <label for="annee_id">Annee Academique:</label>
                        <select class="form-control" id="annee_id" name="annee_id">
                            @foreach($annees as $annee)
                                <option value="{{ $annee->id }}">{{ $annee->libelle }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group xs-pt-10">
                        <label for="groupe_matiere_id">Groupe Matiere:</label>
                        <select class="form-control" id="groupe_matiere_id" name="groupe_matiere_id">
                            @foreach($groupes as $groupe)
                                <option value="{{ $groupe->id }}">{{ $groupe->libelle_fr }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group xs-pt-10">
                        <label for="niveau_id">Niveau:</label>
                        <select class="form-control" id="niveau_id" name="niveau_id">
                            @foreach($niveaux as $niveau)
                                <option value="n-{{ $niveau->id }}">{{ $niveau->libelle_fr }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group xs-pt-10">
                        <label for="serie_id">Serie:</label>
                        <select class="form-control" id="serie_id" name="serie_id">
                            @foreach($series as $serie)
                                <option class="n-{{ $serie->niveau->id }}" value="{{ $serie->id }}">{{ $serie->libelle_fr }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row xs-pt-15">
                        <div class="col-xs-6 col-xs-offset-3">
                            <p class="text-center">
                                <button id onclick="getMatiere()" class="btn btn-space btn-primary">Rechercher</button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
                <div class="panel-heading panel-heading-divider">Liste des matieres
                </div>
                <div class="panel-body">
                    @include('flash::message')
                    <div class="clearfix"></div>
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="tab-container">
                              <ul class="nav nav-tabs">
                                <li class="active"><a href="#data" data-toggle="tab">Ajouter</a></li>
                                <li><a href="#show" data-toggle="tab">Visualiser</a></li>
                              </ul>
                              <div class="tab-content">
                                <div id="data" class="tab-pane active cont">
                                  <span class="alert alert-primary col-sm-12">Aucune recherche effectuer</span>
                                </div>
                                <div id="show" class="tab-pane cont">
                                <span class="alert alert-primary col-sm-12">Aucune recherche effectuer</span>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_css')
    <link rel="stylesheet" type="text/css" href="/assets/lib/datatables/css/dataTables.bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/lib/jquery.gritter/css/jquery.gritter.css"/>
@endsection
@section('custom_js')
    <script src="/js/jquery.chained.min.js"></script>
    <script src="/assets/lib/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/assets/lib/datatables/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script src="/assets/lib/datatables/plugins/buttons/js/dataTables.buttons.js" type="text/javascript"></script>
    <script src="/assets/lib/datatables/plugins/buttons/js/buttons.html5.js" type="text/javascript"></script>
    <script src="/assets/lib/datatables/plugins/buttons/js/buttons.flash.js" type="text/javascript"></script>
    <script src="/assets/lib/datatables/plugins/buttons/js/buttons.print.js" type="text/javascript"></script>
    <script src="/assets/lib/datatables/plugins/buttons/js/buttons.colVis.js" type="text/javascript"></script>
    <script src="/assets/lib/datatables/plugins/buttons/js/buttons.bootstrap.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery.gritter/js/jquery.gritter.js" type="text/javascript"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded",function(event){
            $("#serie_id").chained("#niveau_id");
        });
        $.extend( true, $.fn.dataTable.defaults, {
            dom:
            "<'row be-datatable-header'<'col-sm-6'l><'col-sm-6'f>>" +
            "<'row be-datatable-body'<'col-sm-12'tr>>" +
            "<'row be-datatable-footer'<'col-sm-5'i><'col-sm-7'p>>"
        } );
        function getMatiere(){
            $serie = $("#serie_id").val();
            $annee = $("#annee_id").val();
            $groupe = $("#groupe_matiere_id").val();
            if($serie != null && $annee !=null && $groupe != null){
                $.ajax({
                   type: "POST",
                    url: '{{route('matiereProgrammers.matieres')}}',
                    data:{idanne:$annee, idserie:$serie, idgroupe:$groupe},
                    success: function(data){
                        $('#data').html(data);
                    },
                    error : function(e){
                        alert('erreur Serveur ajout'+e.message);
                    }
                });
                $.ajax({
                   type: "POST",
                    url: '{{route('matiereProgrammers.matieres2')}}',
                    data:{idanne:$annee, idserie:$serie, idgroupe:$groupe},
                    success: function(data){
                        $('#show').html(data);
                    },
                    error : function(){
                        alert('erreur Serveur exist');
                    }
                });
                $.gritter.add({
                    title: 'Alert',
                    text: 'Recherche effectuer!!.',
                    class_name: 'color success'
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
@endsection
