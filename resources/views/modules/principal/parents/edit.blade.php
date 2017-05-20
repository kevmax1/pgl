@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Parent
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($parent, ['route' => ['parents.update', $parent->id], 'method' => 'patch']) !!}

                        @include('parents.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection