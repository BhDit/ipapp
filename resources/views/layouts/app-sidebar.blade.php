@extends('layouts.app')
@section('structure')
    <div class="col-md-8">
        @yield('content')
    </div>
    <div class="col-md-4">
        @yield('sidebar')
    </div>
@endsection