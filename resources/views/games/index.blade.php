@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.games.title')</h3>
    @can('game_create')
    <p>
        <a href="{{ route('games.create') }}" class="btn btn-success">@lang('quickadmin.add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($games) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        @can('game_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

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
                                @can('game_delete')
                                    <td></td>
                                @endcan

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
@stop

@section('javascript') 
    <script>
        @can('game_delete')
            window.route_mass_crud_entries_destroy = '{{ route('games.mass_destroy') }}';
        @endcan

    </script>
@endsection