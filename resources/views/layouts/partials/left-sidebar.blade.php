<div class="left-sidebar-wrapper"><a href="#" class="left-sidebar-toggle">@yield('page-title')</a>
  <div class="left-sidebar-spacer">
    <div class="left-sidebar-scroll">
      <div class="left-sidebar-content">
        <ul class="sidebar-elements">
          <li class="{{ (Route::currentRouteName() == "home")?' active ':'' }}">
              <a href="{{ route('home') }}"><i class="icon mdi mdi-home"></i><span>@lang('common.home')</span></a>
          </li>
          @foreach(myModuleAccess() as $access)
          @if( $access->menu->parent_id == 0 )
              <li class="{{ (count($access->menu->fils()) > 0)?' parent ':(Request::is($access->menu->route_name."*")?' active ':'') }}" >
                  <a href="{{ $access->menu->route }}">
                      <i class="{{ $access->menu->icon }}"></i>
                      <span>{{ $access->menu->libelle }}</span>
                      @if(count($access->menu->fils()) > 0)<span class="fa arrow"></span>@endif
                  </a>
                  @if( count($access->menu->fils()) > 0 )
                  <ul class="sub-menu" >
                      @foreach(myModuleAccess() as $as)
                      @if($as->menu->parent_id == $access->menu->id)
                          <li class="{{ (Route::currentRouteName() == $as->menu->route_name)?' active ':' ' }}">
                              <a href="{{$as->menu->route}}">
                                  <i class="fa fa-angle-right"></i>
                                  &nbsp; {{$as->menu->libelle}}
                              </a>
                          </li>
                      @endif
                      @endforeach
                  </ul>
                  @endif
              </li>
          @endif
          @endforeach
        </ul>
      </div>
    </div>
  </div>

  <div class="progress-widget">
    <div class="progress-data"><span class="progress-value">{{Session::get('pourcentage')}}%</span><span class="name">Current Year</span></div>
    <div class="progress">
      <div style="width: {{Session::get('pourcentage')}}%;" class="progress-bar progress-bar-primary"></div>
    </div>
  </div>
</div>