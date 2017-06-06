<div class="left-sidebar-wrapper"><a href="#" class="left-sidebar-toggle">@yield('page-title')</a>
  <div class="left-sidebar-spacer">
    <div class="left-sidebar-scroll">
      <div class="left-sidebar-content">
        <ul class="sidebar-elements">
          <li class="divider">Menu</li>
          <li class="active"><a href="index.html"><i class="icon mdi mdi-home"></i><span>Dashboard</span></a>
          </li>
            <li class="parent"><a href="#"><i class="icon mdi mdi-group"></i><span>Sections</span></a>
                <ul class="sub-menu">
                    <li><a href="{{ route('sections.index') }}">Liste des sections</a>
                    </li>
                    <li><a href="{{ route('sections.create') }}">Ajouter une section</a>
                    </li>
                </ul>
            </li>
            <li class="parent"><a href="#"><i class="icon mdi mdi-rotate-right"></i><span>Cycles</span></a>
                <ul class="sub-menu">
                    <li><a href="{{ route('cycles.index') }}">Liste des cycles</a>
                    </li>
                    <li><a href="{{ route('cycles.create') }}">Ajouter un cycle</a>
                    </li>
                </ul>
            </li>
            <li class="parent"><a href="#"><i class="icon mdi mdi-layers"></i><span>Niveaux</span></a>
                <ul class="sub-menu">
                    <li><a href="{{ route('niveaux.index') }}">Liste des niveaux</a>
                    </li>
                    <li><a href="{{ route('niveaux.create') }}">Ajouter un niveau</a>
                    </li>
                </ul>
            </li>
            <li class="parent"><a href="#"><i class="icon mdi mdi-filter-list"></i><span>Series</span></a>
                <ul class="sub-menu">
                    <li><a href="{{ route('series.index') }}">Liste des series</a>
                    </li>
                    <li><a href="{{ route('series.create') }}">Ajouter une serie</a>
                    </li>
                </ul>
            </li>
            <li class="parent"><a href="#"><i class="icon mdi mdi-balance"></i><span>Classes</span></a>
                <ul class="sub-menu">
                    <li><a href="{{ route('classes.index') }}">Liste des classes</a>
                    </li>
                    <li><a href="{{ route('classes.create') }}">Ajouter une classe</a>
                    </li>
                </ul>
            </li>
          @foreach(myModuleAccess() as $access)
          @if( $access->menu->parent_id == 0 )
              <li class="parent" >
                  <a href="{{ $access->menu->route }}">
                      <i class="{{ $access->menu->icon }}"></i>
                      <span>{{ $access->menu->libelle }}</span>
                      <span class="fa arrow"></span>
                  </a>
                  @if( count($access->menu->fils()) > 0 )
                  <ul class="sub-menu" >
                      @foreach(myModuleAccess() as $as)
                      @if($as->menu->parent_id == $access->menu->id)
                          <li>
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
    <div class="progress-data"><span class="progress-value">60%</span><span class="name">Current Year</span></div>
    <div class="progress">
      <div style="width: 60%;" class="progress-bar progress-bar-primary"></div>
    </div>
  </div>
</div>