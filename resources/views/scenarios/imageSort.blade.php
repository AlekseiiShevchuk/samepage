@extends('layouts.app')
@section('content')
    <h3 class="page-title">@lang('quickadmin.scenarios.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            Sort Images foe Scenario
        </div>
        <div class="panel-body">
            <div class="row">
                <script>
                    $(function () {
                        $("#sortable").sortable();
                        $("#sortable").disableSelection();
                    });
                    var sortedIDs = $( "#sortable" ).sortable( "id" );
                    function sendSortingToServer() {
                        console.log(sortedIDs);
                    }
                </script>
                <ul id="sortable">
                    @foreach($images as $image)
                        <li class="ui-state-big" id="{{$image->id}}"><span><img src="{{ asset('uploads/' . $image->image) }}" style="width: 100px; height: auto">{{$image->id}}</span></li>
                    @endforeach
                </ul>
            </div>
            <button onclick="sendSortingToServer()">Save sorting</button>
        </div>

    </div>
@stop