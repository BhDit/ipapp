@extends('layouts.app-sidebar')
@section('head-scripts')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/styles/default.min.css">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3>{{$problem->title}}</h3>
            <p>{{$problem->description}}</p>
            @if($loggedin)
                @if(!$problem->isSolvedBy(auth()->user()))
                    <answer-form problem-id="{{$problem->id}}" class="pull-right"></answer-form>
                @else
                    <div class="alert alert-info">You have already solved this problem: {{$problem->answer}}</div>
                @endif
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
                    <solution-form problem-id="{{$problem->id}}"></solution-form>
                <solutions-list :solutions="{{$problem->solutions}}" problem-id="{{$problem->id}}"></solutions-list>
        </div>
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