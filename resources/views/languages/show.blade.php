@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.languages.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.languages.fields.abbreviation')</th>
                            <td>{{ $language->abbreviation }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.languages.fields.name')</th>
                            <td>{{ $language->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.languages.fields.is-active-for-admin')</th>
                            <td>{{ Form::checkbox("is_active_for_admin", 1, $language->is_active_for_admin == 1, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.languages.fields.is-active-for-users')</th>
                            <td>{{ Form::checkbox("is_active_for_users", 1, $language->is_active_for_users == 1, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.languages.fields.flag-image')</th>
                            <td>@if($language->flag_image)<a href="{{ asset('uploads/' . $language->flag_image) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $language->flag_image) }}"/></a>@endif</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('languages.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop