@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.game-results.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.game-results.fields.x-coordinate')</th>
                            <td>{{ $game_result->x_coordinate }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.game-results.fields.y-coordinate')</th>
                            <td>{{ $game_result->y_coordinate }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.game-results.fields.rotary-angle')</th>
                            <td>{{ $game_result->rotary_angle }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.game-results.fields.for-image')</th>
                            <td>{{ $game_result->for_image->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.game-results.fields.by-player')</th>
                            <td>{{ $game_result->by_player->device_id or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.game-results.fields.for-game')</th>
                            <td>{{ $game_result->for_game->game_id or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.game-results.fields.owner-base-result')</th>
                            <td>{{ Form::checkbox("owner_base_result", 1, $game_result->owner_base_result == 1, ["disabled"]) }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#players" aria-controls="players" role="tab" data-toggle="tab">Players</a></li>
<li role="presentation" class=""><a href="#games" aria-controls="games" role="tab" data-toggle="tab">Games</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="players">
<table class="table table-bordered table-striped {{ count($players) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.players.fields.device-id')</th>
                        <th>@lang('quickadmin.players.fields.nickname')</th>
                        <th>@lang('quickadmin.players.fields.results')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($players) > 0)
            @foreach ($players as $player)
                <tr data-entry-id="{{ $player->id }}">
                    <td>{{ $player->device_id }}</td>
                                <td>{{ $player->nickname }}</td>
                                <td>
                                    @foreach ($player->results as $singleResults)
                                        <span class="label label-info label-many">{{ $singleResults->x_coordinate }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @can('player_view')
                                    <a href="{{ route('players.show',[$player->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                                    @endcan
                                    @can('player_edit')
                                    <a href="{{ route('players.edit',[$player->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.edit')</a>
                                    @endcan
                                    @can('player_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                        'route' => ['players.destroy', $player->id])) !!}
                                    {!! Form::submit(trans('quickadmin.delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5">@lang('quickadmin.no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="games">
<table class="table table-bordered table-striped {{ count($games) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.games.fields.name')</th>
                        <th>@lang('quickadmin.games.fields.game-id')</th>
                        <th>@lang('quickadmin.games.fields.owner')</th>
                        <th>@lang('quickadmin.games.fields.players')</th>
                        <th>@lang('quickadmin.games.fields.is-active')</th>
                        <th>@lang('quickadmin.games.fields.results')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($games) > 0)
            @foreach ($games as $game)
                <tr data-entry-id="{{ $game->id }}">
                    <td>{{ $game->name }}</td>
                                <td>{{ $game->game_id }}</td>
                                <td>{{ $game->owner->nickname or '' }}</td>
                                <td>
                                    @foreach ($game->players as $singlePlayers)
                                        <span class="label label-info label-many">{{ $singlePlayers->nickname }}</span>
                                    @endforeach
                                </td>
                                <td>{{ Form::checkbox("is_active", 1, $game->is_active == 1, ["disabled"]) }}</td>
                                <td>
                                    @foreach ($game->results as $singleResults)
                                        <span class="label label-info label-many">{{ $singleResults->x_coordinate }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @can('game_view')
                                    <a href="{{ route('games.show',[$game->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                                    @endcan
                                    @can('game_edit')
                                    <a href="{{ route('games.edit',[$game->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.edit')</a>
                                    @endcan
                                    @can('game_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                        'route' => ['games.destroy', $game->id])) !!}
                                    {!! Form::submit(trans('quickadmin.delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8">@lang('quickadmin.no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('game_results.index') }}" class="btn btn-default">@lang('quickadmin.back_to_list')</a>
        </div>
    </div>
@stop