@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Grand Titre
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($grandTitre, ['route' => ['grandTitres.update', $grandTitre->id], 'method' => 'patch']) !!}

                        @include('grand_titres.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection