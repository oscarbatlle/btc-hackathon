<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
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
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <!-- <li><a href="{{ url('/register') }}">Register</a></li> -->
                @else
                    <li>
                        <a href="/campaigns" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Campaigns <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="/campaigns">
                                    Manage Campaigns
                                </a>
                            </li>
                            <li>
                                <a href="/campaigns/create">
                                    Create Campaign
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        @if(Auth::user()->role == 'admin')
                        <a href="/affiliates" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Affiliates <span class="caret"></span>
                        </a>
                        @endif
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="/affiliates">
                                    Manage Affiliates
                                </a>
                            </li>
                            <li>
                                <a href="/affiliates/create">
                                    Create Affiliate
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
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