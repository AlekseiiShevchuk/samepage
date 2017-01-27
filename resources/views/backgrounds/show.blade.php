@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.backgrounds.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.backgrounds.fields.name')</th>
                            <td>{{ $background->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.backgrounds.fields.description')</th>
                            <td>{{ $background->description }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.backgrounds.fields.background-image')</th>
                            <td>@if($background->background_image)<a href="{{ asset('uploads/' . $background->background_image) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $background->background_image) }}"/></a>@endif</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#scenarios" aria-controls="scenarios" role="tab" data-toggle="tab">Scenarios</a></li>
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

            <p>&nbsp;</p>

            <a href="{{ route('backgrounds.index') }}" class="btn btn-default">@lang('quickadmin.back_to_list')</a>
        </div>
    </div>
@stop