@extends('layouts.app')

@section('content')
    <div class="container">
        <profile-edit-form></profile-edit-form>
    </div>
@endsection
@section('end-scripts')
    <script src="{{url('/js/profile-edit.js')}}"></script>
@endsection