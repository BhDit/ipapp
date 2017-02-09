@extends('layouts.app-full')

@section('content')
    <div >
       <dashboard></dashboard>
    </div>
@endsection
@section('end-scripts')
    <script src="{{url('/js/dashboard.js')}}"></script>
@endsection