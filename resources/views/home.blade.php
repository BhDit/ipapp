@extends('layouts.app-full')

@section('content')
    <profile-edit-form></profile-edit-form>
    @if(\Auth::check())
        <button type="button" @click="dbrefresh">Refresh DB</button>
    @endif
@endsection
@section('end-scripts')
    <script src="{{url('/js/profile-edit.js')}}"></script>
@endsection