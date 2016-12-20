@extends('layouts.app-full')
@section('head-scripts')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/styles/default.min.css">
@endsection
@section('content')
     Stiri de ultima ora!

     <div class="cd-form-wrapper cd-container">
         <form class="cd-form">
             <label class="cd-label" for="cd-email">Subscribe</label>
             <input type="email" id="cd-email" class="cd-email" name="cd-email" placeholder="Enter your email address">
             <input type="submit" class="cd-submit" value="Submit">
             <div class="cd-loading"></div>
         </form>
     </div>
@endsection
@section('sidebar')
    Anything in sidebar goes here
@endsection

@section('end-scripts')
       

@endsection