@extends('layouts.app')
@section('page-head')
    <div class="page-head">
        <h2 class="page-head-title">Matieres</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">Module principal</a></li>
            <li><a href="#">Matieres</a></li>
            <li class="active">Editer</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
                <div class="panel-heading panel-heading-divider">Editer cette matiere<span class="panel-subtitle"></span></div>
                <div class="panel-body">
                 @include('adminlte-templates::common.errors')
                 <div class="box box-primary">
                     <div class="box-body">
                         <div class="row">
                             {!! Form::model($matiere, ['route' => ['matieres.update', $matiere->id], 'method' => 'patch']) !!}

                                  @include('modules.principal.matieres.fields')

                             {!! Form::close() !!}
                         </div>
                     </div>
                 </div>
                </div>
            </div>
        </div>
    </div>
@endsection