@extends ('layouts.app-sidebar')
@section('content')
    <problem-list></problem-list>
@endsection
@section('sidebar')
    sidebar
@endsection
@section('end-scripts')
    <script src="{{asset('js/problems-page.js')}}"></script>
@endsection