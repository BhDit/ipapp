@extends('layouts.app-sidebar')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>{{$problem->title}}</h1>
            <p>{{$problem->description}}</p>
            @if(!in_array($problem->id,\Auth::user()->solved->pluck('id')->toArray()))
                <answer-form problem-id="{{$problem->id}}" class="pull-right"></answer-form>
            @else
                <div class="alert alert-info">You have already solved this problem</div>
            @endif
        </div>
    </div>
@endsection
@section('sidebar')
    Anything in sidebar goes here
@endsection
@section('end-scripts')
    <script src="{{asset('js/problem-page.js')}}"></script>
@endsection