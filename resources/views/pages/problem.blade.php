@extends('layouts.app-sidebar')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3>{{$problem->title}}</h3>
            <p>{{$problem->description}}</p>
            @if(!Auth::check())
            @elseif(!in_array($problem->id,\Auth::user()->solved->pluck('id')->toArray()))
                <answer-form problem-id="{{$problem->id}}" class="pull-right"></answer-form>
            @else
                <div class="alert alert-info">You have already solved this problem</div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <solutions-list></solutions-list>
        </div>
    </div>
@endsection
@section('sidebar')
    Anything in sidebar goes here
@endsection
@section('end-scripts')
    <script src="{{asset('js/problem-page.js')}}"></script>
@endsection