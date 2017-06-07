<?php $lang = (Session::get('lang')!=null)?Session::get('lang'):'fr'; ?>
{{ App::setLocale($lang) }}
<div class="container-fluid">
  <div class="navbar-header"><a href="{{url('/')}}" class="navbar-brand"></a></div>
  <div class="be-right-navbar">
    @include('layouts.partials.top-items.user-nav')
    <div class="page-title"><span>@yield('page-title')</span></div>
    <ul class="nav navbar-nav navbar-right be-icons-nav">
      <li class="dropdown"><a href="#" role="button" aria-expanded="false" class="be-toggle-right-sidebar"><span class="icon mdi mdi-settings"></span></a></li>
      <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><span class="icon mdi mdi-notifications"></span><span class="indicator"></span></a>
        @include('layouts.partials.top-items.notifications')
      </li>
      <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><span class="icon mdi mdi-globe"></span></a>
        <ul class="dropdown-menu be-connections" style="width: auto">
          <li>
            <div class="list">
              <div class="content">
                <div class="row">
                  <div class="col-xs-6"><a href="{{ route('change.locale') }}?l=en" class="connection-item"><img src="/assets/img/001-united-kingdom.png" alt="Github"><span>@lang('langue.english')</span></a></div>
                  <div class="col-xs-6"><a href="{{ route('change.locale') }}?l=fr" class="connection-item"><img src="/assets/img/002-france.png" alt="Bitbucket"><span>@lang('langue.french')</span></a></div>
                </div>
              </div>
            </div>
            <div class="footer"> <a href="#">@lang('langue.language')</a></div>
          </li>
        </ul>
      </li>
      <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><span class="icon mdi mdi-apps"></span></a>
        @include('layouts.partials.top-items.connections')
      </li>
    </ul>
  </div>
</div>