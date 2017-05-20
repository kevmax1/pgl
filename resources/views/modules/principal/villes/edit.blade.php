@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Ville
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($ville, ['route' => ['villes.update', $ville->id], 'method' => 'patch']) !!}

                        @include('villes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection