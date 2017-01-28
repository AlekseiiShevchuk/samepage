@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.images.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.images.fields.name')</th>
                            <td>{{ $image->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.images.fields.description')</th>
                            <td>{{ $image->description }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.images.fields.image')</th>
                            <td>@if($image->image)<a href="{{ asset('uploads/' . $image->image) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $image->image) }}"/></a>@endif</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#scenarios" aria-controls="scenarios" role="tab" data-toggle="tab">Scenarios</a></li>
<li role="presentation" class=""><a href="#results" aria-controls="results" role="tab" data-toggle="tab">Results</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="scenarios">
<table class="table table-bordered table-striped {{ count($scenarios) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
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
                    <td>{{ $scenario->name }}</td>
                                <td>{{ $scenario->description }}</td>
                                <td>{{ $scenario->background->name or '' }}</td>
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

            <a href="{{ route('images.index') }}" class="btn btn-default">@lang('quickadmin.back_to_list')</a>
        </div>
    </div>
@stop