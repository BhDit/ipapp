@extends('layouts.app')

@section('content')
    @php( dump($problem) )
    <answer-form problem-id="{{$problem->id}}"></answer-form>
@endsection
@section('end-scripts')
    <script src="{{asset('js/problem-page.js')}}"></script>
@endsection