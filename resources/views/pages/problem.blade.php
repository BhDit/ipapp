@extends('layouts.app-sidebar')
@section('head-scripts')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/styles/default.min.css">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3>{{$problem->title}}</h3>
            <p>{{$problem->description}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
                <problem-component :problem="{{$problem}}" :user-problem-stats="{{json_encode($user_problem_stats)}}"></problem-component>
        </div>prof
    </div>
@endsection
@section('sidebar')
    Anything in sidebar goes here
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