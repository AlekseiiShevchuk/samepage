@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.results.title')</h3>
    
    {!! Form::model($result, ['method' => 'PUT', 'route' => ['results.update', $result->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('x_coordinate', 'X coordinate*', ['class' => 'control-label']) !!}
                    {!! Form::number('x_coordinate', old('x_coordinate'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('x_coordinate'))
                        <p class="help-block">
                            {{ $errors->first('x_coordinate') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('y_coordinate', 'Y coordinate*', ['class' => 'control-label']) !!}
                    {!! Form::number('y_coordinate', old('y_coordinate'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('y_coordinate'))
                        <p class="help-block">
                            {{ $errors->first('y_coordinate') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('rotary_angle', 'Rotary angle', ['class' => 'control-label']) !!}
                    {!! Form::number('rotary_angle', old('rotary_angle'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('rotary_angle'))
                        <p class="help-block">
                            {{ $errors->first('rotary_angle') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('for_image_id', 'For image*', ['class' => 'control-label']) !!}
                    {!! Form::select('for_image_id', $for_images, old('for_image_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('for_image_id'))
                        <p class="help-block">
                            {{ $errors->first('for_image_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('by_player_id', 'By player*', ['class' => 'control-label']) !!}
                    {!! Form::select('by_player_id', $by_players, old('by_player_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('by_player_id'))
                        <p class="help-block">
                            {{ $errors->first('by_player_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('for_game_id', 'For game*', ['class' => 'control-label']) !!}
                    {!! Form::select('for_game_id', $for_games, old('for_game_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('for_game_id'))
                        <p class="help-block">
                            {{ $errors->first('for_game_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('owner_base_result', 'Owner base result*', ['class' => 'control-label']) !!}
                    {!! Form::hidden('owner_base_result', 0) !!}
                    {!! Form::checkbox('owner_base_result', 1, old('owner_base_result')) !!}
                    <p class="help-block"></p>
                    @if($errors->has('owner_base_result'))
                        <p class="help-block">
                            {{ $errors->first('owner_base_result') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

