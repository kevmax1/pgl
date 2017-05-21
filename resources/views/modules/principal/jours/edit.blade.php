@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Jour
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($jour, ['route' => ['jours.update', $jour->id], 'method' => 'patch']) !!}

                        @include('jours.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection