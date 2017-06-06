@extends('layouts.app')
@section('page-head')
    <div class="page-head">
        <h2 class="page-head-title">Groupes Matiere</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">Module principal</a></li>
            <li><a href="#">Groupes Matiere</a></li>
            <li class="active">Lister</li>
        </ol>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('groupeMatieres.create') !!}">Ajouter un nouveau</a>
        </h1>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
                <div class="panel-heading panel-heading-divider">Groupes Matiere<span class="panel-subtitle"></span></div>
                <div class="panel-body">
                    <div class="clearfix"></div>

                    @include('flash::message')

                    <div class="clearfix"></div>
                    <div class="box box-primary">
                        <div class="box-body">
                                @include('modules.principal.groupe_matieres.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

