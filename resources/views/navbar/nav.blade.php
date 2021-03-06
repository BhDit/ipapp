<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse">

                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                @if(Auth::check())
                    <li><a href="{{url('home')}}">Dashboard</a></li>
                @endif
                <li class="{{ Request::is('problems') ? "active" : "" }}"><a href="{{url('problems')}}">Problems</a>
                </li>
                <li class="{{ Request::is('contact') ? "active" : "" }}"><a href="{{url('contact')}}">Contact</a></li>
                {{--<li class="{{ Request::is('news') ? "active" : "" }}"><a href="{{url('news')}}">News</a></li>--}}
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li class="{{ Request::is('login') ? "active" : "" }}"><a href="{{ url('/login') }}">Login</a></li>
                    <li class="{{ Request::is('register') ? "active" : "" }}"><a
                                href="{{ url('/register') }}">Register</a></li>
                @else
                    {{--clopotel--}}
                    <li>
                        <a @click="showNotifications" class="has-activity-indicator has-pointer" style=
                        "padding-bottom: 0
                        ;">
                        <div class="navbar-icon">
                            <i class="activity-indicator" v-if="hasUnreadNotifications || hasUnreadAnnouncements"></i>
                            <i class="icon glyphicon glyphicon-bell"></i>
                        </div>
                        </a>
                    </li>
                    <li>
                        <a>
                            <b v-text="user.xp+' XP'"></b>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">
                            <div style="float: left;">
                                <div style="float: left;line-height: 10px;">
                                    @{{user.name}}
                                </div>
                                <br>
                                <div style="float: right;font-size: 14px;margin-top:-10px">
                                    <span class="label label-success">@{{user.points}} points</span>
                                </div>
                            </div>
                            <span class="caret" style="margin-left: 10px;"></span></a>

                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{url('/profile/edit')}}">Edit profile</a>
                            </li>
                            <li class="delimiter"></li>
                            <li>
                                <a href="{{ url('/logout') }}"
                                   @click.prevent="logout">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>