@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Composition
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($composition, ['route' => ['compositions.update', $composition->id], 'method' => 'patch']) !!}

                        @include('modules.principal.compositions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection