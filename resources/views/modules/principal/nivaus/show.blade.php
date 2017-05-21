@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Nivau
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('nivaus.show_fields')
                    <a href="{!! route('nivaus.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
