<?php
    $modules =  Session::get('modules');
?>
<ul class="dropdown-menu be-connections" style="width: auto">
    <li>
        <div class="list">
            <div class="content">
                @for($i=0;$i < ceil(count($modules)/3);$i++)
                    <div class="row">
                    @foreach( $modules as $module)
                        @if($loop->index>= $i*3 && $loop->index < (($i*3)+3))
                            <div class="col-xs-4">
                                <a href="{!! route('modules.set',[$module['id']]) !!}" class="connection-item">
                                    <img src="{{$module['icone']}}" alt="{{$module['libelle']}}">
                                    <span>{{$module['libelle']}}</span>
                                </a>
                            </div>
                        @endif
                    @endforeach
                    </div>
                @endfor
            </div>
        </div>
        <div class="footer"> <a href="#">Modules</a></div>
    </li>
</ul>