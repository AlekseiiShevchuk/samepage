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
                        <th>Section</th>
                        <th>Scale Bottom/<br>Scale Center/<br>Scale Top/<br>Horizon height</th>
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
                                <td>{{ $scenario->section->name or '' }}</td>
                                <td>{{ $scenario->bottom_scale}}/{{ $scenario->center_scale}}/{{ $scenario->top_scale}}/{{ $scenario->horizon_height}}</td>
                                <td>{{ $scenario->description }}</td>
                                <td>
                                    <a href="{{route('backgrounds.edit', ['id' => $scenario->background->id])}}" target="_blank"><img src="{{ asset('uploads/thumb/' . $scenario->background->background_image) }}"/></a>
                                    {{--{{ $scenario->background->name or '' }}--}}
                                </td>
                                <td id="sortable{{ $scenario->id }}">
                                    @foreach ($scenario->images()->orderBy('pivot_order_num')->get() as $singleImages)
                                        @if($singleImages->image)
                                            <div class="inline-block">
                                            <a href="{{route('images.edit', ['id' => $singleImages->id])}}" target="_blank">
                                                <img src="{{ asset('uploads/thumb/' . $singleImages->image) }}"/>
                                            </a>
                                            {!! Form::open(array(
                                                'style' => 'display: inline;',
                                                'method' => 'DELETE',
                                                'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                                'route' => ['images.destroy', $singleImages->id])) !!}
                                            {!! Form::submit('X', array(
                                            'class' => 'btn btn-xs btn-circle btn-danger',
                                            'style' => 'margin-top:-30px'
                                            )) !!}
                                            {!! Form::close() !!}
                                        </div>
                                        @endif
                                    @endforeach
                                </td>
                                <td>

                                    <a href="{{ route('images.create') }}?for_scenario={{$scenario->id}}" class="btn btn-xs btn-primary">add image</a>
                                    <a href="{{ route('scenarios.sortImages',[$scenario->id]) }}" class="btn btn-xs btn-primary">sort images</a>
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