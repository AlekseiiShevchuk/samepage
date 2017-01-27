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
    
<li role="presentation" class="active"><a href="#gameresults" aria-controls="gameresults" role="tab" data-toggle="tab">Game results</a></li>
<li role="presentation" class=""><a href="#scenarios" aria-controls="scenarios" role="tab" data-toggle="tab">Scenarios</a></li>
<li role="presentation" class=""><a href="#imagecoordinates" aria-controls="imagecoordinates" role="tab" data-toggle="tab">Image coordinates</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="gameresults">
<table class="table table-bordered table-striped {{ count($game_results) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
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
<div role="tabpanel" class="tab-pane " id="scenarios">
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
<div role="tabpanel" class="tab-pane " id="imagecoordinates">
<table class="table table-bordered table-striped {{ count($image_coordinates) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.image-coordinates.fields.x-coordinate')</th>
                        <th>@lang('quickadmin.image-coordinates.fields.y-coordinate')</th>
                        <th>@lang('quickadmin.image-coordinates.fields.rotary-angle')</th>
                        <th>@lang('quickadmin.image-coordinates.fields.for-image')</th>
                        <th>@lang('quickadmin.image-coordinates.fields.by-player')</th>
                        <th>@lang('quickadmin.image-coordinates.fields.for-game')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($image_coordinates) > 0)
            @foreach ($image_coordinates as $image_coordinate)
                <tr data-entry-id="{{ $image_coordinate->id }}">
                    <td>{{ $image_coordinate->x_coordinate }}</td>
                                <td>{{ $image_coordinate->y_coordinate }}</td>
                                <td>{{ $image_coordinate->rotary_angle }}</td>
                                <td>{{ $image_coordinate->for_image->name or '' }}</td>
                                <td>{{ $image_coordinate->by_player->device_id or '' }}</td>
                                <td>{{ $image_coordinate->for_game->game_id or '' }}</td>
                                <td>
                                    @can('image_coordinate_view')
                                    <a href="{{ route('image_coordinates.show',[$image_coordinate->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                                    @endcan
                                    @can('image_coordinate_edit')
                                    <a href="{{ route('image_coordinates.edit',[$image_coordinate->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.edit')</a>
                                    @endcan
                                    @can('image_coordinate_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                        'route' => ['image_coordinates.destroy', $image_coordinate->id])) !!}
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

            <p>&nbsp;</p>

            <a href="{{ route('images.index') }}" class="btn btn-default">@lang('quickadmin.back_to_list')</a>
        </div>
    </div>
@stop