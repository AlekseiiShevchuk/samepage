@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.backgrounds.title')</h3>
    @can('background_create')
    <p>
        <a href="{{ route('backgrounds.create') }}" class="btn btn-success">@lang('quickadmin.add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($backgrounds) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        @can('background_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.backgrounds.fields.name')</th>
                        <th>@lang('quickadmin.backgrounds.fields.description')</th>
                        <th>@lang('quickadmin.backgrounds.fields.background-image')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($backgrounds) > 0)
                        @foreach ($backgrounds as $background)
                            <tr data-entry-id="{{ $background->id }}">
                                @can('background_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $background->name }}</td>
                                <td>{{ $background->description }}</td>
                                <td>@if($background->background_image)<a href="{{ asset('uploads/' . $background->background_image) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $background->background_image) }}"/></a>@endif</td>
                                <td>
                                    @can('background_view')
                                    <a href="{{ route('backgrounds.show',[$background->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                                    @endcan
                                    @can('background_edit')
                                    <a href="{{ route('backgrounds.edit',[$background->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.edit')</a>
                                    @endcan
                                    @can('background_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                        'route' => ['backgrounds.destroy', $background->id])) !!}
                                    {!! Form::submit(trans('quickadmin.delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">@lang('quickadmin.no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('background_delete')
            window.route_mass_crud_entries_destroy = '{{ route('backgrounds.mass_destroy') }}';
        @endcan

    </script>
@endsection