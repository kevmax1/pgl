@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Annee Academique
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($anneeAcademique, ['route' => ['anneeAcademiques.update', $anneeAcademique->id], 'method' => 'patch']) !!}

                        @include('annee_academiques.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection