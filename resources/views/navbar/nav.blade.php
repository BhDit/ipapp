<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger --><img src="https://s23.postimg.org/58kg2xjvv/logo_Final.png" alt="No image">
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
                <li class="{{ Request::is('problems') ? "active" : "" }}"><a href="{{url('problems')}}">Problems</a></li>
                <li class="{{ Request::is('contact') ? "active" : "" }}"><a href="{{url('contact')}}">Contact</a></li>
                <li class="{{ Request::is('news') ? "active" : "" }}"><a href="{{url('news')}}">News</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li class="{{ Request::is('login') ? "active" : "" }}"><a href="{{ url('/login') }}">Login</a></li>
                    <li class="{{ Request::is('register') ? "active" : "" }}"><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">
                            @{{ipapp.user.name}} <span class="caret"></span>
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