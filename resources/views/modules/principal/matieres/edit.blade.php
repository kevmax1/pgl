@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Matiere
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($matiere, ['route' => ['matieres.update', $matiere->id], 'method' => 'patch']) !!}

                        @include('matieres.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection