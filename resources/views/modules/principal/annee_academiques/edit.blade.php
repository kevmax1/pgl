@extends('layouts.app')
@section('page-head')
    <div class="page-head">
        <h2 class="page-head-title">@lang('annee_academique.name')</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">@lang('common.module_principal')</a></li>
            <li><a href="#">@lang('annee_academique.name')</a></li>
            <li class="active">@lang('common.editer')</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
                <div class="panel-heading panel-heading-divider">@lang('annee_academique.edit')</div>
                <div class="panel-body">
                    {!! Form::model($anneeAcademique, ['route' => ['anneeAcademiques.update', $anneeAcademique->id], 'method' => 'patch']) !!}
                    @include('modules.principal.annee_academiques.fields')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
                <div class="panel-heading panel-heading-divider">@lang('annee_academique.list')<span class="panel-subtitle"></span></div>
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