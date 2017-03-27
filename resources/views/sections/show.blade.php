@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.section.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.section.fields.name')</th>
                            <td>{{ $section->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.section.fields.scenarios')</th>
                            <td>
                                @foreach ($section->scenarios as $singleScenarios)
                                    <span class="label label-info label-many">{{ $singleScenarios->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('sections.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop