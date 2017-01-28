@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.backgrounds.title')</h3>
    
    {!! Form::model($background, ['method' => 'PUT', 'route' => ['backgrounds.update', $background->id], 'files' => true,]) !!}

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
                    @if ($background->background_image)
                        <a href="{{ asset('uploads/'.$background->background_image) }}" target="_blank"><img src="{{ asset('uploads/thumb/'.$background->background_image) }}"></a>
                    @endif
                    {!! Form::label('background_image', 'Background image', ['class' => 'control-label']) !!}
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

    {!! Form::submit(trans('quickadmin.update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

