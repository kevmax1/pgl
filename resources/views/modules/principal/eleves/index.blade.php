@extends('layouts.app')
@section('page-head')
    <div class="page-head">
        <h2 class="page-head-title">Elèves</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">Module principal</a></li>
            <li><a href="#">Elèves</a></li>
            <li class="active">Lister</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
                <div class="panel-heading panel-heading-divider">Choisir une classe</div>
                <div class="panel-body">
                    <div class="form-group xs-pt-10">
                        <label for="annee_id">Année Academiques:</label>
                        <select class="form-control" id="annee_id" name="annee_id">
                            @foreach($annees as $annee)
                                <option value="{{ $annee->id }}">{{ $annee->libelle }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group xs-pt-10">
                        <label for="section_id">Section:</label>
                        <select class="form-control" id="section_id" name="section_id">
                            @foreach($sections as $section)
                                <option value="s-{{ $section->id }}">{{ $section->libelle_fr }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group xs-pt-10">
                        <label for="cycle_id">Cycle:</label>
                        <select class="form-control" id="cycle_id" name="cycle_id">
                            @foreach($cycles as $cycle)
                                <option class="s-{{ $cycle->section->id }}" value="c-{{ $cycle->id }}">{{ $cycle->libelle_fr }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group xs-pt-10">
                        <label for="niveau_id">Niveau:</label>
                        <select class="form-control" id="niveau_id" name="niveau_id">
                            @foreach($niveaux as $niveau)
                                <option class="c-{{ $niveau->cycle->id }}" value="n-{{ $niveau->id }}">{{ $niveau->libelle_fr }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group xs-pt-10">
                        <label for="serie_id">Serie:</label>
                        <select class="form-control" id="serie_id" name="serie_id">
                            @foreach($series as $serie)
                                <option class="n-{{ $serie->niveau->id }}" value="se-{{ $serie->id }}">{{ $serie->libelle_fr }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group xs-pt-10">
                        <label for="serie_id">Classe:</label>
                        <select class="form-control" id="classe_id" name="classe_id">
                            @foreach($classes as $classe)
                                <option class="se-{{ $classe->serie->id }}" value="{{ $classe->id }}">{{ $classe->libelle }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row xs-pt-15">
                        <div class="col-xs-6 col-xs-offset-3">
                            <p class="text-center">
                                <button onclick="getEleve()" class="btn btn-space btn-primary">Rechercher</button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
                <div class="panel-heading panel-heading-divider">Liste des élèves<span class="panel-subtitle"></span></div>
                <div class="panel-body">
                    @include('flash::message')
                    <div class="clearfix"></div>
                    <div class="box box-primary">
                        <div class="box-body" id="data">
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
            $("#cycle_id").chained("#section_id");
            $("#niveau_id").chained("#cycle_id");
            $("#serie_id").chained("#niveau_id");
            $("#classe_id").chained("#serie_id");
        });
        $.extend( true, $.fn.dataTable.defaults, {
            dom:
            "<'row be-datatable-header'<'col-sm-6'l><'col-sm-6'f>>" +
            "<'row be-datatable-body'<'col-sm-12'tr>>" +
            "<'row be-datatable-footer'<'col-sm-5'i><'col-sm-7'p>>"
        } );
        function getEleve(){
            $classe = $("#classe_id").val();
            $annee = $('#annee_id').val();
            if($classe != null && $annee != null){
                $.post("{{ route('eleves.index.find') }}/?classe="+$classe+"&annee="+$annee,function(data){
                    $("#data").html(data);
                });
            }else{
                $.gritter.add({
                    title: 'Erreur',
                    text: 'Veuillez selectionner une classe et une année academique.',
                    class_name: 'color danger'
                });
            }
            return false;
        }
    </script>
@endsection
