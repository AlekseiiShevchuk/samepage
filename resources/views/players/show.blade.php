@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.players.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.players.fields.device-id')</th>
                            <td>{{ $player->device_id }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.players.fields.nickname')</th>
                            <td>{{ $player->nickname }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.players.fields.results')</th>
                            <td>
                                @foreach ($player->results as $singleResults)
                                    <span class="label label-info label-many">{{ $singleResults->id }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#games" aria-controls="games" role="tab" data-toggle="tab">Games</a></li>
<li role="presentation" class=""><a href="#gameresults" aria-controls="gameresults" role="tab" data-toggle="tab">Game results</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="games">
<table class="table table-bordered table-striped {{ count($games) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.games.fields.name')</th>
                        <th>@lang('quickadmin.games.fields.owner')</th>
                        <th>@lang('quickadmin.games.fields.players')</th>
                        <th>@lang('quickadmin.games.fields.is-active')</th>
                        <th>@lang('quickadmin.games.fields.owner-etalon-result')</th>
                        <th>@lang('quickadmin.games.fields.scenario')</th>
                        <th>@lang('quickadmin.games.fields.game-results')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($games) > 0)
            @foreach ($games as $game)
                <tr data-entry-id="{{ $game->id }}">
                    <td>{{ $game->name }}</td>
                                <td>{{ $game->owner->nickname or '' }}</td>
                                <td>
                                    @foreach ($game->players as $singlePlayers)
                                        <span class="label label-info label-many">{{ $singlePlayers->nickname }}</span>
                                    @endforeach
                                </td>
                                <td>{{ Form::checkbox("is_active", 1, $game->is_active == 1, ["disabled"]) }}</td>
                                <td>{{ $game->owner_etalon_result->is_owner_etalon or '' }}</td>
                                <td>{{ $game->scenario->name or '' }}</td>
                                <td>
                                    @foreach ($game->game_results as $singleGameResults)
                                        <span class="label label-info label-many">{{ $singleGameResults->is_owner_etalon }}</span>
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
                <td colspan="9">@lang('quickadmin.no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="gameresults">
<table class="table table-bordered table-striped {{ count($game_results) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.game-results.fields.results')</th>
                        <th>@lang('quickadmin.game-results.fields.is-owner-etalon')</th>
                        <th>@lang('quickadmin.game-results.fields.for-game')</th>
                        <th>@lang('quickadmin.game-results.fields.by-player')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($game_results) > 0)
            @foreach ($game_results as $game_result)
                <tr data-entry-id="{{ $game_result->id }}">
                    <td>
                                    @foreach ($game_result->results as $singleResults)
                                        <span class="label label-info label-many">{{ $singleResults->id }}</span>
                                    @endforeach
                                </td>
                                <td>{{ Form::checkbox("is_owner_etalon", 1, $game_result->is_owner_etalon == 1, ["disabled"]) }}</td>
                                <td>{{ $game_result->for_game->name or '' }}</td>
                                <td>{{ $game_result->by_player->nickname or '' }}</td>
                                <td>
                                    @can('game_result_view')
                                    <a href="{{ route('game_results.show',[$game_result->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                                    @endcan
                                    @can('game_result_edit')
                                    <a href="{{ route('game_results.edit',[$game_result->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.edit')</a>
                                    @endcan
                                    @can('game_result_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                        'route' => ['game_results.destroy', $game_result->id])) !!}
                                    {!! Form::submit(trans('quickadmin.delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6">@lang('quickadmin.no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('players.index') }}" class="btn btn-default">@lang('quickadmin.back_to_list')</a>
        </div>
    </div>
@stop