@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Planing
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($planing, ['route' => ['planings.update', $planing->id], 'method' => 'patch']) !!}

                        @include('planings.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection