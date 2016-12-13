<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Smart Ask</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
<div class="container">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="/">Welcome</a></li>
        <li><a data-toggle="tab" href="/profile">Profile</a></li>
        <li><a data-toggle="tab" href="/problems">Problems</a></li>
        <li><a data-toggle="tab" href="/contact">Contacts</a></li>
        <li><a data-toggle="tab" href="/news">News</a></li>
        <li><a data-toggle="tab" href="/signin">Sign in</a></li>
    </ul>
</div>

<table style="width:100%">
    <tr >
        <th style="width:20%">
            <ul>
                <li><a class="active">PROBLEMS</a></li>
                <li><a >Nivel easy</a></li>
                <li><a href="/question">intrebarea 1</a></li>
                <li><a >Nivel middle</a></li>
                <li><a href="/question">intrebarea 2</a></li>
                <li><a >Nivel hard</a></li>
                <li><a href="/question">intrbarea 3</a></li>
                @yield('part1')
            </ul></th>
        <th  style="width:50%">
@yield('part2')
        </th>
        <th style="width:20%">
@yield('part3')
        </th>
    </tr>
</table>
<div id="footer">
    Copyright &copy; 2017 Smart Ask. All rights reserved.
</div>
</body>
</html>
