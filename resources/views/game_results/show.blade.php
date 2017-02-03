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
                            <th>@lang('quickadmin.game-results.fields.results')</th>
                            <td>
                                @foreach ($game_result->results as $singleResults)
                                    <a  class="label label-info label-many" href="{{route('results.show',$singleResults->id)}}">Id:{{ $singleResults->id or '' }}</a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.game-results.fields.is-owner-etalon')</th>
                            <td>{{ Form::checkbox("is_owner_etalon", 1, $game_result->is_owner_etalon == 1, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.game-results.fields.for-game')</th>
                            <td>
                                <a  class="label label-info label-many" href="{{route('games.show',$game_result->for_game->id)}}">{{ $game_result->for_game->name or '' }}</a>
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.game-results.fields.by-player')</th>
                            <td>
                                <a  class="label label-info label-many" href="{{route('players.show',$game_result->by_player->id)}}">{{ $game_result->by_player->nickname or '' }}</a>
                            </td>
                        </tr>
                        <tr>
                            <th>background height</th>
                            <td>
                                <span  class="label label-info label-many">{{ $game_result->background_height or '' }}</span>
                            </td>
                        </tr>
                            <th>background weight</th>
                            <td>
                                <span  class="label label-info label-many">{{ $game_result->background_weight or '' }}</span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('game_results.index') }}" class="btn btn-default">@lang('quickadmin.back_to_list')</a>
        </div>
    </div>
@stop