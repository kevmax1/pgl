@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Acces
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($acces, ['route' => ['acces.update', $acces->id], 'method' => 'patch']) !!}

                        @include('acces.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection