@extends('layouts.app')
@section('page-head')
    <div class="page-head">
        <h2 class="page-head-title">Groupe de Matieres</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">Module principal</a></li>
            <li><a href="#">Groupe de Matieres</a></li>
            <li class="active">Ajouter</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
                <div class="panel-heading panel-heading-divider">Ajouter un Groupe de matiere<span class="panel-subtitle"></span></div>
                <div class="panel-body">
                    @include('adminlte-templates::common.errors')
                    <div class="box box-primary">

                        <div class="box-body">
                            <div class="row">
                                {!! Form::open(['route' => 'groupeMatieres.store']) !!}

                                    @include('modules.principal.groupe_matieres.fields')

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
