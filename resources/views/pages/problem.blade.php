@extends('layouts.app-sidebar')
@section('head-scripts')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/styles/default.min.css">
@endsection
@section('css')
    <style>
        .problem {
            color: #000;
        }
        .problem .problem-title{
            margin-bottom:30px;
        }
    </style>

@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 problem">
            <h3 class="problem-title">{{$problem->title}}</h3>
            <p class="problem-description">{!! $problem->parsedDescription !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if($loggedin)
                <problem-component :problem="{{$problem}}"
                                   :user-problem-stats="{{json_encode($user_problem_stats)}}"></problem-component>
            @else
                <div class="alert alert-info">
                    You have to be signed in to answer.
                </div>
            @endif
        </div>
    </div>
@endsection
@section('sidebar')
    @include('partials.sidebar-general')
@endsection
@section('css')
    .problem {
    color: #000;
    }
    .problem .problem-title{
    margin-bottom:30px;
    }
@endsection
@section('end-scripts')
    <script src="{{asset('js/problem-page.js')}}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/highlight.min.js"></script>
    <script>
        $(document).ready(function () {
            $('pre code').each(function (i, block) {
                hljs.highlightBlock(block);
            });
        });
    </script>
@endsection