@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Section
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($section, ['route' => ['sections.update', $section->id], 'method' => 'patch']) !!}

                        @include('sections.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection