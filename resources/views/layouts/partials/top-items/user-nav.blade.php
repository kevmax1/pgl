<ul class="nav navbar-nav navbar-right be-user-nav">
@if( ! Auth::guest())
  <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><img src="/assets/img/avatar.png" alt="Avatar"><span class="user-name">{{ Auth::user()->name }}</span></a>
    <ul role="menu" class="dropdown-menu">
      <li>
        <div class="user-info">
          <div class="user-name">{{ Auth::user()->name }}</div>
          <div class="user-position online">Role - {{Auth::user()->role->slug}}</div>
        </div>
      </li>
      <li><a href="#"><span class="icon mdi mdi-face"></span> Account</a></li>
      <li><a href="#"><span class="icon mdi mdi-settings"></span> Settings</a></li>
      <li>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            <span class="icon mdi mdi-power"></span> Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
      </li>
    </ul>
  </li>
@endif
</ul>