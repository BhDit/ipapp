@extends('layouts.app-full')
@section('content')
    <h2>
        Contacteaza-ne
    </h2>
    <hr>
    <form class="form-horizontal" role="form" method="post">
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="">
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" placeholder="email@domain.com"
                       value="">
            </div>
        </div>
        <div class="form-group">
            <label for="message" class="col-sm-2 control-label">Message</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="4" id="message" name="message"></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary pull-right">
            </div>
        </div>
    </form>
    Ne poti gasi si pe

    <a target="_blank" title="follow us on twitter" href="http://www.twitter.com/PLACEHOLDER"><img
                alt="follow me on twitter" src="//login.create.net/images/icons/user/twitter-b_30x30.png" border=0></a>
    <a target="_blank" title="find us on Facebook" href="https://www.facebook.com/smartaskromania/"><img
                alt="follow me on facebook" src="//login.create.net/images/icons/user/facebook_30x30.png" border=0></a>
    <a target="_blank" title="follow us on youtube" href="http://www.youtube.com/PLACEHOLDER"><img
                alt="follow me on youtube" src="https://c866088.ssl.cf3.rackcdn.com/assets/youtube30x30.png"
                border=0></a>
    <a target="_blank" title="follow us on google plus" href="https://plus.google.com/PLACEHOLDER"><img
                alt="follow me on google plus" src="https://c866088.ssl.cf3.rackcdn.com/assets/googleplus30x30.png"
                border=0></a>
    <a target="_blank" title="follow us on pinterest" href="http://www.pinterest.com/PLACEHOLDER"><img
                alt="follow me on pinterest" src="https://c866088.ssl.cf3.rackcdn.com/assets/pinterest30x30.png"
                border=0></a>
    <hr>
@endsection
