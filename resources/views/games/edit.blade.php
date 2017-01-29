@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.games.title')</h3>
    
    {!! Form::model($game, ['method' => 'PUT', 'route' => ['games.update', $game->id]]) !!}

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
                    {!! Form::label('owner_id', 'Owner*', ['class' => 'control-label']) !!}
                    {!! Form::select('owner_id', $owners, old('owner_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('owner_id'))
                        <p class="help-block">
                            {{ $errors->first('owner_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('players', 'Players', ['class' => 'control-label']) !!}
                    {!! Form::select('players[]', $players, old('players') ? old('players') : $game->players->pluck('id')->toArray(), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('players'))
                        <p class="help-block">
                            {{ $errors->first('players') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('is_active', 'Is active*', ['class' => 'control-label']) !!}
                    {!! Form::hidden('is_active', 0) !!}
                    {!! Form::checkbox('is_active', 1, old('is_active')) !!}
                    <p class="help-block"></p>
                    @if($errors->has('is_active'))
                        <p class="help-block">
                            {{ $errors->first('is_active') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('scenario_id', 'Scenario*', ['class' => 'control-label']) !!}
                    {!! Form::select('scenario_id', $scenarios, old('scenario_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('scenario_id'))
                        <p class="help-block">
                            {{ $errors->first('scenario_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

