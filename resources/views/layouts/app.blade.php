<?php $lang = (Session::get('lang')!=null)?Session::get('lang'):'fr'; ?>
{{ App::setLocale($lang) }}
<!DOCTYPE html>
<html lang="{{ $lang }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="/assets/img/logo-fav.png">
    <title>{{ config('app.name', 'Pgl') }} </title>
    <link rel="stylesheet" type="text/css" href="/assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="/assets/css/style.css" type="text/css"/>
    @yield('custom_css')
      <style>
          .page-head {
              padding: 0px 25px 0px;
              position: relative;
          }
          .panel-body {
              padding: 8px 20px 10px;
              border-radius: 0 0 3px 3px;
          }
      </style>
  </head>
  <body>
    <div id="app">
      <div class="be-wrapper be-fixed-sidebar {{ Session::has('current_module') ?  Session::get('current_module')->couleur : ''}}">
        <nav class="navbar navbar-default navbar-fixed-top be-top-header">
          @include('layouts.partials.top-header')
        </nav>
        <div class="be-left-sidebar">
          @include('layouts.partials.left-sidebar')
        </div>
        <div class="be-content">
          <div class="page-head">
            @yield('page-head')
          </div>
          <div class="main-content container-fluid">
            @yield('content')
          </div>
        </div>
        <nav class="be-right-sidebar">
          @include('layouts.partials.right-sidebar')
        </nav>
      </div>
    </div>
    <script src="/assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="/assets/js/main.js" type="text/javascript"></script>
    <script src="/assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    @yield('custom_js')
    <script type="text/javascript">
      $(document).ready(function(){
      	//initialize the javascript
      	App.init();
      });
      
    </script>
  </body>
</html>