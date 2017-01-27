@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.scenarios.title')</h3>
    @can('scenario_create')
    <p>
        <a href="{{ route('scenarios.create') }}" class="btn btn-success">@lang('quickadmin.add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($scenarios) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        @can('scenario_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.scenarios.fields.name')</th>
                        <th>@lang('quickadmin.scenarios.fields.description')</th>
                        <th>@lang('quickadmin.scenarios.fields.background')</th>
                        <th>@lang('quickadmin.scenarios.fields.images')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($scenarios) > 0)
                        @foreach ($scenarios as $scenario)
                            <tr data-entry-id="{{ $scenario->id }}">
                                @can('scenario_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $scenario->name }}</td>
                                <td>{{ $scenario->description }}</td>
                                <td>{{ $scenario->background->description or '' }}</td>
                                <td>
                                    @foreach ($scenario->images as $singleImages)
                                        <span class="label label-info label-many">{{ $singleImages->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @can('scenario_view')
                                    <a href="{{ route('scenarios.show',[$scenario->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                                    @endcan
                                    @can('scenario_edit')
                                    <a href="{{ route('scenarios.edit',[$scenario->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.edit')</a>
                                    @endcan
                                    @can('scenario_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                        'route' => ['scenarios.destroy', $scenario->id])) !!}
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
@stop

@section('javascript') 
    <script>
        @can('scenario_delete')
            window.route_mass_crud_entries_destroy = '{{ route('scenarios.mass_destroy') }}';
        @endcan

    </script>
@endsection