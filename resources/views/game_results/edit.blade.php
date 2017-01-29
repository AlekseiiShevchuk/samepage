@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.game-results.title')</h3>
    
    {!! Form::model($game_result, ['method' => 'PUT', 'route' => ['game_results.update', $game_result->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('results', 'Results*', ['class' => 'control-label']) !!}
                    {!! Form::select('results[]', $results, old('results') ? old('results') : $game_result->results->pluck('id')->toArray(), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('results'))
                        <p class="help-block">
                            {{ $errors->first('results') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('is_owner_etalon', 'Is owner etalon*', ['class' => 'control-label']) !!}
                    {!! Form::hidden('is_owner_etalon', 0) !!}
                    {!! Form::checkbox('is_owner_etalon', 1, old('is_owner_etalon')) !!}
                    <p class="help-block"></p>
                    @if($errors->has('is_owner_etalon'))
                        <p class="help-block">
                            {{ $errors->first('is_owner_etalon') }}
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
                    {!! Form::label('by_player_id', 'By Player*', ['class' => 'control-label']) !!}
                    {!! Form::select('by_player_id', $by_players, old('by_player_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('by_player_id'))
                        <p class="help-block">
                            {{ $errors->first('by_player_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

