@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.results.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.results.fields.x-coordinate')</th>
                            <td>{{ $result->x_coordinate }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.results.fields.y-coordinate')</th>
                            <td>{{ $result->y_coordinate }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.results.fields.rotary-angle')</th>
                            <td>{{ $result->rotary_angle }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.results.fields.for-image')</th>
                            <td>{{ $result->for_image->name or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('results.index') }}" class="btn btn-default">@lang('quickadmin.back_to_list')</a>
        </div>
    </div>
@stop