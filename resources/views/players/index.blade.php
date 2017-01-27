@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.players.title')</h3>
    @can('player_create')
    <p>
        <a href="{{ route('players.create') }}" class="btn btn-success">@lang('quickadmin.add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($players) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        @can('player_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

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
                                @can('player_delete')
                                    <td></td>
                                @endcan

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
    </div>
@stop

@section('javascript') 
    <script>
        @can('player_delete')
            window.route_mass_crud_entries_destroy = '{{ route('players.mass_destroy') }}';
        @endcan

    </script>
@endsection