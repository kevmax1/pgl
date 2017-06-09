@extends('layouts.app')

@section('page-head')
    <div class="page-head">
        <h2 class="page-head-title">Elèves</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">Module principal</a></li>
            <li><a href="#">Elèves</a></li>
            <li class="active">Editer</li>
        </ol>
    </div>
@endsection

@section('content')
    {!! Form::model($eleve, ['route' => ['eleves.update', $eleve->id], 'method' => 'patch',"class"=>'form-horizontal group-border-dashed']) !!}
    @include('modules.principal.eleves.fields')
    {!! Form::close() !!}
@endsection