@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Composition
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('modules.principal.compositions.show_fields')
                    <a href="{!! route('compositions.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
