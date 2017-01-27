@inject('request', 'Illuminate\Http\Request')
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu"
            data-keep-expanded="false"
            data-auto-scroll="true"
            data-slide-speed="200">
            
            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.dashboard')</span>
                </a>
            </li>

            
            @can('user_management_access')
            <li>
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('quickadmin.user-management.title')</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="sub-menu">
                
                @can('role_access')
                <li class="{{ $request->segment(1) == 'roles' ? 'active active-sub' : '' }}">
                        <a href="{{ route('roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('quickadmin.roles.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('user_access')
                <li class="{{ $request->segment(1) == 'users' ? 'active active-sub' : '' }}">
                        <a href="{{ route('users.index') }}">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                @lang('quickadmin.users.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('player_access')
            <li class="{{ $request->segment(1) == 'players' ? 'active' : '' }}">
                <a href="{{ route('players.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.players.title')</span>
                </a>
            </li>
            @endcan
            
            @can('game_mod_access')
            <li>
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.game-mod.title')</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="sub-menu">
                
                @can('scenario_access')
                <li class="{{ $request->segment(1) == 'scenarios' ? 'active active-sub' : '' }}">
                        <a href="{{ route('scenarios.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                @lang('quickadmin.scenarios.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('background_access')
                <li class="{{ $request->segment(1) == 'backgrounds' ? 'active active-sub' : '' }}">
                        <a href="{{ route('backgrounds.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                @lang('quickadmin.backgrounds.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('image_access')
                <li class="{{ $request->segment(1) == 'images' ? 'active active-sub' : '' }}">
                        <a href="{{ route('images.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                @lang('quickadmin.images.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('game_access')
                <li class="{{ $request->segment(1) == 'games' ? 'active active-sub' : '' }}">
                    <a href="{{ route('games.index') }}">
                        <i class="fa fa-gears"></i>
                        <span class="title">
                                @lang('quickadmin.games.title')
                            </span>
                    </a>
                </li>
            @endcan
            @can('game_result_access')
            <li class="{{ $request->segment(1) == 'game_results' ? 'active' : '' }}">
                <a href="{{ route('game_results.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.game-results.title')</span>
                </a>
            </li>
            @endcan
            

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.logout')</span>
                </a>
            </li>
        </ul>
    </div>
</div>
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">@lang('quickadmin.logout')</button>
{!! Form::close() !!}