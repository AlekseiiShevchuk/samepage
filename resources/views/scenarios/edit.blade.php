@extends('layouts.app')
@section('content')
    <h3 class="page-title">@lang('quickadmin.scenarios.title')</h3>
    
    {!! Form::model($scenario, ['method' => 'PUT', 'route' => ['scenarios.update', $scenario->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.edit')
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
                    {!! Form::label('section_id', 'Section*', ['class' => 'control-label']) !!}
                    {!! Form::select('section_id', $sections, old('section_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('section_id'))
                        <p class="help-block">
                            {{ $errors->first('section_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    @if ($scenario->cover_image)
                        <a href="{{ asset('uploads/'.$scenario->cover_image) }}" target="_blank"><img src="{{ asset('uploads/thumb/'.$scenario->cover_image) }}"></a>
                    @endif
                    {!! Form::label('cover_image', 'Cover Image', ['class' => 'control-label']) !!}
                    {!! Form::file('cover_image', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('cover_image_max_size', 8) !!}
                    {!! Form::hidden('cover_image_max_width', 4000) !!}
                    {!! Form::hidden('cover_image_max_height', 4000) !!}
                    <p class="help-block"></p>
                    @if($errors->has('cover_image'))
                        <p class="help-block">
                            {{ $errors->first('cover_image') }}
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
                <div class="col-xs-3 form-group">
                    {!! Form::label('bottom_scale', 'Bottom scale*', ['class' => 'control-label']) !!}
                    {!! Form::number('bottom_scale', old('bottom_scale'), ['class' => 'form-control', 'placeholder' => '', 'min' => 1, 'max' => 100]) !!}
                    <p class="help-block"></p>
                    @if($errors->has('bottom_scale'))
                        <p class="help-block">
                            {{ $errors->first('bottom_scale') }}
                        </p>
                    @endif
                </div>

                <div class="col-xs-3 form-group">
                    {!! Form::label('center_scale', 'Center scale*', ['class' => 'control-label']) !!}
                    {!! Form::number('center_scale', old('center_scale'), ['class' => 'form-control', 'placeholder' => '', 'min' => 1, 'max' => 100]) !!}
                    <p class="help-block"></p>
                    @if($errors->has('center_scale'))
                        <p class="help-block">
                            {{ $errors->first('center_scale') }}
                        </p>
                    @endif
                </div>

                <div class="col-xs-3 form-group">
                    {!! Form::label('top_scale', 'Top scale*', ['class' => 'control-label']) !!}
                    {!! Form::number('top_scale', old('top_scale'), ['class' => 'form-control', 'placeholder' => '', 'min' => 1, 'max' => 100]) !!}
                    <p class="help-block"></p>
                    @if($errors->has('top_scale'))
                        <p class="help-block">
                            {{ $errors->first('top_scale') }}
                        </p>
                    @endif
                </div>

                <div class="col-xs-3 form-group">
                    {!! Form::label('horizon_height', 'Horizon height*', ['class' => 'control-label']) !!}
                    {!! Form::number('horizon_height', old('horizon_height'), ['class' => 'form-control', 'placeholder' => '', 'min' => 1, 'max' => 100]) !!}
                    <p class="help-block"></p>
                    @if($errors->has('horizon_height'))
                        <p class="help-block">
                            {{ $errors->first('horizon_height') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('background_id', 'Background*', ['class' => 'control-label']) !!}
                    {!! Form::select('background_id', $backgrounds, old('background_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('background_id'))
                        <p class="help-block">
                            {{ $errors->first('background_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

