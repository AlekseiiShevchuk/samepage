@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.results.title')</h3>
    @can('result_create')
    <p>
        <a href="{{ route('results.create') }}" class="btn btn-success">@lang('quickadmin.add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($results) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        @can('result_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

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
                                @can('result_delete')
                                    <td></td>
                                @endcan

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
@stop

@section('javascript') 
    <script>
        @can('result_delete')
            window.route_mass_crud_entries_destroy = '{{ route('results.mass_destroy') }}';
        @endcan

    </script>
@endsection