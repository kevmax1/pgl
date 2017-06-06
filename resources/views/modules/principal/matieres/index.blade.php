@extends('layouts.app')
@section('page-head')
    <div class="page-head">
        <h2 class="page-head-title">Matieres</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">Module principal</a></li>
            <li><a href="#">Matieres</a></li>
            <li class="active">Lister</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
                <div class="panel-heading panel-heading-divider">Matieres<span class="panel-subtitle"></span></div>
                <div class="panel-body">
                    <div class="clearfix"></div>

                    @include('flash::message')

                    <div class="clearfix"></div>
                    <div class="box box-primary">
                        <div class="box-body">
                                @include('modules.principal.matieres.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

