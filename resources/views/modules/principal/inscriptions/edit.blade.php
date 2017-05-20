@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Inscription
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($inscription, ['route' => ['inscriptions.update', $inscription->id], 'method' => 'patch']) !!}

                        @include('inscriptions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection