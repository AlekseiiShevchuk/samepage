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
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('images.index') }}" class="btn btn-default">@lang('quickadmin.back_to_list')</a>
        </div>
    </div>
@stop