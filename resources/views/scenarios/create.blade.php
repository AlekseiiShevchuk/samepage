@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.scenarios.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['scenarios.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.create')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                    {!! Form::text('description', old('description'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('background_id', 'Select Background', ['class' => 'control-label']) !!}
                    {!! Form::select('background_id', $backgrounds, old('background_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('background_id'))
                        <p class="help-block">
                            {{ $errors->first('background_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('background_image', 'OR Upload Background:', ['class' => 'control-label']) !!}
                            {!! Form::file('background_image', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                            {!! Form::hidden('background_image_max_size', 8) !!}
                            {!! Form::hidden('background_image_max_width', 4000) !!}
                            {!! Form::hidden('background_image_max_height', 4000) !!}
                            <p class="help-block"></p>
                            @if($errors->has('background_image'))
                                <p class="help-block">
                                    {{ $errors->first('background_image') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('images', 'Images*', ['class' => 'control-label']) !!}
                    {!! Form::select('images[]', $images, old('images'), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('images'))
                        <p class="help-block">
                            {{ $errors->first('images') }}
                        </p>
                    @endif
                </div>
            </div>

        </div>
    </div>

    {!! Form::submit(trans('quickadmin.save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

