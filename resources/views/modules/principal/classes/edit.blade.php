@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Classe
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($classe, ['route' => ['classes.update', $classe->id], 'method' => 'patch']) !!}

                        @include('classes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection