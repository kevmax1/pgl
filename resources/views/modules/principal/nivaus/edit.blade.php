@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Nivau
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($nivau, ['route' => ['nivaus.update', $nivau->id], 'method' => 'patch']) !!}

                        @include('nivaus.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection