@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Affectation
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($affectation, ['route' => ['affectations.update', $affectation->id], 'method' => 'patch']) !!}

                        @include('affectations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection