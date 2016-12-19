@extends('layouts.app-full')
@section('content')
    <h1>CONTENT</h1>
	<br>
	Welcome to SmartAsk! 
	

<div class="cd-form-wrapper cd-container">
	<form class="cd-form"><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<label class="cd-label" for="cd-email">Subscribe</label>
		<input type="email" id="cd-email" class="cd-email" name="cd-email" placeholder="Enter your email address">
		<input type="submit" class="cd-submit" value="Submit">
		<div class="cd-loading"></div>
	</form>
 
</div>
	
@endsection

