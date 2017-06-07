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
        @include('flash::message')
        <div class="col-md-4">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
                <div class="panel-heading panel-heading-divider">Information élève</div>
                <div class="panel-body">
                    @include('modules.principal.eleves.show_fields')
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
                <div class="panel-heading panel-heading-divider">Parents<span class="panel-subtitle"></span></div>
                <div class="panel-body">
                    @foreach($eleve->parents as $index => $parent)
                        <div class="form-group">
                            {!! Form::label('matricule', 'Nom du parent '.($index+1).': ') !!}
                            <strong>{!! $parent->nom !!}</strong>
                        </div>
                        <div class="form-group">
                            {!! Form::label('matricule', 'Prénom du parent '.($index+1).': ') !!}
                            <strong>{!! $parent->prenom !!}</strong>
                        </div>
                        <div class="form-group">
                            {!! Form::label('matricule', 'Téléphone du parent '.($index+1).': ') !!}
                            <strong>{!! $parent->telphone !!}</strong>
                        </div>
                        <div class="form-group">
                            {!! Form::label('matricule', 'Adresse du parent '.($index+1).': ') !!}
                            <strong>{!! $parent->adresse !!}</strong>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
                <div class="panel-heading panel-heading-divider">Parcours élève<span class="panel-subtitle"></span></div>
                <div class="panel-body">
                </div>
            </div>
        </div>
    </div>
@endsection