<div class="row wizard-row">
    @include('adminlte-templates::common.errors')
    <div class="col-md-12 fuelux">
        <div class="block-wizard panel panel-default">
            <div id="wizard1" class="wizard wizard-ux">
                <ul class="steps">
                    <li data-step="1" class="active">Etape 1<span class="chevron"></span></li>
                    <li data-step="2">Etape 2<span class="chevron"></span></li>
                    <li data-step="3">Etape 3<span class="chevron"></span></li>
                </ul>
                <div class="actions">
                    <button type="button" class="btn btn-xs btn-prev btn-default"><i class="icon mdi mdi-chevron-left"></i>Precédent</button>
                    <button type="button" data-last="Finish" class="btn btn-xs btn-next btn-default">Suivant<i class="icon mdi mdi-chevron-right"></i></button>
                </div>
                <div class="step-content">
                    <div data-step="1" class="step-pane active">
                        <div class="form-group no-padding">
                            <div class="col-sm-7">
                                <h3 class="wizard-title">Information de l'élève</h3>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('nom', 'Nom:', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('nom', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('prenom', 'Prenom:', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('prenom', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sexe_id" class='col-sm-3 control-label'>Sexe:</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="sexe_id" name="sexe_id">
                                    @foreach($sexes as $sexe)
                                        <option {{ (isset($eleve) && $eleve->sexe->id == $sexe->id) ? "selected" : "" }} value="{{ $sexe->id }}">{{ $sexe->libelle_fr }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('date_naissance', 'Date Naissance:', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-6">
                                {!! Form::date('date_naissance', isset($eleve) ? $eleve->date_naissance :null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <a href="{!! route('eleves.index') !!}" class="btn btn-default  btn-space">Cancel</a>
                                <button data-wizard="#wizard1" class="btn btn-primary btn-space wizard-next">Next Step</button>
                            </div>
                        </div>
                    </div>
                    <div data-step="2" class="step-pane">
                        <div class="form-group no-padding">
                            <div class="col-sm-7">
                                <h3 class="wizard-title">Informations des parents</h3>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('nom_parent_1', 'Nom parent 1:', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('nom_parent_1', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('prenom_parent_1', 'Prenom parent 1:', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('prenom_parent_1', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('telephone_parent_1', 'Téléphone parent 1:', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('telephone_parent_1', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('adresse_parent_1', 'Adresse parent 1:', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('adresse_parent_1', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('nom_parent_2', 'Nom parent 2:', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('nom_parent_2', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('prenom_parent_2', 'Prenom parent 2:', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('prenom_parent_2', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('telephone_parent_2', 'Téléphone parent 2:', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-6">
                                {!! Form::tel('telephone_parent_2', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('adresse_parent_2', 'Adresse parent 2:', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('adresse_parent_2', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button data-wizard="#wizard1" class="btn btn-default btn-space wizard-previous">Previous</button>
                                <button data-wizard="#wizard1" class="btn btn-primary btn-space wizard-next">Next Step</button>
                            </div>
                        </div>
                    </div>
                    <div data-step="3" class="step-pane">
                        <div class="form-group">
                            <div class="form-group no-padding">
                                <div class="col-sm-7">
                                    <h3 class="wizard-title">Niveau d'inscription</h3>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="section_id" class='col-sm-3 control-label'>Section:</label>
                                <div class="col-sm-6">
                                    <select class="form-control" id="section_id" name="section_id">
                                        @foreach($sections as $section)
                                            <option {{ (isset($eleve) && $eleve->inscriptions()->orderBy('id', 'desc')->first()->niveau->cycle->section->id == $section->id) ? "selected" : "" }} value="s-{{ $section->id }}">{{ $section->libelle_fr }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cycle_id" class='col-sm-3 control-label'>Cycle:</label>
                                <div class="col-sm-6">
                                    <select class="form-control" id="cycle_id" name="cycle_id">
                                        @foreach($cycles as $cycle)
                                            <option {{ (isset($eleve) && $eleve->inscriptions()->orderBy('id', 'desc')->first()->niveau->cycle->id == $cycle->id) ? "selected" : "" }} class="s-{{ $cycle->section->id }}" value="c-{{ $cycle->id }}">{{ $cycle->libelle_fr }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="niveau_id" class='col-sm-3 control-label'>Niveau:</label>
                                <div class="col-sm-6">
                                    <select class="form-control" id="niveau_id" name="niveau_id">
                                        @foreach($niveaux as $niveau)
                                            <option {{ (isset($eleve) && $eleve->inscriptions()->orderBy('id', 'desc')->first()->niveau->id == $niveau->id) ? "selected" : "" }} class="c-{{ $niveau->cycle->id }}" value="{{ $niveau->id }}">{{ $niveau->libelle_fr }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button data-wizard="#wizard1" class="btn btn-default btn-space wizard-previous">Previous</button>
                                <button type="submit" class="btn btn-success btn-space">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('custom_css')
    <link rel="stylesheet" type="text/css" href="/assets/lib/bootstrap-slider/css/bootstrap-slider.css"/>
@endsection
@section('custom_js')
    <script src="/assets/lib/fuelux/js/wizard.js" type="text/javascript"></script>
    <script src="/assets/lib/bootstrap-slider/js/bootstrap-slider.js" type="text/javascript"></script>
    <script src="/assets/js/app-form-wizard.js" type="text/javascript"></script>
    <script src="/js/jquery.chained.min.js"></script>
    <script type="text/javascript">
        $('.wizard-ux').wizard();
        $(".wizard-next").click(function(e){
            var id = $(this).data("wizard");
            $(id).wizard('next');
            e.preventDefault();
        });
        $(".wizard-previous").click(function(e){
            var id = $(this).data("wizard");
            $(id).wizard('previous');
            e.preventDefault();
        });
        document.addEventListener("DOMContentLoaded",function(event){
            $("#cycle_id").chained("#section_id");
            $("#niveau_id").chained("#cycle_id");
        });
    </script>
@endsection