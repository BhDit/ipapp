@extends('layouts.app-full')

@section('content')
            <dashboard></dashboard>
@endsection
@section('end-scripts')
    <script src="{{url('/js/dashboard.js')}}"></script>
@endsection