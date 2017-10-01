<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Laravel</a>

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="{{URL::current() == route('home')?'active':''}}"><a href="/">Home</a></li>
                <li class="{{URL::current() == url('/blog')?'active':''}}"><a href="/blog">Blog</a></li>
                {{--<li class="{{URL::current() == url('/about')?'active':''}}"><a href="/about">About</a></li>--}}
                <li class="{{URL::current() == url('/contact')?'active':''}}"><a href="/contact">Contact</a></li>
                <li class="{{URL::current() == url('/tickets')?'active':''}}"><a href="/tickets">Tickets</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        @if(Auth::check())
                            @if(Auth::user()->hasRole('admin'))
                                <li><a href="/admin">Admin</a></li>
                            @endif
                            <li><a href="/logout">Logout</a></li>
                        @else
                            <li><a href="/register">Register</a></li>
                            <li><a href="/login">Login</a></li>

                        @endif

                    </ul>
                </li>
                @if(Auth::check())
                    <h6 class="text-right">Hello, {{ Auth::user()->name }}</h6>
                @endif
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>