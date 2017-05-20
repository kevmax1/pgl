@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Evaluation
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($evaluation, ['route' => ['evaluations.update', $evaluation->id], 'method' => 'patch']) !!}

                        @include('evaluations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection