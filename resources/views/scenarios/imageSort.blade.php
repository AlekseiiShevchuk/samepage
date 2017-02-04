@extends('layouts.app')
@section('content')
    <h3 class="page-title">@lang('quickadmin.scenarios.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            Sort Images foe Scenario
        </div>
        <div class="panel-body">
            <div class="alert alert-info">Just move images in order you want (using your mouse) and positions will be saved automatic</div>
            <div class="row">


                <ul id="sortable">
                    @foreach($images as $image)
                        <li class="ui-state-big" id="{{$image->id}}"><span><img
                                        src="{{ asset('uploads/' . $image->image) }}"
                                        style="width: 100px; height: auto">{{$image->id}}</span></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $('#sortable').sortable({
                update: function (event, ui) {
                    var postData = $(this).sortable('toArray');
                    //console.log(postData);
                    $.post('',{images: postData}, function (o) {
                        console.log(o);
                    }, 'json');
                }
            });
        });
    </script>
@stop