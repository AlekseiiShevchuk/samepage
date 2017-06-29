@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.languages.title')</h3>
    {{--@can('language_create')--}}
    {{--<p>--}}
    {{--<a href="{{ route('languages.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>--}}
    {{----}}
    {{--</p>--}}
    {{--@endcan--}}

    <div class="panel panel-default">
        {{--<div class="panel-heading">--}}
        {{--@lang('quickadmin.qa_list')--}}
        {{--</div>--}}

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($languages) > 0 ? 'datatable' : '' }}">
                <thead>
                <tr>
                    <th>@lang('quickadmin.languages.fields.abbreviation')</th>
                    <th>@lang('quickadmin.languages.fields.name')</th>
                    <th>@lang('quickadmin.languages.fields.is-active-for-admin')</th>
                    <th>@lang('quickadmin.languages.fields.is-active-for-users')</th>
                    <th>@lang('quickadmin.languages.fields.flag-image')</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>

                <tbody>
                @if (count($languages) > 0)
                    @foreach ($languages as $language)
                        <td>{{ $language->abbreviation }}</td>
                        <td>{{ $language->name }}</td>
                        <td>
                            @if($language->is_active_for_admin == 1)
                                <div class="btn-success">Active</div>
                            @endif
                            @if($language->is_active_for_admin == 0)
                                <div class="btn-info">Not active</div>
                            @endif
                        </td>
                        <td>
                            @if($language->is_active_for_users == 1)
                                <div class="btn-success">Active</div>
                            @endif
                            @if($language->is_active_for_users == 0)
                                <div class="btn-info">Not active</div>
                            @endif
                        </td>
                        <td>
                            @if($language->flag_image)
                                <a href="{{ asset('uploads/' . $language->flag_image) }}" target="_blank">
                                    <img src="{{ asset('uploads/thumb/' . $language->flag_image) }}"/>
                                </a>
                            @endif
                        </td>
                        <td>
                            {{--@can('language_view')--}}
                            {{--<a href="{{ route('languages.show',[$language->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>--}}
                            {{--@endcan--}}
                            @can('language_edit')
                                <a href="{{ route('languages.edit',[$language->id]) }}"
                                   class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                            @endcan
                            {{--@can('language_delete')--}}
                            {{--{!! Form::open(array(--}}
                            {{--'style' => 'display: inline-block;',--}}
                            {{--'method' => 'DELETE',--}}
                            {{--'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",--}}
                            {{--'route' => ['languages.destroy', $language->id])) !!}--}}
                            {{--{!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}--}}
                            {{--{!! Form::close() !!}--}}
                            {{--@endcan--}}
                        </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="9">@lang('quickadmin.qa_no_entries_in_table')</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@stop