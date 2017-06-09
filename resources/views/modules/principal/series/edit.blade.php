@extends('layouts.app')
@section('page-head')
    <div class="page-head">
        <h2 class="page-head-title">Series</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">Module principal</a></li>
            <li><a href="#">series</a></li>
            <li class="active">Editer</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
                <div class="panel-heading panel-heading-divider">Editer une serie<span class="panel-subtitle"></span></div>
                <div class="panel-body">
                    @include('adminlte-templates::common.errors')
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="row">
                                {!! Form::model($serie, ['route' => ['series.update', $serie->id], 'method' => 'patch']) !!}

                                @include('modules.principal.series.fields')

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection