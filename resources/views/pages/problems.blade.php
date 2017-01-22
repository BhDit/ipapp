@extends ('layouts.app-full')
@section('content')
    <problem-list authority="{{ Auth::check()?
    \IPAPP::developer(Auth::user()->email):false }}"></problem-list>
    @if(Auth::check() && Auth::user()->isDeveloper())
        <new-problem-modal></new-problem-modal>
    @endif
@endsection
@section('end-scripts')
    <script src="{{asset('js/problems-page.js')}}"></script>
@endsection