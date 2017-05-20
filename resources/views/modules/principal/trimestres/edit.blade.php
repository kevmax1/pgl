@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Trimestre
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($trimestre, ['route' => ['trimestres.update', $trimestre->id], 'method' => 'patch']) !!}

                        @include('trimestres.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection