@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Enseignant
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($enseignant, ['route' => ['enseignants.update', $enseignant->id], 'method' => 'patch']) !!}

                        @include('enseignants.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection