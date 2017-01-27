@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.game-results.title')</h3>
    @can('game_result_create')
    <p>
        <a href="{{ route('game_results.create') }}" class="btn btn-success">@lang('quickadmin.add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($game_results) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        @can('game_result_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.game-results.fields.x-coordinate')</th>
                        <th>@lang('quickadmin.game-results.fields.y-coordinate')</th>
                        <th>@lang('quickadmin.game-results.fields.rotary-angle')</th>
                        <th>@lang('quickadmin.game-results.fields.for-image')</th>
                        <th>@lang('quickadmin.game-results.fields.by-player')</th>
                        <th>@lang('quickadmin.game-results.fields.for-game')</th>
                        <th>@lang('quickadmin.game-results.fields.owner-base-result')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($game_results) > 0)
                        @foreach ($game_results as $game_result)
                            <tr data-entry-id="{{ $game_result->id }}">
                                @can('game_result_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $game_result->x_coordinate }}</td>
                                <td>{{ $game_result->y_coordinate }}</td>
                                <td>{{ $game_result->rotary_angle }}</td>
                                <td>{{ $game_result->for_image->name or '' }}</td>
                                <td>{{ $game_result->by_player->device_id or '' }}</td>
                                <td>{{ $game_result->for_game->game_id or '' }}</td>
                                <td>{{ Form::checkbox("owner_base_result", 1, $game_result->owner_base_result == 1, ["disabled"]) }}</td>
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
                            <td colspan="9">@lang('quickadmin.no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('game_result_delete')
            window.route_mass_crud_entries_destroy = '{{ route('game_results.mass_destroy') }}';
        @endcan

    </script>
@endsection