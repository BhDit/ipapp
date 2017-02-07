<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Smart Ask</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    {!! Charts::assets() !!}
</head>

<body>

<div class="container">
    <ul class="nav nav-tabs">
        <li class="{{ Request::is('/') ? "active" : "" }}"><a data-toggle="tab" href="/">Welcome</a></li>
        <li class="{{ Request::is('profile') ? "active" : "" }}"><a data-toggle="tab" href="/profile">Profile</a></li>
        <li class="{{ Request::is('problems') ? "active" : "" }}"><a data-toggle="tab" href="/problems">Problems</a></li>
        <li class="{{ Request::is('contact') ? "active" : "" }}"><a data-toggle="tab" href="/contact">Contacts</a></li>
        <li class="{{ Request::is('news') ? "active" : "" }}"><a data-toggle="tab" href="/news">News</a></li>
        <li class="{{ Request::is('signin') ? "active" : "" }}"><a data-toggle="tab" href="/signin">Sign in</a></li>
    </ul>
</div>


<div id="footer">
    Copyright &copy; 2017 Smart Ask. All rights reserved.
</div>
</body>
</html>
