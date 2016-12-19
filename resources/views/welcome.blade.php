@extends('layouts.app-full')
@section('content')
    <h1>  Welcome to SmartAsk!</h1>
	<br>
	<h3>  That's the place where everybody can found answers.</h3>
	<br>
	 <br>
	<img src="http://elfhq.com/wp-content/uploads/2013/10/santahuh08.jpg" alt="No image">
	<br><br><br><br>
 <hr>
<div class="cd-form-wrapper cd-container">
	<form class="cd-form">
		<label class="cd-label" for="cd-email">Subscribe</label>
		<input type="email" id="cd-email" class="cd-email" name="cd-email" placeholder="Enter your email address">
		<input type="submit" class="cd-submit" value="Submit">
		<div class="cd-loading"></div>
	</form>
 
</div>
	
	 <center><a href="https://docs.google.com/document/d/1bLAzkcCbQLpd1Jjb90k1EPG1pWY414T_VeoYR8ajbsM/edit?usp=sharing ">Privacy Policy</a>
	 </center>
@endsection

