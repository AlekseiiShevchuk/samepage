@extends('layouts.app')
@section('content')
    <h3 class="page-title">@lang('quickadmin.scenarios.title')</h3>

    {!! Form::model($scenario, ['method' => 'PUT', 'route' => ['scenarios.update', $scenario->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.edit')
        </div>
        <div class="panel-body">
            <div class="row">
                <script>
                    $(function () {
                        $("#sortable").sortable();
                        $("#sortable").disableSelection();
                    });
                </script>
                <ul id="sortable">
                    @foreach($images as $image)
                        <li class="ui-state-big" id="{{$image->id}}"><span style="background-image:url("{{ asset('uploads/' . $image->image) }}"); width: 100px; height: auto">{{$image->id}}</span></li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>

    {!! Form::submit(trans('quickadmin.update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop