@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.scenarios.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.scenarios.fields.name')</th>
                            <td>{{ $scenario->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.scenarios.fields.description')</th>
                            <td>{{ $scenario->description }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.scenarios.fields.background')</th>
                            <td>{{ $scenario->background->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.scenarios.fields.images')</th>
                            <td>
                                @foreach ($scenario->images as $singleImages)
                                    <span class="label label-info label-many">{{ $singleImages->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('scenarios.index') }}" class="btn btn-default">@lang('quickadmin.back_to_list')</a>
        </div>
    </div>
@stop