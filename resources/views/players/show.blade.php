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
                                    <span class="label label-info label-many">{{ $singleResults->x_coordinate }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#games" aria-controls="games" role="tab" data-toggle="tab">Games</a></li>
<li role="presentation" class=""><a href="#games" aria-controls="games" role="tab" data-toggle="tab">Games</a></li>
<li role="presentation" class=""><a href="#results" aria-controls="results" role="tab" data-toggle="tab">Results</a></li>
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
                        <th>@lang('quickadmin.games.fields.results')</th>
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
                <td colspan="7">@lang('quickadmin.no_entries_in_table')</td>
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
                <td colspan="7">@lang('quickadmin.no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="results">
<table class="table table-bordered table-striped {{ count($results) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.results.fields.x-coordinate')</th>
                        <th>@lang('quickadmin.results.fields.y-coordinate')</th>
                        <th>@lang('quickadmin.results.fields.rotary-angle')</th>
                        <th>@lang('quickadmin.results.fields.for-image')</th>
                        <th>@lang('quickadmin.results.fields.by-player')</th>
                        <th>@lang('quickadmin.results.fields.for-game')</th>
                        <th>@lang('quickadmin.results.fields.owner-base-result')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($results) > 0)
            @foreach ($results as $result)
                <tr data-entry-id="{{ $result->id }}">
                    <td>{{ $result->x_coordinate }}</td>
                                <td>{{ $result->y_coordinate }}</td>
                                <td>{{ $result->rotary_angle }}</td>
                                <td>{{ $result->for_image->name or '' }}</td>
                                <td>{{ $result->by_player->nickname or '' }}</td>
                                <td>{{ $result->for_game->name or '' }}</td>
                                <td>{{ Form::checkbox("owner_base_result", 1, $result->owner_base_result == 1, ["disabled"]) }}</td>
                                <td>
                                    @can('result_view')
                                    <a href="{{ route('results.show',[$result->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                                    @endcan
                                    @can('result_edit')
                                    <a href="{{ route('results.edit',[$result->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.edit')</a>
                                    @endcan
                                    @can('result_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                        'route' => ['results.destroy', $result->id])) !!}
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
</div>

            <p>&nbsp;</p>

            <a href="{{ route('players.index') }}" class="btn btn-default">@lang('quickadmin.back_to_list')</a>
        </div>
    </div>
@stop