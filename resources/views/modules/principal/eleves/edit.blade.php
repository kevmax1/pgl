@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Eleve
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($eleve, ['route' => ['eleves.update', $eleve->id], 'method' => 'patch']) !!}

                        @include('eleves.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection