@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Seance Cour
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($seanceCour, ['route' => ['seanceCours.update', $seanceCour->id], 'method' => 'patch']) !!}

                        @include('seance_cours.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection