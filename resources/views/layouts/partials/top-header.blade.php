<div class="container-fluid">
  <div class="navbar-header"><a href="index.html" class="navbar-brand"></a></div>
  <div class="be-right-navbar">
    @include('layouts.partials.top-items.user-nav')
    <div class="page-title"><span>@yield('page-title')</span></div>
    <ul class="nav navbar-nav navbar-right be-icons-nav">
      <li class="dropdown"><a href="#" role="button" aria-expanded="false" class="be-toggle-right-sidebar"><span class="icon mdi mdi-settings"></span></a></li>
      <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><span class="icon mdi mdi-notifications"></span><span class="indicator"></span></a>
        @include('layouts.partials.top-items.notifications')
      </li>
      <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><span class="icon mdi mdi-apps"></span></a>
        @include('layouts.partials.top-items.connections')
      </li>
    </ul>
  </div>
</div>