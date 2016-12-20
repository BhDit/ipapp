@extends ('layouts.app-full')
@section('content')
    <problem-list></problem-list>
@endsection
@section('sidebar')
    <br><br><br>
	 <center><a href="https://docs.google.com/document/d/1bLAzkcCbQLpd1Jjb90k1EPG1pWY414T_VeoYR8ajbsM/edit?usp=sharing ">Privacy Policy</a>
	 </center>
@endsection
@section('end-scripts')
    <script src="{{asset('js/problems-page.js')}}"></script>
	<hr>
	 <center><a href="https://docs.google.com/document/d/1bLAzkcCbQLpd1Jjb90k1EPG1pWY414T_VeoYR8ajbsM/edit?usp=sharing ">Privacy Policy</a>
	 </center>
@endsection