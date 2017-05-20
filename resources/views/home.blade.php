@extends('layouts.app')

@section('custom_css')
    <style type="text/css" media="screen"></style>
@endsection

@section('custom_js')
    <script src="/javascripts/application.js" type="text/javascript" charset="utf-8" async defer></script>
@endsection

@section('page-title')
    Dashboard
@endsection

@section('page-head')
  <h2 class="page-head-title">@yield('page-title')</h2>
  <ol class="breadcrumb page-head-nav">
    <li><a href="#">Home</a></li>
    <li><a href="#">Pages</a></li>
    <li class="active">Blank Page Header</li>
  </ol>
@endsection

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>
        <div class="panel-body">
            You are logged in!
        </div>
    </div>
</div>
@endsection
