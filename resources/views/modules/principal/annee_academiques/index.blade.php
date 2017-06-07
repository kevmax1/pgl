@extends('layouts.app')
@section('page-head')
    <div class="page-head">
        <h2 class="page-head-title">Année Academiques</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">Module principal</a></li>
            <li><a href="#">Année Academiques</a></li>
            <li class="active">Lister</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
                <div class="panel-heading panel-heading-divider">Ajouter une année academique</div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'anneeAcademiques.store']) !!}
                    @include('modules.principal.annee_academiques.fields')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
                <div class="panel-heading panel-heading-divider">Liste des année academiques<span class="panel-subtitle"></span></div>
                <div class="panel-body">
                    @include('flash::message')
                    <div class="clearfix"></div>
                    <div class="box box-primary">
                        <div class="box-body" id="data">
                            @include('modules.principal.annee_academiques.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

