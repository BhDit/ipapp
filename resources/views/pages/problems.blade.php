@extends ('layouts.app-full')
@section('content')
    <problem-list></problem-list>
@endsection
@section('end-scripts')
    <script src="{{asset('js/problems-page.js')}}"></script>
@endsection