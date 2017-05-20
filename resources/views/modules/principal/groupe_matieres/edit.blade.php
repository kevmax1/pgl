@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Groupe Matiere
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($groupeMatiere, ['route' => ['groupeMatieres.update', $groupeMatiere->id], 'method' => 'patch']) !!}

                        @include('groupe_matieres.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection