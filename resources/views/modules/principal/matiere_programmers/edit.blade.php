@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Matiere Programmer
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($matiereProgrammer, ['route' => ['matiereProgrammers.update', $matiereProgrammer->id], 'method' => 'patch']) !!}

                        @include('modules.principal.matiere_programmers.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection