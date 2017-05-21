@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Programme
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($programme, ['route' => ['programmes.update', $programme->id], 'method' => 'patch']) !!}

                        @include('programmes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection