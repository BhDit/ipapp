@extends('layouts.app')

@section('content')
        <profile-edit-form></profile-edit-form>
@endsection
@section('end-scripts')
    <script src="{{url('/js/profile-edit.js')}}"></script>
@endsection